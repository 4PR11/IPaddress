<!DOCTYPE html>
<html>
<head>
	<?php
		include_once("./templates/base.php");
		include("./templates/task.php");
		 base_render_head();
	?>
	<link rel="stylesheet" type="text/css" href="css/task.css">
	<title>Задания</title>
</head>
<body>
	<div class="top-row">
	      <?php
	      	task_render_header("{current_user.name}", "{task.name}");
	      ?>
	</div>
	<div class="separator"></div>
		<div class="p-4">
			<?php
				task_render_body('<h3 class="text-center" >Адрес узла / Маска подсети:<h3>')
			?>			
		</div>
		<div class="separator"></div>
		<div class="answer-row">
			<?php
				task_render_answer_form('');
			?>	
				<button class="btn btn-ml d-block center bg-primary mt-2 text-white" id="back-btn" type="button" onclick="NextTask()">Ответить</button>
			</div>
		</div>
		<div class="separator"></div>
		<div class="both-row">
			
		</div>	
<script src="js/postResults.js"></script>
</body>
</html>