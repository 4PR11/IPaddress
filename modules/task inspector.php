<?php
include('Gens/Gens.php');
session_start();
$data = json_decode($_POST['dat']);
$answers = $_SESSION['ip']->inspect($data);
echo (json_encode($answers));
?>