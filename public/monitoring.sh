#!/bin/bash

ip=$1
command=$2

if [ "$command" = "logs" ]; then
    cat /var/log/remote/`ssh -n root@$ip hostname`/CRON.log
else
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
    elif [ "$command" = "dhcp" ]; then
        cat /etc/dhcp/dhcpd.conf
    elif [ "$command" = "dns" ]; then
        cat /etc/bind/named.conf.local /etc/bind/named.conf.options
    else
        echo $command
    fi
'"
fi