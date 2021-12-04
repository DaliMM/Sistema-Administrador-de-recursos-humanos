<?php
$dbhost = "localhost";
$dbuser = "testCurso";
$password = "1234";
$dbname = "curso_web_php";

$conn = mysqli_connect($dbhost, $dbuser, $password, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
	header("Location: ../indexInicio.php");
}
else if ($nr == 0) 
{
	echo "<script> alert('Error');window.location= '../index.php' </script>"; 
}
?>
