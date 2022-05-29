<?php
set_time_limit(0);
include('conn.php');

function curl($URL){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $URL); 
		curl_setopt($ch, CURLOPT_USERAGENT, "Firefox");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
		return $output;
}


function like($idpost, $maxlike){
	include('conn.php');
	$total = 0;
	$del = 0;
	$mh = curl_multi_init();
	$arraycurl = array();
	$U_TOKEN = array();
	
	$token = $conn->query("SELECT * FROM token WHERE status > '0' ORDER BY RAND() LIMIT ".$maxlike."");
	if ($token->num_rows > 0) {
		while($row_token = $token->fetch_assoc()) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/'.$idpost.'/likes?method=post&access_token='.$row_token['token'].'');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_multi_add_handle($mh,$ch);
			array_push($arraycurl, $ch);
			array_push($U_TOKEN, $row_token['token']);
		}
		do {
			curl_multi_exec($mh, $running);
		} while ($running);
		foreach ($arraycurl as $con) {
			$content = curl_multi_getcontent($con);
			if ($content == 'true') {
				$total++;
				$conn->query("UPDATE token SET status = '3' WHERE token = '".$U_TOKEN[$del]."'");
			}else{
				$conn->query("UPDATE token SET status=status-'1' WHERE token = '".$U_TOKEN[$del]."'");
			}
			$del++;
			curl_close($con);
			curl_multi_remove_handle($mh, $con);
		}
		curl_multi_close($mh);
		return $total;
	}
}


$dayupdate = $conn->query("SELECT * FROM day WHERE day = '".date("Y-m-d")."'");

if($dayupdate->num_rows == "0"){
	$conn->query("UPDATE day SET day = '".date("Y-m-d")."' WHERE id = '1'");
	$conn->query("UPDATE user_like SET day_like = '0'");
}

$expired = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")));

$deluser = $conn->query("SELECT * FROM user_like WHERE expired < '".$expired."'");
if ($deluser->num_rows > 0) {
    while($deluser_row = $deluser->fetch_assoc()) {

		$conn->query("DELETE FROM user_like WHERE id = '".$deluser_row['id']."'");
	
    }
}


$update_post = $conn->query("SELECT * FROM user_like WHERE like_use = '1' and status != '0'");
if ($update_post->num_rows > 0) {
    while($row1 = $update_post->fetch_assoc()) {
		$package1 = $conn->query("SELECT * FROM package WHERE id = '".$row1['package']."'");
		$package1 = $package1->fetch_assoc();
		
		if($package1['day_maxlike'] > $row1['day_like']){
		
			$token_ck = $conn->query("SELECT * FROM token WHERE status != '0' ORDER BY RAND() LIMIT 1");
			$token_ck = $token_ck->fetch_assoc();
			
			$post = json_decode(curl('https://graph.facebook.com/'.$row1['uid'].'/posts?fields=id&limit=1&access_token='.$token_ck['token'].'') , true);
			
			$ck_like = $conn->query("SELECT * FROM user_like WHERE id = '".$row1['id']."' and id_post = '".$post['data'][0]['id']."'");
			$ck_like = $ck_like->fetch_assoc();
			if($ck_like['id'] == "" and $post['data'][0]['id'] != ""){
				$conn->query("UPDATE user_like SET id_post='".$post['data'][0]['id']."',like_use='0' WHERE id='".$row1['id']."'");
				$conn->query("UPDATE user_like SET id_post='".$post['data'][0]['id']."',like_use='0' WHERE id='".$row1['id']."'");
				$conn->query("UPDATE user_like SET like_num='0' WHERE id='".$row1['id']."'");
			}
		}
	
    }
}
$user_like_all = $conn->query("SELECT * FROM user_like WHERE like_use = '0' and status != '0'");
if ($user_like_all->num_rows > 0) {
    while($row2 = $user_like_all->fetch_assoc()) {
		$package2 = $conn->query("SELECT * FROM package WHERE id = '".$row2['package']."'");
		$package2 = $package2->fetch_assoc();
		like($row2['id_post'], $package2['max_like']);
		$conn->query("UPDATE user_like SET like_use='1' WHERE id='".$row2['id']."'");
		$conn->query("UPDATE user_like SET day_like=day_like+'1' WHERE id='".$row2['id']."'");
    }
}


?>