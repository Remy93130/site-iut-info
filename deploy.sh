#!/bin/sh
rsync -av ./ i42jd_remy@i42jd.ftp.infomaniak.com:~/iut --exclude-from=.gitignore
ssh i42jd_remy@i42jd.ftp.infomaniak.com 'cd ~/iut && php bin/console cache:clear'