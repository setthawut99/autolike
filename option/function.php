<?php
error_reporting(0);
function RandomKey($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function antisql($string) {
	$string = mysql_escape_string($string);
	$string = str_replace("\\",'\\\\\\',$string);
	return $string;
}

function getmember($username) {
	include('conn.php');
	$member = $conn->query("SELECT * FROM member WHERE username = '".$username."'");
	$member = $member->fetch_assoc();
	return $member;
}

function curl($URL){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $URL); 
		curl_setopt($ch, CURLOPT_USERAGENT, "Firefox");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
		return $output;
}

function GetUid($url) {
    $fbsite = curl($url);
    $fbIDPattern = '/\"entity_id\":\"(\d+)\"/';
    preg_match($fbIDPattern, $fbsite, $matches);
    return $matches[1];
}



?>