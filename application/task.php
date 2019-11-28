<!DOCTYPE html>
<html>
<head>
	<?php
		include("Gens/Gens.php");
		include_once("./templates/base.php");
		include("./templates/task.php");
		include("./templates/CurUser.php");
		base_render_head();

		const TASK_NUM = 3;
	    const TASK_NAME = "ip";
	    echo "<script type='text/javascript'> const TASKS_NUM = ".TASK_NUM."; const TASK_NAME = 'ip';</script>";

	    if (isset($_SESSION[TASK_NAME])) {
	        $taskList = $_SESSION[TASK_NAME];
		}
	?>
	<link rel="stylesheet" type="text/css" href="css/task.css">
	<title>Задания</title>
</head>
<body>
	<div class="top-row">
	    <div class="container">
			<div class="row top-row">
			    <div class="col-lg-4 text-center"><?php render_name(); ?></div>
				<div class="col-lg-4 text-center" id="theme"><script type="text/javascript">GetTheme();</script></div>
				<div class="col-lg-4 text-center">00:00</div>
			</div>
		</div>
	</div>
	<div class="separator"></div>
		<div class="p-4">
			<div class="container">
				<h3 class="text-center"> Адрес узла / Маска подсети: </h3>
				<h3 id="task" class="text-center"><?php echo $taskList[0] ?></h3>
			</div>
		</div>
		<div class="separator"></div>
		<div class="answer-row p-4">
			<div class="container">
				<div class="d-flex justify-content-center">
					<div>
						<div class="m-sm-1">
							<label class="d-block" >Сетевой адрес</label>
							<input class="ip" type="number" name="netAddress1">.<input class="ip" type="number" name="netAddress2">.<input class="ip" type="number" name="netAddress3">.<input class="ip" type="number" name="netAddress4">
						</div>
						<div class="m-sm-1">
							<label class="d-block" >Адрес первого хоста</label>
							<input class="ip" type="number" name="addressFirstHost1">.<input class="ip" type="number" name="addressFirstHost2">.<input class="ip" type="number" name="addressFirstHost3">.<input class="ip" type="number" name="addressFirstHost4">
						</div>
						<div class="m-sm-1">
							<label class="d-block" >Адрес последнего хоста</label>
							<input class="ip" type="number" name="addressLastHost1">.<input class="ip" type="number" name="addressLastHost2">.<input class="ip" type="number" name="addressLastHost3">.<input class="ip" type="number" name="addressLastHost4">
						</div>
						<div class="m-sm-1">
							<label class="d-block" >Широковещательный адрес</label>
							<input class="ip" type="number" name="broadcastAddress1">.<input class="ip" type="number" name="broadcastAddress2">.<input class="ip" type="number" name="broadcastAddress3">.<input class="ip" type="number" name="broadcastAddress4">
						</div>
						<div class="m-sm-1">
							<label class="d-block" >Количество узлов</label>
							<input class="w-100" class="ip" type="number" name="">
						</div>
					</div>
					<button class="btn btn-ml d-block center bg-primary ml-1 text-white" id="back-btn" type="button" onclick="NextTask()">Ответить</button>
				</div>
			</div>
		</div>
		<div class="separator"></div>
		<div class="both-row">
			
		</div>	
<script src="js/postResults.js"></script>
</body>
</html>