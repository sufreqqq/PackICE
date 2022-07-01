<?php
session_start();
include 'logs.php';
if (array_key_exists('authorized', $_SESSION)) {
} else {
	$_SESSION['authorized'] = 0;
}

if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['password'])) {
	if (($_POST['name'] != "") && ($_POST['login'] != "") && ($_POST['password'] != "")) {
		$connection = new PDO("mysql:host=localhost;dbname=nazarov;charset=utf8;", "root", "");
		$login = $_POST['login'];
		$sql = "SELECT * FROM authors WHERE Login = $login";
		$query = $connection->prepare("$sql");
		$query->execute();
		if ($query->rowCount() > 0) {
			$_SESSION["authError"] = true;
		} else {
			$name = $_POST['name'];
			$password = $_POST['password'];

			$query = "INSERT INTO authors (Login, Password, Name) VALUES('$login', '$password', '$name')";
			$count = $connection->exec($query);
			logs($connection, 'Регистрация');
			header('Location: user.php');
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Nazarov_A_E_VD50-1-19_STAGE3.css">
	<title>Личный кабинет</title>
</head>

<body>
	<div class="container">
	<div class="navigation">
				    <img class="nav__logo" src="img/Logo_horizontal.png" alt="logo">
                    <a href="index.php">Главная</a>
                    <a href="zona.php">Зона покрытия</a>
                    <a class="text__exit" href="about.php">О нас</a>
                    <?php
				    if ($_SESSION['authorized'] <> 0) {
				    	echo '<li><a href="user.php">' . $_SESSION['name'] . '</a></li>';
				    } else {
				    	echo '<div class="exit__button">
				    	<a href="user.php">Войти</a>
				    	<img class="button__exit" src="img/Button_exit.png" alt="">
				    </div>
				    	';
				    }
				    ?>
                </div>

		<div class="user">
			<h1 class="user__title">Зарегистрироваться</h1>
			<div class="user__container">
				<form class="user__form form-search" method="post">
					<input class="form-search__input-text" type="text" name="name" placeholder="Имя">
					<input class="form-search__input-text" type="text" name="login" placeholder="Логин">
					<input class="form-search__input-text" type="password" name="password" placeholder="Пароль">
					<input class="form-search__input-submit" type="submit" value="Отправить">
				</form>
				<a href="user.php" class="user__register">Уже есть аккаунт?</a>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="container__footer">
				<div class="containter__help">
					<p class="contact_1">Служба поддержки</p>
					<p class="contact__number_1">8 800 707 12 12</p>
					<p class="contact_2">Служба поддержки</p>
					<p class="contact__number_2">8 800 707 80 28</p>
				</div>
				<ul class="products">
					<li><a href="#">Продукты</a></li>
					<li><a href="#">Пакеты</a></li>
					<li><a href="#">Интернет</a></li>
					<li><a href="#">Кабельное ТВ</a></li>
					<li><a href="#">Бонусы</a></li>
				</ul>
				<ul class="decisions">
					<li><a href="#">Решения</a></li>
					<li><a href="#">Пакеты с мобильной связью</a></li>
					<li><a href="#">Интернет в частный дом</a></li>
					<li><a href="#">Видеонаблюдение</a></li>
					<li><a href="#">Архив тарифов</a></li>
				</ul>
				<ul class="help">
					<li><a href="#">Центр поддержки</a></li>
					<li><a href="#">Помощь</a></li>
					<li><a href="#">Обратная связь</a></li>
					<li><a href="#">Офисы продаж</a></li>
				</ul>
			</div>
		</div>
	</footer>
	<?php
	echo $_SESSION["authError"];
	echo "0";

	if (isset($_SESSION["authError"]) and $_SESSION["authError"]) {
		$_SESSION["authError"] = false;
		echo '<script language="javascript">alert("Логин уже занят!")</script>';
	}
	?>
</body>

</html>