	<?php
//https://gist.github.com/stavrossk/6233630
function getRealIpAddr()
{
	if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
	//to check ip passed from proxy
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	return $ip . "\r\n";
}

$ipAddress = getRealIpAddr();

// Catch cURL/Wget requests using https://gist.github.com/nahakiole/843fb9a29292bfcf012b
if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match("/(curl|wget|WindowsPowerShell)/i", $_SERVER['HTTP_USER_AGENT'])) {
    echo $ipAddress;
}
else {

	include_once('./lib/tbs/tbs_class.php');

	$TBS = new clsTinyButStrong;
	$TBS->LoadTemplate('./tpl/box/index.tpl.html');
	$TBS->Show();	
	
}








?>
