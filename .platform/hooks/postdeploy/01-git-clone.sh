#!/bin/bash

# Ensure git is installed
if ! which git ; then
  yum -y install git
fi

if ! which rsync ; then
  yum -y install rsync
fi

# Change to the directory /var/app/current
cd /var/app/current

# Define variables
GIT_REPOSITORY_URL=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.GIT_REPOSITORY_URL')
GIT_REPOSITORY_BRANCH=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.GIT_REPOSITORY_BRANCH')
GIT_REPOSITORY_TOKEN=$(/opt/elasticbeanstalk/bin/get-config environment | jq -r '.GIT_REPOSITORY_TOKEN')

git config --global --add safe.directory /var/app/current

# Add the remote repository
git clone "https://${GIT_REPOSITORY_TOKEN}@${GIT_REPOSITORY_URL}" -b $GIT_REPOSITORY_BRANCH repo

rsync -a repo/ .
rm -rf repo

# Make all scripts in /scripts executable
chmod +x scripts/*

chown webapp:webapp -R .
