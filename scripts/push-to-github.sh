#!/bin/bash

# Check if a commit message is provided as a parameter
if [ "$#" -ne 1 ]; then
    echo "Usage: $0 <commit-message>"
    exit 1
fi

commit_message=$1

# Navigate to /var/app/current
cd /var/app/current

# Unlink wp-content
unlink wp-content

# Copy wp-content from /mnt/efs to /var/app/current
cp -r /mnt/efs/wp-content .

# Add all changes to staging
git add .

# Commit the changes with the provided commit message
git commit -m "$commit_message"

# Get branch
GIT_REPOSITORY_BRANCH=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.GIT_REPOSITORY_BRANCH')

# Push changes to branch
git push origin $GIT_REPOSITORY_BRANCH

# Remove wp-content from /var/app/current
rm -rf wp-content

# Link wp-content again from the EFS
ln -s /mnt/efs/wp-content wp-content

echo "Successfully pushed changes to ${GIT_REPOSITORY_BRANCH} branch and relinked wp-content from EFS."
