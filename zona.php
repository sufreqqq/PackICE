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
    <link rel="stylesheet" href="style.css">
    <title>PackICE</title>
</head>

<body>
    <nav>
        <div class="head">
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
        <p class="zona__title">Зона покрытия интернета</p>
        <div class="zona__carta">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae11c7ab52b2f9b7345315e7b1e3e67dea36d0c3570e00ee89d728faaf8143676&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
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
    </nav>

</body>


</html>