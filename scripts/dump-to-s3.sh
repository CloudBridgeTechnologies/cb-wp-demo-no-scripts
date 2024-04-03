#!/bin/bash

# Ensure jq and awscli are installed
if ! which jq ; then
  yum -y install jq
fi

if ! which aws ; then
  yum -y install awscli
fi

# Get current date
CURRENT_DATE=$(date +"%Y-%m-%d")

# Get variables
S3_DUMP_BUCKET=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.S3_DUMP_BUCKET')
DB_HOST=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_HOST')
DB_NAME=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_NAME')
DB_USER=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_USER')
DB_PASSWORD=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_PASSWORD')

# File name for the dump
DUMP_FILENAME="${CURRENT_DATE}-dump.sql"

# Dump DB
mysqldump --add-drop-table -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME > $DUMP_FILENAME

# Copy to S3
aws s3 cp $DUMP_FILENAME s3://$S3_DUMP_BUCKET/

# Remove local backup
rm -f $DUMP_FILENAME
