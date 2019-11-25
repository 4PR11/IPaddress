<!DOCTYPE html>
<html>
<head>
	<?php
		include("./templates/base.php");
		base_render_head();
	?>
	<title>Авторизация</title>
</head>
<body>
	<div class="container">
		<!-- Сообщение об ощибке ввода -->
		<div id="notify" class="d-none" role="alert"></div>
		<form class="form-signin text-center" id="formLogin">
			<img class="mb-4" src="image/qwyt_DjfX24.png" alt="" width="150" height="150">
			<h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
			<div class="btn-cover">
				<div class="dropdown open">
				  <button class="mt-2 btn dropdown-toggle w-100 border form-control" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Войти как...</button>
				  <div class="dropdown-menu w-100">
				    <span class="dropdown-item" onclick="logFrm(1)">Ученик</span>
				    <span class="dropdown-item" onclick="logFrm(0)">Преподаватель</span>
				  </div>
				</div>
			</div>
			<!-- Вход не для админа-->
			<div id="admin-login" class="form-group">
				<!-- Поле для ввода логина -->
				<input class="form-control mt-2" type="text" name="Lgn" placeholder="Введите логин">
				<!-- Поле для ввода пароля -->
				<input class="form-control mt-2" type="password" name="pass" placeholder="Введите пароль">
			</div>	
			<!--Вход для админа-->
			<div id="neadmin-login" class="form-group">
				<!-- Комбобокс с группами -->
				<select name="group" class="form-control mt-2">
					<option value="-1" selected>Выберите группу...</option>
						<?php
							include_once("./templates/load_grups.php");		
						?>
				</select>
				<!-- Поле для ввода кода -->
				<input class="form-control mt-2" type="text" placeholder="Номер сдуденческого билета" name="code" pattern="[а-яА-я]{1}[0-9]{4}">	
			</div>
			<!-- Кнопка отправки данных -->
			<div id="form-controllers" class="form-group">
				<button class="btn btn-ml btn-block bg-primary mt-2 text-white" type="submit">Войти</button>
				<button class="btn btn-ml btn-block" id="back-btn" type="button" onclick="logFrm(2)">Назад</button>
			</div>
		</form>
	</div>
<?php
	base_render_footer();
?>
<script src="js/script.js"></script>
</body>
</html>