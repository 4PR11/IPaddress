<?php

const FIRST_IP_BYTE = 10;

//функция-фабрика
function taskStrCon ($task) {
	$op = rand(0,3);
	$result = array('ip' => '', 'mask' => '');
	if ($op == 0) {
		$result['ip'] = ipBin($task['ip']);
		$result['mask'] = ipBin($task['mask']);
	} elseif ($op == 1) {
		$result['ip'] = ipHex($task['ip']);
		$result['mask'] = ipHex($task['mask']);
	} elseif ($op == 2) {
		$result['ip'] = ipDec($task['ip']);
		$result['mask'] ='/'.(string)substr_count(ipBin($task['mask']), '1');
	} 
	else {
		$result['ip'] = ipDec($task['ip']);
		$result['mask'] = ipDec($task['mask']);
	}
	return $result;
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
		$buff =(string)decbin($ip[$i]);
		$result .= substr('00000000', strlen($buff)).$buff.'.';
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
	$ip_str_array = preg_split('/[.]/', $ip_str);
	if ($ip_str_array[0] == decbin(FIRST_IP_BYTE)) {
	  	typeConverter(create_function('$ip_str_array','return bindec($ip_byte_str)'));
	} elseif ($ip_str_array[0] == dechex(FIRST_IP_BYTE)) {
	   typeConverter(create_function('$ip_str_array','return hexdec($ip_byte_str)'));
	} else {
		typeConverter(create_function('$ip_str_array','return (int)($ip_byte_str)'));
	}
	 return $ip;

	function typeConverter($typeFunction){
		$ip = array(0,0,0,0);
		for ($i = 1; $i < 4 ; $i++) { 
			$ip[$i] = typeFunction($ip_str_array[$i]) ;
		}
		return $ip;
	}
}

function netAddress($ip, $mask){
	$conjunction = array(0,0,0,0);
	for ($i=0; $i < 4 ; $i++) { 
		$conjunction[$i] = ($ip[$i] & $mask[$i]);
	}
	return $conjunction;
}

function netNodesNum($mask){
	$bin_mask_str =str_replace('.', '', ipBin($mask));
	$zero_count = 0;
	$i = strlen($bin_mask_str) - 1; 
	while ($bin_mask_str[$i] == '0' && $i > 0) {
		$zero_count++;	
		$i--;
	}
	return pow(2, $zero_count) - 2;
}

function broadcastAddress($netAddress, $mask) {
	$addition = array(0,0,0,0);
	for ($i=0; $i < 4 ; $i++) { 
		$addition[$i] = ((~$mask[$i]&255) | $netAddress[$i]);
	}
	return $addition;
}

function adressFirstHost($netAddress){
	return array($netAddress[0], $netAddress[1], $netAddress[2], $netAddress[3]+1);
}

function adressLastHost($broadcastAddress){
	return array($broadcastAddress[0], $broadcastAddress[1], $broadcastAddress[2], $broadcastAddress[3]-1);
}

//тест-проверка

$tasks=array(
	array('ip' => array(0,0,0,0), 'mask' => array(0,0,0,0)),
	array('ip' => array(0,0,0,0), 'mask' => array(0,0,0,0)),
	array('ip' => array(0,0,0,0), 'mask' => array(0,0,0,0))
);

for ($x=0; $x < 3; $x++) { 
	$tasks[$x]['ip']=ipGen();
	$tasks[$x]['mask']=maskGen();
}

?>
<table>
    <tr>
        <td>Ip-adress and Mask</td>
        <?php
        for ($x=0; $x < 3; $x++) { 
        	$task = taskStrCon($tasks[$x]);
        	echo "<td>".$task['ip']."<br>".$task['mask']."</td>";
        }
        ?>
    </tr>
    <tr>
        <td>Net-adress</td>
        <?php
        for ($x=0; $x < 3; $x++) { 
        	echo "<td>".ipDec(netAddress($tasks[$x]['ip'],$tasks[$x]['mask']))."</td>";
        }
        ?>
    </tr>
    <tr>
        <td>Adress first host</td>
        <?php
        for ($x=0; $x < 3; $x++) { 
        	echo "<td>".ipDec(adressFirstHost(netAddress($tasks[$x]['ip'],$tasks[$x]['mask'])))."</td>";
        }
        ?>
    </tr>
    <tr>
        <td>Adress last host</td>
         <?php
        for ($x=0; $x < 3; $x++) { 
        	echo "<td>".ipDec(adressLastHost(broadcastAddress($tasks[$x]['ip'],$tasks[$x]['mask'])))."</td>";
        }
        ?>
    </tr>
    <tr>
        <td>Broadcast address</td>
        <?php
        for ($x=0; $x < 3; $x++) { 
        	echo "<td>".ipDec(broadcastAddress($tasks[$x]['ip'],$tasks[$x]['mask']))."</td>";
        }
        ?>
    </tr>
    <tr>
        <td>Net Nodes Num</td>
        <?php
        for ($x=0; $x < 3; $x++) { 
        	echo "<td>".netNodesNum($tasks[$x]['mask'])."</td>";
        }
        ?>
    </tr>
</table>