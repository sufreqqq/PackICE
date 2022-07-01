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
                <div class="container__about">
                    <div class="about__text">
                        <p class="zona__title">О компании «PackICE»</p>
                        <p class="about__1">ПАО «PackICE» (<a class="about__site" href="https://www.google.com">www.packice.ru</a>) — крупнейший в России интегрированный провайдер цифровых услуг и решений, который присутствует во всех сегментах рынка и охватывает миллионы домохозяйств, государственных и частных организаций.</p>
                        <p class="about__1">Компания занимает лидирующие позиции на рынке услуг высокоскоростного доступа в интернет и платного телевидения. Количество клиентов услуг доступа в интернет с использованием оптических технологий составляет около 11 млн, платного ТВ — 11 млн пользователей, из них свыше 6,4 млн — IPTV.</p>
                        <p class="about__1">Выручка группы компаний за 2021 год составила 580,1 млрд руб., OIBDA достигла 218,8 млрд руб. (37,7% от выручки), чистая прибыль — 31,8 млрд руб.</p>
                        <p class="about__1">«PackICE» является лидером рынка телекоммуникационных услуг для органов государственной власти России и корпоративных пользователей всех уровней.</p>
                        <p class="about__1">Компания — признанный технологический лидер в инновационных решениях в области электронного правительства, кибербезопасности, дата-центров и облачных вычислений, биометрии, здравоохранения, образования, жилищно-коммунальных услуг.</p>
                    </div>
                    <div class="about__img"></div>
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
    </nav>

</body>


</html>