<?php

	function teacher_render_head(){
		echo(
			'<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
			<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css"> 
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="stylesheet" type="text/css" href="css/teacher.css">
			<script src="js/jquery-3.4.1.min.js"></script>	
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>'
		);
	}

	function teacher_render_header(){
		echo(
		'<div class="container">
			<div class="row top-row">
				  <div class="col-lg-4 text-center"></div>
				  <div class="col-lg-4 text-center"></div>
				  <div class="col-lg-4 text-center"></div>
				  <input type="button" value="" name="sing-in-btn"></div>
			</div>
		</div>'
		);
	}

	function teacher_render_footer(){
		echo(
			'<footer class="footer">
		      <div class="container">
			        <a href="http://www.rpcollege.ru/">
			        	<p class="text-muted text-center">©Полиграф Мир 2017-2018</p>
			        </a>
		      </div>
		    </footer>');
	}


?>