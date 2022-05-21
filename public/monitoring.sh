#!/bin/bash

ip=$1
command=$2

ssh root@$ip bash -c "'
    if [ "$command" = "memory" ]; then
        free
    elif [ "$command" = "disk" ]; then
        df -h
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
        echo $command
    elif [ "$command" = "read" ]; then
        ls -l /var/log/remote
    elif [ "$command" = "dhcp" ]; then
        cat /etc/dhcp/dhcpd.conf
    elif [ "$command" = "ls" ]; then
        ls -al
    else
        echo $command
    fi
'"



