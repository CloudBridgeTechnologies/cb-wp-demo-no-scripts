#!/bin/bash

# Ensure jq is installed
if ! which jq ; then
  yum -y install jq
fi

# Ensure the necessary utility for EFS is installed
if ! which amazon-efs-utils ; then
  yum -y install amazon-efs-utils
fi

# Fetch EFS ID from Elastic Beanstalk's environment variable
EFS_ID=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.EFS_FILESYSTEM_ID')

# Ensure EFS ID is fetched correctly
if [ -z "$EFS_ID" ]; then
  echo "Error: Failed to fetch EFS ID."
  exit 1
fi

# Mount directory to EFS
mkdir -p /mnt/efs
mount -t efs ${EFS_ID}:/ /mnt/efs

# Permissions
chown webapp:webapp -R /mnt/efs/wp-content

# Remove existing wp-content
rm -rf /var/app/current/wp-content

# Link
ln -s /mnt/efs/wp-content /var/app/current
