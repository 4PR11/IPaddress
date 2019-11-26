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
