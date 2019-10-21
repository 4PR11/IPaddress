<?php

const FIRST_IP_BYTE = 10;

class Ip
{
	private $bytes = array(0, 0, 0, 0);

	function Ip() {}

	private function isByte($number) {
		return ($number >= 0 && $number < 256);
	}

	function Ip($b3, $b2, $b1, $b0) {	
		if (isByte($b3) && isByte($b2) && isByte($b1) && isByte($b0)){
			this->bytes = array($b3,$b2,$b1,$b0);
		}
	}

	public function getByte($num) {
		$byte = 0;
		if ($num >= 0 && $num < 4) {
			$byte = this->bytes[$num];
		}
		return $byte;
	}

	public function setByte($num, $value) {
		if ($num >= 0 && $num < 4 && isByte($value)) {
			this->bytes[$num] = (integer)$value;
		}
		return $byte;
	}

	public function mult($ip) {
		$conjunction = new Ip;
		for ($i = 0; $i < 4 ; $i++) { 
			$conjunction->setByte($i, this->bytes[$i] & $ip->getByte[$i]);
		}
		return $conjunction;
	}

	public function add($ip) {
		$addition = new Ip;
		for ($i=0; $i < 4 ; $i++) { 
			$addition->setByte($i, (~this->bytes[$i]&255) | $ip->getByte[$i]);
		}
		return $addition;
	}

	public function equal($ip) {
		$result = true;
		$i = 0;
		while ($result && $i < 4) {
			$result = (this->bytes[$i] == $ip->getByte[$i]);
			$i++;
		}
		return $result;
	}

	public function dec(){
		$result = 0;
		for ($i = 0; $i < 4 ; $i++) { 
			$result .= (string)this->bytes[$i] .'.';
		}
		return trim($result, '.');
	}

	public function bin(){
		$result = "";
		for ($i = 0; $i < 4 ; $i++) {
			$buff =(string)decbin(this->bytes[$i]);
			$result .= substr('00000000', strlen($buff)).$buff.'.';
		}
		return trim($result, '.');
	}

	public function hex() {
		$result = "";
		for ($i = 0; $i < 4 ; $i++) { 
			$result .= (string)dechex(this->bytes[$i]) .'.';
		}
		return trim($result, '.');
	}
}

class task_Ip
{
	private ip = new Ip();
	private mask = new Ip();

	public function task_Ip($ip, $mask){
		this->mask = $mask;
		this->ip = $ip;
	}

	public function netAddress(){
		$ip = this->ip;
		$mask = this->mask;
		$conjunction = new Ip;
		for ($i=0; $i < 4 ; $i++) { 
			$conjunction->setByte($i, $ip->getByte($i) & $mask->getByte($i));
		}
		return $conjunction;
	}

	public function adressFirstHost(){
		$net_address = this->netAdress();
		return new Ip(
						$net_address->getByte(0), 
					 	$net_address->getByte(1), 
			         	$net_address->getByte(2), 
					 	$net_address->getByte(3) + 1
					);
 	} 

 	public function adressLastHost(){
 		$broadcast_address = this->broadcastAddress();
		return new Ip(
					  	$broadcast_address->getByte(0), 
						$broadcast_address->getByte(1), 
					  	$broadcast_address->getByte(2), 
					  	$broadcast_address->getByte(3]) - 1
					);
	}

	public function broadcastAddress() {
		$net_address = this->netAddres();
		$mask = this->mask;
		$addition = new Ip;
		for ($i=0; $i < 4 ; $i++) { 
			$addition->setByte($i, (~$mask->getByte($i)&255) | $net_address->getByte($i));
		}
		return $addition;
	}

	public function netNodesNum(){
		$mask = this->mask;
		$bin_mask_str = str_replace('.', '', $mask->bin());
		$zero_count = 0;
		$i = strlen($bin_mask_str) - 1; 
		while ($bin_mask_str[$i] == '0' && $i > 0) {
			$zero_count++;	
			$i--;
		}
		return pow(2, $zero_count) - 2;
	}

	public function getMask(){
		return this->mask();
	}

	public function getIp(){
		return this->ip();
	}
}

class managerTask_Ip {

	private $task_num = 0;
	private $task_list = array();

