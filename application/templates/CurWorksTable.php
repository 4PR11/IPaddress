<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	include($root."/logics/constants.php");

	$db = mysqli_connect(type,db_login,db_password, db_name);
	$result = mysqli_query ($db,'SELECT W.DATE, W.THEME, S.NAME AS "SBNAME", WO.NAME AS "WONAME", M.NAME AS "MONAME" FROM works W INNER JOIN subjects S ON (W.SB_ID = S.SB_ID) INNER JOIN workers WO ON (WO.WO_ID = W.WO_ID) INNER JOIN modules M ON (M.MO_ID = W.MO_ID)');

echo '<table class="table" id="curWorksTable">'.
		'<thead>'.
            '<tr>'.
            	'<th>№</th>'.
            	'<th>Дата проведения</th>'.
            	'<th>Предмет</th>'.
            	'<th>Преподаватель</th>'.
            	'<th>Модуль</th>'.
            	'<th>Тема</th>'.
            '</tr>'.
        '</thead>'.
        '<tbody>';
        $i=1;
		while( $row = mysqli_fetch_assoc($result) ){
			$date = $row["DATE"];
			if ($date == "") $date = "постоянная";
			echo '<tr>'.
				 	'<th scope="row">'.$i.'</th>'.
				 	'<td>'.$date.'</td>'.
				 	'<td>'.$row["SBNAME"].'</td>'.
				 	'<td>'.$row["WONAME"].'</td>'.
				 	'<td>'.$row["MONAME"].'</td>'.
				 	'<td>'.$row["THEME"].'</td>'.
				 	'<td>Удаление</td>'.
				 	'<td>Список участников</td>'.
				 '</tr>';
			$i++;
		}
	echo'</tbody>'.
	'</table>';
	
	mysqli_close($db);
?>