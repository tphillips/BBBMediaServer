<?php

echo("<!--");
$temp = system("sensors | grep +...... -o");
$uptime = system("uptime");
$usage = system("/sbin/ifconfig usb0 | grep RX ");
echo("-->");

if ($_POST["action"] == "White Noise")
{
	system("ps -A | grep mplayer | sudo kill `awk '{ print $1 }'`");
	system("sleep 1");
	system("sudo mplayer /root/sounds/waves.wav &");
}

if ($_POST["action"] == "Music")
{
	system("ps -A | grep mplayer | sudo kill `awk '{ print $1 }'`");
	system("sleep 1");
	system("sudo mplayer -shuffle /root/music/*/*/* &");
}

if ($_POST["action"] == "LBC")
{
	system("ps -A | grep mplayer | sudo kill `awk '{ print $1 }'`");
	system("sleep 1");
	system("sudo mplayer http://81.20.49.11:80/LBCLondonMP3Low &");
}

if ($_POST["action"] == "Stop")
{
	system("ps -A | grep mplayer | sudo kill `awk '{ print $1 }'`");
}

if ($_POST["action"] == "Flex FM")
{
	system("ps -A | grep mplayer | sudo kill `awk '{ print $1 }'`");
	system("sleep 1");
	system("sudo mplayer http://65.60.52.122:8220 &");
}

if ($_POST["action"] == "Low Volume")
{
	system("sudo cp /root/lowsound.state /var/lib/alsa/asound.state");
	system("sudo alsactl restore");
}

if ($_POST["action"] == "Medium Volume")
{
	system("sudo cp /root/mediumsound.state /var/lib/alsa/asound.state");
	system("sudo alsactl restore");
}

if ($_POST["action"] == "Full Volume")
{
	system("sudo cp /root/loudsound.state /var/lib/alsa/asound.state");
	system("sudo alsactl restore");
}

if ($_POST["action"] == "Reboot")
{
	system("sudo shutdown -rF now");
}

if ($_POST["action"] == "Shutdown")
{
	system("sudo poweroff");
}

?>
<!DOCTYPE html> 
<html>
<head>
	<title>Media Server</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>

<body>

<div data-role="page">

	<div data-role="header">
		<h1>Media (<?=$temp?>)</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<form method="POST">
			<input type="submit" value="Music" name="action">
			<input type="submit" value="White Noise" name="action">
			<input type="submit" value="LBC" name="action">
			<input type="submit" value="Flex FM" name="action">
			<input type="submit" value="Stop" name="action">
			<br/>
			<input type="submit" value="Low Volume" name="action">
			<input type="submit" value="Medium Volume" name="action">
			<input type="submit" value="Full Volume" name="action">
			<br/>
			<input type="submit" value="Reboot" name="action">
			<input type="submit" value="Shutdown" name="action">
		</form>
		<br/>
		<p><center><small><?=$uptime?><br/><?=$usage?></small></center></p>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>
</html>


