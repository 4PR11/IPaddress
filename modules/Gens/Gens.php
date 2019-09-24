<?php

const FIRST_IP_BYTE = 10;

//функция-фабрика
function verGen ($op) {
	if ($op<0 && $op>2) {
	 $op = 0;
	}
	if ($op == 0) {
	//генирация двоичная
	} elseif ($op == 1) {
	//генирация шеснадцетеричная
	} else {
	//генирация десятичная   
	}
}

function ipGen () {
	$ip = array(FIRST_IP_BYTE,0,0,0);
	for ($i = 1; $i < 4 ; $i++) { 
		$ip[$i] = rand(0, 255);
	}
	return $ip;	
}

function maskGen() {
	$mask = array(0,0,0,0);
	$one_number = rand(8, 30);
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

function ipParser($ip_str){
	$ip = array(0,0,0,0);
	$ip_str_array = preg_split('/[.]/', $ip_str);
	$count_array=count($ip_str_array);
	if ($ip_str_array[0] == decbin(FIRST_IP_BYTE)) {
	   for ($i = 1; $i < 4 ; $i++) { 
			$ip[$i] = bindec($ip_str_array[$i]) ;
		}
	} elseif ($ip_str_array[0] == dechex(FIRST_IP_BYTE)) {
	   for ($i = 1; $i < 4 ; $i++) { 
			$ip[$i] = hexdec($ip_str_array[$i]) ;
		}
	} else {
		for ($i = 1; $i < 4 ; $i++) { 
			$ip[$i] = (int)($ip_str_array[$i]) ;
		}
	}
	 return $ip;
}

function netAddress($ip, $mask){
	$conjunction = array(0,0,0,0);
	for ($i=0; $i < 4 ; $i++) { 
		$conjunction[$i] = ($ip[$i] & $mask[$i]);
	}
	return $conjunction;
}

//проверка-тест
$ip = ipGen();
$mask = maskGen();
$str = ipBin($ip);
$str2 = ipBin($mask);
$network_address = network_address($ip, $mask);
echo "<h1>".$str."</h1>";
echo "<h2>".$str2."</h2>";
echo "<h3>".ipBin($network_address)."</h3>";
?>

