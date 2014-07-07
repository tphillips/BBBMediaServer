#!/bin/bash

/etc/init.d/mpd stop
cd /root
cd DoorUnit
/usr/bin/mono DoorUnit -t configuregpios,initsound,initmodem
cd ..
ifdown usb0
ifdown usb1
ifup usb0
sleep 5
/usr/sbin/ntpdate -d pool.ntp.org
/etc/init.d/ntp stop
iptables -t nat -A POSTROUTING -s 192.168.0.0/16 -o usb0 -j MASQUERADE
echo 1 > /proc/sys/net/ipv4/ip_forward
sleep 5
mono Tcp2Com.exe -utrx -c /dev/ttyUSB0 > /var/log/Tcp2Com.txt &
#sleep 5
#/root/watchdog.sh > /var/log/watchdog &
/root/rfWatchdog.sh &
exit 0
