<!DOCTYPE html>
<html>
<head>
	<?php
		include("./templates/base.php");
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
	      <li class="nav-item active">
	        <!--<a id="" class="nav-link text-white" href="#">Задания<span class="sr-only">(current)</span></a>-->
	      </li>
	      <li class="nav-item">
	        <a id="kartochka" class="nav-link text-white" href="./teacher.php">Карточка</a>
	      </li>
	    </ul>
		<span class="name-of"><?php echo $GLOBALS['Current_User']["name"]; ?></span>
	    <a class="btn btn-primary" href="/login"> Войти </a>
	  </div>
	</div>
	</nav>
	</header>
	<div class="container">
		<h3 class="text-center mt-3">Список заданий для тренировки</h3>
		<div class="separator"></div>
		<div class="list-group mt-3 mb-3">
		  <a id="myInput" href="./task.php?&id=123" class="list-group-item list-group-item-action">Маршрутизация</a>
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