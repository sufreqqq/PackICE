<?php
session_start();
include 'logs.php';
if (array_key_exists('authorized', $_SESSION)) {
} else {
	$_SESSION['authorized'] = 0;
}
//$connection = new PDO("mysql:host=localhost;dbname=rss_news;charset=utf8;", "root", "");
if (isset($_POST['login']) && isset($_POST['password'])) {
	$connection = new PDO("mysql:host=localhost;dbname=nazarov;charset=utf8;", "root", "");
	$Users = $connection->prepare("SELECT Login, Password, Name, Role, idAuthor FROM authors;");
	$Users->execute();
	while ($rowName = $Users->fetch()) {
		$UsersList[$rowName['Login']] = $rowName['Password'];
		$UsersList2[$rowName['Login']] = $rowName['Name'];
		$UsersList3[$rowName['Login']] = $rowName['Role'];
		$UsersList4[$rowName['Login']] = $rowName['idAuthor'];
	}
	if (array_key_exists($_POST['login'], $UsersList)) {
		if ($_POST['password'] == $UsersList[$_POST['login']]) {
			$_SESSION['authorized'] = $UsersList3[$_POST['login']];
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['name'] = $UsersList2[$_POST['login']];
			$_SESSION['id'] = $UsersList4[$_POST['login']];
			logs($connection, 'Авторизация пользователя');
		}
	}
}

if (isset($_POST['name_update']) && isset($_POST['login_update']) && isset($_POST['password_update'])) {
	$connection = new PDO("mysql:host=localhost;dbname=nazarov;charset=utf8;", "root", "");
	$login = $_SESSION['login'];
	if ($_POST['name_update'] != "") {
		$new_name = $_POST['name_update'];
		$Update = 'UPDATE authors SET Name = "' . $new_name . '" WHERE Login = "' . $login . '"';
		$count = $connection->exec($Update);
	}
	if ($_POST['login_update'] != "") {
		$new_login = $_POST['login_update'];
		$Update = 'UPDATE authors SET Login =  "' . $new_login . '" WHERE login = "' . $login . '"';
		$count = $connection->exec($Update);
	}
	if ($_POST['password_update'] != "") {
		$new_password = $_POST['password_update'];
		$Update = 'UPDATE authors SET Password = "' . $new_password . '" WHERE login = "' . $login . '"';
		$count = $connection->exec($Update);
	}
	logs($connection, 'Изменение информации пользователя');
	$_SESSION['authorized'] = 0;
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
	</div>
	<div class="container">
		<?php
		if ($_SESSION['authorized'] == 0) {
			echo '<div class="user">
				<h1 class="user__title">Авторизация</h1>
				<div class="user__container">
					<form class="user__form form-search" method="post">
						<input class="form-search__input-text" type="text" name="login" placeholder="Логин">
						<input class="form-search__input-text" type="password" name="password" placeholder="Пароль">
						<input class="form-search__input-submit" type="submit" value="Отправить">
					</form>
					<a href="register.php" class="user__register">Еще не зарегистрированы?</a>
				</div>
			</div>';
		} else {
			echo '
				<main class="main">
					<div class="menu">
						<ul class="menu__list">
							<a class="menu__account" href="user.php">Личный кабинет</a>
							<li><a href="user.php">Изменить свои данные</a></li>
							<li><a href="payments.php">Вывести историю платежей за все время</a></li>
							<li><a href="tarif.php">Подключенный тариф</a></li>
							<li><a href="deposit.php">Пополнение</a></li>
							<li><a href="balance.php">Баланс</a></li>
						</ul>
					</div>
					<div class="authorized__container">
						<h2 class="authorized__edit">Изменить свои данные</h2>
						<form class="user__form form-search" method="post">
							<input class="form-search__input-text" type="text" value="' . $_SESSION['name'] . '"name="name_update" placeholder="Имя">
							<input class="form-search__input-text" type="text"  name="login_update" placeholder="Логин">
							<input class="form-search__input-text" type="password" name="password_update" placeholder="Пароль">
							<input class="form-search__input-submit" type="submit" value="Отправить">
						</form>
						<a href="exit.php" class="exit-link">Выйти</a>
					</div>		
				</main>';
		}
		?>
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
	</div>
</body>

</html>