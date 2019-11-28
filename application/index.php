<?php
	require 'Slim/Slim.php';

	\Slim\Slim::registerAutoloader();

	session_start();

	$app = new \Slim\Slim();

	$app->get(
	    '/login',
	    function () {
	        Include("login.php");
	    }
	);

	$app->get(
	    '/',
	    function () {
	        Include_once("main.php");
	    }
	);

	$app->get(
	    '/task',
	    function () {
	        Include_once("task.php");
	    }
	);

	$app->get(
	    '/teacher',
	    function () {
	        Include("teacher.php");
	    }
	);

	$app->get(
	    '/Student',
	    function () {
	        Include("Student.php");
	    }
	);

	$app->post(
	    '/InsertWork',
	    function () {
	        Include("./logics/InsertWork.php");
	    }
	);

	$app->post(
	    '/DeleteWork',
	    function () {
	        $db = mysqli_connect("localhost","root","","cygli");

			if ($result = mysqli_query($db, "DELETE FROM works WHERE (WR_ID = ".$_POST['id'].")"))
			{
				echo "success";
			}
			mysqli_close($db);
	    }
	);

	$app->post(
	    '/GetStudentList',
	    function (){
			$db = mysqli_connect("localhost","root","","cygli");

			if ($result = mysqli_query($db, "SELECT DISTINCT S.NAME FROM lists L INNER JOIN works W ON (W.WR_ID = L.WR_ID) INNER JOIN students S ON (L.ST_ID = S.ST_ID) WHERE (L.WR_ID = ".$_POST['id'].")"))
			{
				while($myrow = mysqli_fetch_assoc($result)) {
					echo ($myrow["NAME"]);
					echo "\n";
				}
				mysqli_free_result($result);
			}
			mysqli_close($db);
	    }
	);

	$app->post(
	    '/LoadTheme',
	    function () {
	    	$root = $_SERVER['DOCUMENT_ROOT'];
			include($root."/logics/constants.php");

			$link = mysqli_connect(type,db_login,db_password, db_name);
			if ($result = mysqli_query($link,"SELECT * FROM works WHERE (WR_ID = ".$_SESSION['wr_id'].")")){
				$row = mysqli_fetch_assoc($result);
				echo $row["THEME"];
			} else {
				echo $_SESSION["wr_id"];
			}
	    }
	);

	$app->post(
	    '/LoadWorks',
	    function () {
	        $root = $_SERVER['DOCUMENT_ROOT'];
			include($root."/logics/constants.php");

			$db = mysqli_connect(type,db_login,db_password, db_name);
			$sql = "SELECT W.WR_ID, W.THEME FROM works W INNER JOIN lists L on (W.WR_ID = L.WR_ID) WHERE (L.ST_ID = ".$_SESSION['id'].")";
			if ($result = mysqli_query($db, $sql))
			{
				echo "<option value='-2' disabled selected=''>Выберите работу</option>";
				while($myrow = mysqli_fetch_assoc($result)) {
					echo ('<option value ="'.$myrow['WR_ID'].'">'.$myrow['THEME'].'</option>');
				}
				mysqli_free_result($result);
			}
			mysqli_close($db);
	    }
	);

	$app->post(
	    '/SetWork',
	    function () {
	        $_SESSION["wr_id"] = $_POST['work-select'];

			include("Gens/Gens.php");
			$manager = new managerTask_Ip(4);
		    $_SESSION["ip"] = $manager;

	        echo $_SESSION["wr_id"];
	        echo $manager->getTaskStr(0);
	    }
	);

	$app->post(
	    '/LogOut',
	    function () {
	        session_unset();
	        session_destroy();
	        echo "succes_status";
	    }
	);

	$app->post(
	    '/WorkerSignIn',
	    function () {
	        $login = $_POST['Lgn'];
			$pass = $_POST['pass'];
			
			$link =  mysqli_connect("localhost","root","","cygli");
			$result = mysqli_query ($link,"SELECT * FROM WORKERS WHERE (LOGIN = '$login')");

			$row = mysqli_fetch_assoc($result);
			if (($row["PASSWORD"] != "") && (strcmp($row["PASSWORD"],$pass)===0)){
				$_SESSION["name"] = $row["NAME"];
				$_SESSION["id"] = $row["WO_ID"];
				$_SESSION["role"] = "0";
			} else{
				echo "error";
			}
			mysqli_close($link);
	    }
	);

	$app->post(
	    '/StudentSignIn',
	    function () {
	        $group = $_POST['group'];
			$code = $_POST['code'];
			
			$link =  mysqli_connect("localhost","root","","cygli");
			$result = mysqli_query ($link,"SELECT S.ST_ID, G.GR_ID, S.NAME FROM STUDENTS S INNER JOIN GROUPS G ON (S.GR_ID = G.GR_ID) WHERE (S.GR_ID = '$group') AND (S.ADC = '$code')");

			$row = mysqli_fetch_assoc($result);
			if (($row["GR_ID"] != "") && (strcmp($row["GR_ID"],$group)===0)){
				$_SESSION["name"] = $row["NAME"];
				$_SESSION["id"] = $row["ST_ID"];
				$_SESSION["role"] = "1";
			} else{
				echo "error";
			}
			mysqli_close($link);
	    }
	);

	$app->run();
?>