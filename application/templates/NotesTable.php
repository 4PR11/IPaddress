<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	include($root."/logics/constants.php");

	$db = mysqli_connect(type,db_login,db_password, db_name);
	$result = mysqli_query ($db,'SELECT S.NAME, W.THEME, W.DATE, FROM logs L INNER JOIN works W ON (L.WR_ID = L.WR_ID) INNER JOIN STUDENTS S ON (L.ST_ID = S.ST_ID) WHERE (S.ST_ID = '.$_SESSION["id"].')');

echo '<table class="table" id="curWorksTable">'.
		'<thead>'.
            '<tr>'.
            	'<th>№</th>'.
            	'<th>Дата проведения</th>'.
            	'<th>Предмет</th>'.
            	'<th>Тема</th>'.
            	'<th>Оценка</th>'.
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
				 	'<td></td>'.
				 	'<td></td>'.
				 '</tr>';
			$i++;
		}
	echo'</tbody>'.
	'</table>';
	
	mysqli_close($db);
?>