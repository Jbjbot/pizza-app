#!/bin/bash

environment=development
backupDirectory=./sql/${environment}/
hostName=localhost
userName=root
userPassword=root
dbname=pizza-app

echo "### If needed, creating "${backupDirectory}
mkdir -p ${backupDirectory}

echo "### Removing dump older than 15 days"
find ${backupDirectory} -type f -mtime +15 -exec rm {} \;

echo "### Backuping database"
exportedFileName=${backupDirectory}dump_${dbname}-${environment}_`date +%F_%H%M`.sql
mysqldump -h${hostName} -u${userName} -p${userPassword} ${dbname} > ${exportedFileName}
echo "# Backup file: " ${exportedFileName}