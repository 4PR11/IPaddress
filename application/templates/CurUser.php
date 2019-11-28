<?php
	function render_name(){
		if ($_SESSION["name"] != "") 
			echo $_SESSION["name"];
		else echo "Гость";
	}

	function render_status($data, $trueResultTxt, $falseResulTxt){
		if ($data != "") 
			echo $trueResultTxt;
		else echo $falseResulTxt;
	}

	function log_out_btn(){
		if ($_SESSION["name"] != "")
			echo "<input type='button' class='btn btn-primary add-btn' value='Выйти' onclick='logOut()'>";
		else 
			echo "<input type='button' class='btn btn-primary add-btn' value='Войти' onclick='logOut()'>";
	}

	function render_kartochka(){
		if ($_SESSION["role"] == "0"){
			echo "<a id='kartochka' class='nav-link text-white' href='/teacher'>Карточка преподавателя</a>";
		}
		else 
		{
			if ($_SESSION["role"] == "1"){
				echo "<a id='kartochka' class='nav-link text-white' href='/Student'>Карточка студента</a>";
			}
		}
	}
?>
