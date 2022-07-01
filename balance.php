<?php
session_start();
include 'logs.php';
if (array_key_exists('authorized', $_SESSION)) {
} else {
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
		<main class="main">
			<div class="menu">
				<ul class="menu__list">
					<a class="menu__account" href="user.php">Личный кабинет</a>
					<li><a href="user.php">Изменить свои данные</a></li>
					<li><a href="payments.php">Вывести историю платежей за все время</a></li>
					<li><a href="tarif.phpf">Подключенный тариф</a></li>
					<li><a href="deposit.php">Пополнение</a></li>
					<li><a href="balance.php">Баланс</a></li>
				</ul>
			</div>
			<?php
			$connection = new PDO("mysql:host=localhost;dbname=nazarov;charset=utf8;", "root", "root");
			$select = "SELECT balance FROM authors where Login = :login";
			$payments = $connection->prepare("$select");
			$payments->bindValue(":login", $_SESSION['login']);
			$payments->execute();
			echo '<div class="payments">
			<h2 class="payments_title">Ваш баланс</h2>';
			if ($payments->rowCount() > 0) {
				echo '<div class="payments__body">';
				foreach ($payments as $payment) {
					echo '
					<p class="payments__date">Текущий баланс: '. $payment["balance"] .'</p>';
				}
				echo '</div>';
			}
			echo '</div>';
			?>
		</main>
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