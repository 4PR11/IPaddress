<?php

function task_render_header($user_name, $task_name){
	echo(
	'<div class="container">
		<div class="row top-row">
		      <div class="col-lg-4 text-center">'.$user_name.'</div>
			  <div class="col-lg-4 text-center">'.$task_name.'</div>
			  <div class="col-lg-4 text-center">00:00</div>
		</div>
	</div>'
	);

function task_render_body($model){
	echo('
		<div class="container">'.
			$model
		.'</div>
		');
}

function task_render_answer_form($model){
		echo('
		<div class="container">'.
			"some html"
		);
}


}

?>