<html>
<head>
	<meta charset="utf-8">
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.4.1.min.js"></script>
	
</head>
<body id="cover_body">
	<div id="cover_main" style="width: 0; height: 0">
		<!-- Форма -->
		<form id="formLogin" action="" method="post">
			<!-- Сообщение об ощибке ввода -->
			<div id="notify-cont"><div id="notify" style="display: none;"></div></div><br>
			<!-- Комбобокс с группами -->
			<select name="group" style="margin-bottom: 10px; border-radius: 4px; border-style: none; height: 33px; width: 230px;">
				<option value="-1" disabled selected>Выберите группу...</option>
					<?php
						$link =  mysqli_connect("localhost","root","","cygli");
						$sql = "SELECT GR_ID, NAME FROM GROUPS";
						if ($result = mysqli_query($link, $sql)){
							while($myrow = mysqli_fetch_assoc($result)) { ?>
					 			<option value ="<?php echo $myrow['GR_ID']; ?>"><?php echo $myrow['NAME']; ?></option>
					<?php }} ?>
			</select><br>
			<!-- Поле для ввода кода -->
			<input id="code-field" type="text" name="code" style="margin-bottom: 10px; border-radius: 4px; border-style: none; height: 33px; width: 230px;" pattern="[а-яА-я]{1}[0-9]{4}"><br>
			<!-- Кнопка отправки данных -->
			<input id="Start_btn" type="submit" name="" value="Войти">
		</form>
		<script src="js/script.js"></script>
		<script type="text/javascript">GetLogin();</script>
	</div>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script> -->
</body>
</html>