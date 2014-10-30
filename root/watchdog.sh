#!/bin/bash

while [ true ]; do
	date
	echo Checking . . .
	res=`ping -c 3 8.8.8.8 | grep -c  64`
	if [ "$res" != "3" ]; then
		echo Not OK
		echo Syslog
		echo ------
		tail /var/log/syslog
		echo
		echo ------
		echo
		echo dmesg
		echo -----
		dmesg 
		echo Restarting interface . . .
		ifdown usb0
		ifup usb0
		sleep 5
		echo Rechecking . . .
		res=`ping -c 3 8.8.8.8 | grep -c  64`
        	if [ "$res" != "3" ]; then
			echo Not OK
			echo Not OK
                	echo Syslog
                	echo ------
                	tail /var/log/syslog
                	echo
                	echo ------
                	echo
                	echo dmesg
                	echo -----
                	dmesg 
			echo Rebooting . . .
			reboot
		fi
	else
		echo Internet OK
	fi
	sleep 90
done
