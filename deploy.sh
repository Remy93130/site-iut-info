#!/bin/sh
rsync -av ./ i42jd_remy@i42jd.ftp.infomaniak.com:~/iut --exclude-from=.gitignore