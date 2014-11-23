#!/bin/bash

su
echo "optargs=capemgr.disable_partno=BB-BONELT-HDMI,BB-BONELT-HDMIN" >> /boot/uboot/uEnv.txt
apt-get update
apt-get install iw hostapd isc-dhcp-server iptables apache2 screen mono-runtime libmono2.0-cil wget zip unzip mpd espeak alsa-utils lm-sensors php5
cp -r etc /
cp -r root /
cp -r var /