	private function ipGen() {
		$ip = new Ip();
		$ip->setByte(3, FIRST_IP_BYTE);
		for ($i = 1; $i < 4; $i++) { 
			$ip->setByte($i, rand(0, 255));
		}
		return $ip;	
	}

	private function maskGen() {
		$mask =  new Ip();
		$one_number = rand(8, 30);
		$i = 0;
		$bin_str="";
		while ($i <= 4) {
			$bin_str.=($one_number < 0 ? '0' : '1');
			if (strlen($bin_str) == 8){
				$mask->setByte($i, bindec($bin_str));
				$bin_str="";
				$i++;
			}
			$one_number--;
		}
		return $mask;	
	}

	function taskManager($task_num) {
		this->task_num = ($task_num > 0) ? $task_num, 0;
		if ($task_num > 0) {
			for ($i = 0; $i < this->task_num ; $i++) { 
				array_push(this->task_list, array(
						  							'op' => rand(0, 3), 
						  							'task' => new task_Ip(ipGen(), maskGen())
						  						)
				)
			}
		}
	}

	public function getTask($index){
		if ($index >= 0 && $index < this->task_num){
			return task_list[$index]['task']; 
		}

	}

	public function getTaskStr($index) {
		$task_str = "";
		if ($index >= 0 && $index < this->task_num) {
			$op = this->task_list[$index]['op'];
			$task = this->task_list[$index]['task'];
			if ($op == 0) {
				$task_str = $task->getIp()->bin().'\n'. $task->getMask()->bin();
			} elseif ($op == 1) {
				$task_str = $task->getIp()->hex().'\n'. $task->getMask()->hex();
			} elseif ($op == 2) {
				$task_str = $task->getIp()->dec();
				$task_str .='/'.(string)substr_count($task->getMask()->bin(), '1');
			} 
			else {
				$task_str = $task->getIp()->dec().'\n'. $task->getMask()->dec();
			}
		}
		return $task_str;
	}

	public function inspect($data){
		$answers = new Array();
		for ($i = 0; $i < this->task_num ; $i++) { 
			array_push($answers, array(
										'netAdress' => false,
									   	'addressFirstHost' => false, 
									   	'addressLastHost' => false,
									   	'broadcastAddress' => false,
									   	'netNodesNum' => false
									  )
			);
			$parser_buff = ipParser($data[$i]['netAddress']);
			$right_net_adress = this->getTask($i)->netAdress(); 
			$answers[$i]['netAdress'] = $parser_buff->equal($right_net_adress);

			$parser_buff = ipParser($data[$i]['addressFirstHost']);
			$right_address_first_host = this->getTask($i)->addressFirstHost(); 
			$answers[$i]['addressFirstHost'] = $parser_buff->equal($right_address_first_host); 

			$parser_buff = ipParser($data[$i]['addressLastHost']);
			$right_address_last_host = this->getTask($i)->addressLastHost();  
			$answers[$i]['adressLastHost'] = $parser_buff->equal($right_address_last_host);

			$parser_buff = ipParser($data[$i]['broadcastAddress']);
			$right_broadcast_address = this->getTask($i)->broadcastAddress();  
			$answers[$i]['broadcastAddress'] = $parser_buff->equal($right_broadcast_address); 

			$right_net_nodes_num = this->getTask($i)->netNodesNum();  
			$answers[$i]['netNodesNum'] = (integer)$data[$i]['netNodesNum'] == $right_net_nodes_num; 
		}
		return answers;
	}
}


function ipParser($ip_str){
	$ip = new Ip;
	$ip_str = preg_replace('/\s+/', '', $ip_str);
	$ip_str_array = preg_split('/[.]/', $ip_str);
	if ($ip_str_array[0] == decbin(FIRST_IP_BYTE)) {
	  	for ($i = 0; $i < 4 ; $i++) { 
			$ip->setByte($i, bindec($ip_str_array[$i])) ;
		}
	} elseif ($ip_str_array[0] == dechex(FIRST_IP_BYTE)) {
	   for ($i = 0; $i < 4 ; $i++) { 
			$ip->setByte($i, hexdec($ip_str_array[$i]));
		}
	} else {
		for ($i = 0; $i < 4 ; $i++) { 
			$ip->setByte($i, (int)$ip_str_array[$i]);
		}
	}
	 return $ip;
}

?>