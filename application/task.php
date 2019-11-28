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
	        $manager = $_SESSION[TASK_NAME];
	        //print_r($manager); 
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
				<h3 class="text-center" > Адрес узла / Маска подсети: <h3>
				<?php echo $manager->getTaskStr(0); ?>
			</div>
		</div>
		<div class="separator"></div>
		<div class="answer-row">
			<div class="container">

				<button class="btn btn-ml d-block center bg-primary mt-2 text-white" id="back-btn" type="button" onclick="NextTask()">Ответить</button>
			</div>
		</div>
		<div class="separator"></div>
		<div class="both-row">
			
		</div>	
<script src="js/postResults.js"></script>
</body>
</html>