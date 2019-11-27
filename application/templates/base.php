<?php

	function base_render_head(){
		echo(
			'<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
			<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css"> 
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<script src="js/jquery-3.4.1.min.js"></script>	
			<script src="js/popper.min.js"></script>
			<script src="js/bootstrap.min.js"></script>'
		);
	}

	function base_render_main_menu(){

	}

	function base_render_footer(){
		echo('<footer class="footer">
		      <div class="container">
			        <a href="http://www.rpcollege.ru/">
			        	<p class="text-muted text-center">©Полиграф Мир 2019-2020</p>
			        </a>
		      </div>
		    </footer>');
	}
?>