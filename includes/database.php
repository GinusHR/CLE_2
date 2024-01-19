<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "cle2_project_sql";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());