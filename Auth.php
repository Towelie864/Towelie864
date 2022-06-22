<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ветеринарная клиника</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<a href="index.html">Вернуться на главную страницу</a>
<a href="Registration.php">Зарегистрироваться</a>
<a href="Profile.php">Личный кабинет</a>
<form action="" method="POST">
	<fieldset>
		<legend>Войти в аккаунт</legend>
		<input type="text" name="Login" placeholder="Введите логин"><br>
		<input type="password" name="Password" placeholder="Введите ваш пароль"><br>
		<input type="submit" name="Submit" value="Войти в профиль">
	</fieldset>
</form>
</body>
</html>
<?php
$host='localhost';
$user='root';
$pass='root';
$name='0405';

if(isset($_REQUEST['Submit'])) {
	$login=$_REQUEST['Login'];
	$password=$_REQUEST['Password'];
	if (isset($login) AND isset($password)) {
		$link=mysqli_connect($host,$user,$pass,$name);
		$query="SELECT * FROM users WHERE Login='$login' AND Password='$password'";
		$result=mysqli_query($link,$query);
		$user1=mysqli_fetch_assoc($result);
		if (!empty($user1)){
			echo "Вы вошли в аккаунт";
			$_SESSION['login']=$login;
		} else {
			echo "Неверные данные";
		}
	} else {
		echo "Введены не все данные";
	}
}
?>