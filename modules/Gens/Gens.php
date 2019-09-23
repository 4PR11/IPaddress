<?php

function ver_gen ($op) {
	if ($op<0 && $op>2) {
	 $op = 0;
	}
	if ($op == 0) {
	   $ip = ip_gen();
	   $str = ipDec($ip);
	   echo "<h1>".$str."</h1>";
	   $ip = mask_gen();
	   $str = ipDec($ip); 
	   echo "<h2>".$str."</h2>"; 
	} elseif ($op == 1) {
	   $ip = ip_gen();
	   $str = ipBin($ip);
	   echo "<h1>".$str."</h1>";
	   $ip = mask_gen();
	   $str = ipBin($ip); 
	   echo "<h2>".$str."</h2>"; 
	} elseif ($op == 2) {
	  $ip = ip_gen();
	   $str = ipHex($ip);
	   echo "<h1>".$str."</h1>";
	   $ip = mask_gen();
	   $str = ipHex($ip); 
	   echo "<h2>".$str."</h2>"; 
	}
}

function ip_gen () {
	$ip = array(10,0,0,0);
	for ($i = 1; $i < 4 ; $i++) { 
		$ip[$i] = rand(0, 255);
	}
	return $ip;	
}

function mask_gen() {
	$mask = array(0,0,0,0);
	$one_number = rand(5, 30);
	$i = 0;
	$bin_str="";
	while ($i <= 4) {
		$bin_str.=($one_number < 0 ? '0' : '1');
		if (strlen($bin_str) == 8){
			$mask[$i] = bindec($bin_str);
			$bin_str="";
			$i++;
		}
		$one_number--;
	}
	return $mask;	
}

function ipDec($ip){
	$result = "";
	for ($i = 0; $i < 4 ; $i++) { 
		$result .= (string)$ip[$i] .'.';
	}
	return trim($result, '.');
}

function ipBin($ip){
	$result = "";
	for ($i = 0; $i < 4 ; $i++) { 
		$result .= (string)decbin($ip[$i]) .'.';
	}
	return trim($result, '.');
}

function ipHex($ip){
	$result = "";
	for ($i = 0; $i < 4 ; $i++) { 
		$result .= (string)dechex($ip[$i]) .'.';
	}
	return trim($result, '.');
}

ver_gen(0);
echo "<br>";
ver_gen(1);
echo "<br>";
ver_gen(2);
echo "<br>";

?>

