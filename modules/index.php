<?php
	include('Gens/Gens.php');
    //стартуем сессию
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Тест блоков</title>
	<meta charset="utf-8">
	<script src="postResults.js"></script>
<?php
    // берем значение из базы
    const TASK_NAME = 'ip';  // индефикатор задания
    const TASK_NUM = 3; // колво заданий
    echo "<script type='text/javascript'> const TASKS_NUM = ".TASK_NUM."; </script>"; // передаем ещё в яву скрипт
	//unset($_SESSION[TASK_NAME]); // для отладки!!!!!
	if (!isset($_SESSION[TASK_NAME])) {
        $manager = new managerTask_Ip(4); 
        $_SESSION[TASK_NAME] = $manager; 
	} else {
        $manager = $_SESSION[TASK_NAME];    
    }
?>
<style type="text/css">

	.byte {
	  border: none;
	  background: transparent;
	  width: 22px;
	  text-align: left;
	  padding: 0;
	}

	#id {
	  padding-left: 5px;
	  border: 1px silver solid;
	  width: 160px;
	  box-shadow: 0 0 10px silver;
	}

	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	    -webkit-appearance: none;
	    margin: 0;
	}

    * {
        outline: 0 !important;
    }
</style>
</head>
<body>
<table>
    <tr>
        <td>Ip-adress and Mask</td>
        <?php
            //print_r($manager->task_list[0]);
            echo "<td id='task'>".$manager->getTaskStr(0)."</td>";
        ?>
    </tr>
    <tr>
        <td>Net-adress</td>
        <td>
        	<input class="ip" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}" name="netAddress">
        </td>
    </tr>
    <tr>
        <td>Adress first host</td>
        <td>
        	<input class="ip" name="addressFirstHost">
        </td>
    </tr>
    <tr>
        <td>Adress last host</td>
        <td>
        	<input class="ip" name="addressLastHost">
        </td>
    </tr>
    <tr>
        <td>Broadcast address</td>
        <td>
        	<input class="ip" name="broadcastAddress">
        </td>
    </tr>
    <tr>
        <td>Net Nodes Num</td>
        <td>
        	<input type="number" min="0" name="netNodesNum">
        </td>
    </tr>
</table>
	<button onclick="NextTask()">Ответить</button>
</body>
</html>
