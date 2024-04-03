#!/bin/bash

# Ensure jq and awscli are installed
if ! which jq ; then
  yum -y install jq
fi

if ! which aws ; then
  yum -y install awscli
fi

S3_DUMP_BUCKET=$1
DUMP_FILENAME=$2
DUMP_SITEURL=$3

# Get variables
DB_HOST=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_HOST')
DB_NAME=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_NAME')
DB_USER=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_USER')
DB_PASSWORD=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.DB_PASSWORD')
SITE_URL=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.SITE_URL')

# Get dump from S3
aws s3 cp s3://$S3_DUMP_BUCKET/$DUMP_FILENAME .

sed -i "s|$DUMP_SITEURL|$SITE_URL|g" $DUMP_FILENAME

# Overwrite DB
mysql -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME < $DUMP_FILENAME

# Remove local file
rm -f $DUMP_FILENAME
