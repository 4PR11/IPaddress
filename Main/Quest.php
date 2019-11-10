<?php
	include('Gens/Gens.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<title>Задания</title>
	<script src="js/postResults.js"></script>
	<?php
	    // берем значение из базы
	    const TASK_NAME = 'ip';  // индефикатор задания
	    const TASK_NUM = 3; // колво заданий
	    echo "<script type='text/javascript'> const TASKS_NUM = ".TASK_NUM."; </script>"; // передаем ещё в яву скрипт
		if (!isset($_SESSION[TASK_NAME])) {
	        $manager = new managerTask_Ip(4); 
	        $_SESSION[TASK_NAME] = $manager; 
		} else {
	        $manager = $_SESSION[TASK_NAME];    
	    }
	?>
	<style type="text/css">

		.byte {
		  border: none;
		  background: transparent;
		  width: 22px;
		  text-align: left;
		  padding: 0;
		}

		#id {
		  padding-left: 5px;
		  border: 1px silver solid;
		  width: 160px;
		  box-shadow: 0 0 10px silver;
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}

	    * {
	        outline: 0 !important;
	    }
	</style>
</head>
<body>
	<div class="main-container">
			<div class="top-row">
			<div>
				"ФИО"
			</div>
			<div>
				"ТЕМА"
			</div>
			<div>
				"ВРЕМЯ"
			</div>
		</div>
		<div class="separator"></div>
		<div class="task-row">
			<table id="task-table">
				<tr>
					<td>Адрес узла / Маска подсети:</td>
					<?php
			            //print_r($manager->task_list[0]);
			            echo "<td id='task'>".$manager->getTaskStr(0)."</td>";
			        ?>
				</tr>
				<!--<tr>
					<td>
						Маска подсети: 255.255.128.0
					</td>
				</tr>-->
			</table>
		</div>
		<div class="separator"></div>
		<div class="answer-row">
			<table id="answer-table">
				<tr>
					<td>
						<div>Net-adress</div>		
					</td>
				</tr>
				<tr>
					<td>
						<input  class="ip" type="text" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}" name="netAddress">
						<!--<input type="text" name=""> .
						<input type="text" name=""> . 
						<input type="text" name="">-->
					</td>
				</tr>
				<tr>
					<td>
						<div>Adress first host</div>		
					</td>
				</tr>
				<tr>
					<td>
						<input  class="ip" type="text" name="addressFirstHost"> 
						<!--<input type="text" name=""> .
						<input type="text" name=""> . 
						<input type="text" name="">-->
					</td>
				</tr>
				<tr>
					<td>
						<div>Adress last host</div>		
					</td>
				</tr>
				<tr>
					<td>
						<input  class="ip" type="text" name="addressLastHost">
						<!--<input type="text" name=""> .
						<input type="text" name=""> . 
						<input type="text" name="">-->
					</td>
				</tr>
				<tr>
					<td>
						<div>Broadcast address</div>		
					</td>
				</tr>
				<tr>
					<td>
						<input class="ip" type="text" name="broadcastAddress">
						<!--<input type="text" name=""> .
						<input type="text" name=""> . 
						<input type="text" name="">-->
					</td>
				</tr>
				<tr>
					<td>
						<div>Net Nodes Num</div>		
					</td>
				</tr>
				<tr>
					<td>
						<input class="ip" type="number" min="0" name="netNodesNum">
						<!--<input type="text" name=""> .
						<input type="text" name=""> . 
						<input type="text" name="">-->
					</td>
				</tr>
			</table>
			<button onclick="NextTask()">Ответить</button>
		</div>
		<div class="separator"></div>
		<div class="both-row">
		</div>	
	</div>
</body>
</html>