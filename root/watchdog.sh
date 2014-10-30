#!/bin/bash

while [ true ]; do
	echo Checking . . .
	res=`ping -c 3 8.8.8.8 | grep -c  64`
	if [ "$res" != "3" ]; then
		echo Not OK, restarting interface . . .
		ifdown usb0
		ifup usb0
		sleep 5
		echo Rechecking . . .
		res=`ping -c 3 8.8.8.8 | grep -c  64`
        	if [ "$res" != "3" ]; then
			echo Not OK, rebooting . . .
			reboot
		fi
	else
		echo Internet OK
	fi
	sleep 60
done
