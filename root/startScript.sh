#!/bin/bash

function getIP
{
	IpAddr=`ifconfig wlan0 | sed -En 's/127.0.0.1//;s/.*inet (addr:)?(([0-9]*\.){3}[0-9]*).*/\2/p'`
}
#/etc/init.d/mpd stop
#/etc/init.d/pulseaudio start

cd /root
#aplay Booted.wav
#sleep 5
#getIP
#while [ "$IpAddr" ==  "" ]; do
#	echo No IP
	#aplay Waiting.wav
#	sleep 10
#	getIP
#done
#espeak $IpAddr
#aplay StartingAutomation.wav
cd /root
mono Tcp2Com.exe -utrx -c /dev/ttyUSB0 &
sleep 5
#cd /root
#aplay StartingTeccoms.wav
#/root/DoorUnit/start.sh &
#sleep 15
#cd /root
#aplay Scanning.wav
#umount /dev/sda1
#fsck -a /dev/sda1
#mount /dev/sda1
#aplay StartingMedia.wav
#sudo -u ubuntu /home/ubuntu/runVlc.sh
#/usr/local/bin/noip2
#/etc/init.d/mpd start
#sleep 5
ifdown usb0
ifdown usb1
ifup usb0
sleep 5
/usr/sbin/ntpdate -d pool.ntp.org
iptables -t nat -A POSTROUTING -s 192.168.0.0/16 -o usb0 -j MASQUERADE
echo 1 > /proc/sys/net/ipv4/ip_forward
/usr/local/bin/shairport -a "MediaServer" -d -b 350
sleep 5
/root/watchdog.sh > /var/log/watchdog &
exit 0
