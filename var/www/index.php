<?php

echo("<!--");
$temp = system("sensors | grep +...... -o");
$uptime = system("uptime");
$usage = system("/sbin/ifconfig usb0 | grep RX ");
echo("-->");

if ($_POST["action"] == "Pause")
{
	system("wget http://localhost:7000/requests/status.xml?command=pl_stop -O /dev/null");
}

if ($_POST["action"] == "Play")
{
	system("wget http://localhost:7000/requests/status.xml?command=pl_play -O /dev/null");
}

if ($_POST["action"] == "Next")
{
	system("wget http://localhost:7000/requests/status.xml?command=pl_next -O /dev/null");
}

if ($_POST["action"] == "Prev")
{
	system("wget http://localhost:7000/requests/status.xml?command=pl_previous -O /dev/null");
}

if ($_POST["action"] == "Music")
{
	system("wget \"http://localhost:7000/requests/status.xml?command=pl_play&id=10\" -O /dev/null");
}

if ($_POST["action"] == "LBC")
{
	system("wget \"http://localhost:7000/requests/status.xml?command=pl_play&id=9\" -O /dev/null");
}

if ($_POST["action"] == "Flex FM")
{
	system("wget \"http://localhost:7000/requests/status.xml?command=pl_play&id=4\" -O /dev/null");
}

if ($_POST["action"] == "Low Volume")
{
	system("wget \"http://localhost:7000/requests/status.xml?command=volume&val=138\" -O /dev/null");
}

if ($_POST["action"] == "Medium Volume")
{
	system("wget \"http://localhost:7000/requests/status.xml?command=volume&val=200\" -O /dev/null");
}

if ($_POST["action"] == "Full Volume")
{
	system("wget \"http://localhost:7000/requests/status.xml?command=volume&val=256\" -O /dev/null");
}

if ($_POST["action"] == "Reboot")
{
	system("sudo shutdown -rF now");
}

if ($_POST["action"] == "Shutdown")
{
	system("sudo poweroff");
}

if ($_POST["action"] == "Stop Services")
{
	system("sudo killall mono; sudo killall vlc");
}

if ($_POST["action"] == "Cycle Services")
{
	system("sudo killall mono; sudo killall vlc; sudo /etc/init.d/mpd restart; sudo /etc/rc.local");
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
			<!--input type="submit" value="Next" name="action">
			<br/-->
			<!--input type="submit" value="Pause" name="action">
			<input type="submit" value="Play" name="action">
			<br/>
			<input type="submit" value="Prev" name="action">
			<br/>
			<input type="submit" value="Music" name="action"-->
			<!--input type="submit" value="LBC" name="action">
			<input type="submit" value="Flex FM" name="action">
			<br/>
			<input type="submit" value="Low Volume" name="action">
			<input type="submit" value="Medium Volume" name="action">
			<input type="submit" value="Full Volume" name="action">
			<br/-->
			<input type="submit" value="Reboot" name="action">
			<input type="submit" value="Shutdown" name="action">
			<!--<input type="submit" value="Stop Services" name="action">
			<input type="submit" value="Cycle Services" name="action"-->
		</form>
		<br/>
		<p><center><small><?=$uptime?><br/><?=$usage?></small></center></p>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>
</html>


