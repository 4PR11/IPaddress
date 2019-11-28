<!DOCTYPE html>
<html>
<head>
	<?php
		include("./templates/base.php");
		include("./templates/CurUser.php");
		base_render_head();
	?>
	<title>Главная</title>
</head>
<body>
	<header>
	<nav class="navbar navbar-expand-lg navbar-light theme-coulor">
	<div class="container">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item"><?php render_kartochka(); ?></li>
	    </ul>
		<span class="name-of"><?php render_name(); ?></span>
	    <?php log_out_btn(); ?>
	  </div>
	</div>
	</nav>
	</header>
	<div class="container">
		<h3 class="text-center mt-3">Список заданий для тренировки</h3>
		<div class="separator"></div>
		<div class="list-group mt-3 mb-3">
		  <a id="myInput" href="/task" class="list-group-item list-group-item-action">Маршрутизация</a>
		  <a href="#" class="list-group-item list-group-item-action disabled">[Закрыто]</a>
		  <a href="#" class="list-group-item list-group-item-action disabled">[Закрыто]</a>
		  <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">[Закрыто]</a>
		</div>
		<div class="separator"></div>
	</div>
<?php
	base_render_footer();
?>
</body>
</html>