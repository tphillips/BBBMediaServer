#!/bin/bash

while [ true ]; do
	
	res=`grep "03:BD:8F:28:07:00" -c /var/log/Tcp2Com.txt`
        if [ "$res" != "0" ]; then
		cp /root/goodsound.state /var/lib/alsa/asound.state  
                alsactl restore
                ps -A | grep mplayer | kill `awk '{ print $1 }'`
        	echo start > /var/log/Tcp2Com.txt
	fi

	res=`grep "03:BD:8F:28:07:01" -c /var/log/Tcp2Com.txt`
        if [ "$res" != "0" ]; then
                cp /root/loudsound.state /var/lib/alsa/asound.state  
                alsactl restore
                ps -A | grep mplayer | kill `awk '{ print $1 }'`
               	sleep 1
		mplayer http://81.20.49.11:80/LBCLondonMP3Low &
		echo start > /var/log/Tcp2Com.txt
        fi


	res=`grep "03:BD:8F:28:0F:01" -c /var/log/Tcp2Com.txt`
	if [ "$res" != "0" ]; then
		cp /root/goodsound.state /var/lib/alsa/asound.state
		alsactl restore
		ps -A | grep mplayer | kill `awk '{ print $1 }'`
		sleep 1
		mplayer /root/sounds/waves.wav &
		echo start > /var/log/Tcp2Com.txt
	fi

	res=`grep "03:BD:8F:28:0F:00" -c /var/log/Tcp2Com.txt`
        if [ "$res" != "0" ]; then
                cp /root/loudsound.state /var/lib/alsa/asound.state  
                alsactl restore
		ps -A | grep mplayer | kill `awk '{ print $1 }'`
		sleep 1
		mplayer -shuffle /root/music/*/*/* &
                echo start > /var/log/Tcp2Com.txt
        fi
	
	sleep 3
done
