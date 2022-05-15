#!/bin/bash

command=$1


if [ "$command" = "memory" ]; then
    free
elif [ "$command" = "disk" ]; then
    df -h | awk '{print $4}'
elif [ "$command" = "ip" ]; then
    echo ifconfig >> "info.log"
elif [ "$command" = "ports" ]; then
    netstat -lt && netstat -lu
elif [ "$command" = "process" ]; then
    ps -aux | head --lines=10
elif [ "$command" = "users" ]; then
    last | head --lines=10
elif [ "$command" = "table" ]; then
    netstat -nr
elif [ "$command" = "logs" ]; then
    cat /var/log/kern.log | head --lines=10 > ./logs/"logs - $ip".log
elif [ "$command" = "read" ]; then
    cat ./logs/"logs - $ip".log
elif [ "$command" = "ls" ]; then
    ls -al
else
    echo $command
fi

