<html>
<head>
    <title>Тестируем PHP</title>
</head>
<body>
loging
<form method="post" action="">
<input type="text" name="pesel">
<button type="submit">Logowanie</button>
</form>
<?php
include "Klient.php";
if (!empty($_POST["pesel"])){
$client = new Klient();
if($client->checkLogin($_POST["pesel"]))
header("Location: main.php");
else
echo 'nie ma takiego uzytkownika';
}
?>
<a href="nowy_konto.php">zalozyc nowy konto</a>

</body>
</html>