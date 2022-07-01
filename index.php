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
                <div class="active__block">
                    <div class="active__description">
                        <h2 class="active__header">Роутер</h2>
                        <p class="active__desc">Оформи договор и получи роутер бесплатно</p>
                        <button class="active__button">Узнать подробности</button>
                    </div>
                    <div class="active__img">  
                        <img class="active__router" src="img/router.png" alt="">
                    </div>
                </div>
                <div class="adv__connect">
                    <p class="adv__application">Отправьте заявку на подключение в  г. Москва</p>
                    <div class="adv__slider">
                        <ul class="slider">
                            <li>Домашний интернет</li>
                            <li>Комбо 2 в 1</li>
                            <li>Комбо 3 в 1</li>
                            <li>Комбо 4 в 1</li>
                            <li>Видеонаблюдение</li>
                        </ul>
                    </div>
                    <div class="tariff">
                        <div class="adv__tariff">
                            <p class="tariff__header">Технологии доступа</p>
                            <img class="tariff__icon" src="img/ethernet_icon.svg" alt="">
                            <div class="tariff__double">
                                <p class="tariff__speed">300 Мбит/с</p>
                                <p class="tariff__bonus">Безлимитный интернет</p>
                            </div>
                            <hr class="line__desc">
                            <p class="tariff__price">500</p>
                            <div class="tariff__triple">
                                <p class="tariff__currency">руб.</p>
                                <hr class="line__price">
                                <p class="tariff__duration">мес.</p>
                            </div>
                            <button class="tariff__connect">Подключить</button>
                            <a href="#" class="tariff__about">Подробнее о тарифе</a>
                        </div>
                        <div class="adv__tariff">
                            <p class="tariff__header">Технологии доступа</p>
                            <img class="tariff__icon" src="img/ethernet_icon.svg" alt="">
                            <div class="tariff__double">
                                <p class="tariff__speed">300 Мбит/с</p>
                                <p class="tariff__bonus">Безлимитный интернет</p>
                            </div>
                            <hr class="line__desc">
                            <p class="tariff__price">500</p>
                            <div class="tariff__triple">
                                <p class="tariff__currency">руб.</p>
                                <hr class="line__price">
                                <p class="tariff__duration">мес.</p>
                            </div>
                            <button class="tariff__connect">Подключить</button>
                            <a href="#" class="tariff__about">Подробнее о тарифе</a>
                        </div>
                        <div class="adv__tariff">
                            <p class="tariff__header">Технологии доступа</p>
                            <img class="tariff__icon" src="img/ethernet_icon.svg" alt="">
                            <div class="tariff__double">
                                <p class="tariff__speed">300 Мбит/с</p>
                                <p class="tariff__bonus">Безлимитный интернет</p>
                            </div>
                            <hr class="line__desc">
                            <p class="tariff__price">500</p>
                            <div class="tariff__triple">
                                <p class="tariff__currency">руб.</p>
                                <hr class="line__price">
                                <p class="tariff__duration">мес.</p>
                            </div>
                            <button class="tariff__connect">Подключить</button>
                            <a href="#" class="tariff__about">Подробнее о тарифе</a>
                        </div>
                        <div class="adv__tariff">
                            <p class="tariff__header">Технологии доступа</p>
                            <img class="tariff__icon" src="img/ethernet_icon.svg" alt="">
                            <div class="tariff__double">
                                <p class="tariff__speed">300 Мбит/с</p>
                                <p class="tariff__bonus">Безлимитный интернет</p>
                            </div>
                            <hr class="line__desc">
                            <p class="tariff__price">500</p>
                            <div class="tariff__triple">
                                <p class="tariff__currency">руб.</p>
                                <hr class="line__price">
                                <p class="tariff__duration">мес.</p>
                            </div>
                            <button class="tariff__connect">Подключить</button>
                            <a href="#" class="tariff__about">Подробнее о тарифе</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout__pay">
            <div class="container">
                <p class="checkout__service">Онлайн оплата услуг и проверка платежа</p>
                <div class="elemented">
                    <div class="first__element">
                        <div class="checkout__closed">
                            <div class="checkout__double">
                                <img class="checkout__warning" src="img/warning.svg" alt="">
                                <p class="mobile__header">Недоступность Apple Pay и Google Pay</p>
                            </div>
                            <p class="mobile__desc">Оплата Apple Pay и Google Pay недоступна. Если возникнут трудности - вы можете оплатить услуги банковской картой. Также, для вашего удобства, доступен «Обещанный платеж»</p>
                            <img class="mobile__img" src="img/mobile_pay.png" alt="">
                        </div>
                    </div>
                    <div class="other__elements">
                        <div class="find__pay">
                            <img src="img/finder.svg" alt="" class="finder">
                            <div class="search__box">
                                <p class="search__header">Поиск платежа</p>
                                <p class="search__desc">Проверьте историю платежей или выставленных счетов за услуги</p>
                            </div>
                        </div>
                        <div class="services__pay">
                            <img src="img/transfer.svg" alt="" class="trans">
                            <div class="search__box">
                                <p class="search__header">Поиск платежа</p>
                                <p class="search__desc">Проверьте историю платежей или выставленных счетов за услуги</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services">
            <div class="container">
                <p class="services__header">Популярные услуги</p>
                <div class="container__person">
                    <div class="person">
                        <a href="#"><img src="img/people1.png" alt=""></a>
                        <a class="person__header" href="#">Лицей — лучший помощник для подготовки к экзаменам!</a>
                        <p class="person__desc">Учитесь по программе ФГОС на интерактивной платформе</p>
                        <a class="person__about" href="#">Подробнее ></a>
                     </div>
                     <div class="person">
                        <a href="#"><img src="img/people2.png" alt=""></a>
                        <a class="person__header" href="#">Лицей — лучший помощник для подготовки к экзаменам!</a>
                        <p class="person__desc">Учитесь по программе ФГОС на интерактивной платформе</p>
                        <a class="person__about" href="#">Подробнее ></a>
                     </div>       
                     <div class="person">
                        <a href="#"><img src="img/people3.png" alt=""></a>
                        <a class="person__header" href="#">Лицей — лучший помощник для подготовки к экзаменам!</a>
                        <p class="person__desc">Учитесь по программе ФГОС на интерактивной платформе</p>
                        <a class="person__about" href="#">Подробнее ></a>
                     </div>
                     <div class="person">
                        <a href="#"><img src="img/people4.png" alt=""></a>
                        <a class="person__header" href="#">Лицей — лучший помощник для подготовки к экзаменам!</a>
                        <p class="person__desc">Учитесь по программе ФГОС на интерактивной платформе</p>
                        <a class="person__about" href="#">Подробнее ></a>
                     </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="sale__router">
                <img class="active__router" src="img/router.png" alt="">
                <div class="router__description">
                    <p class="router__header">Роутер</p>
                    <p class="router__desc">Оформи договор и получи роутер бесплатно</p>
                    <button class="router__next">Узнать подробности</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="advertisement">
                <p class="advertisement__header">Специальные предложения</p>
                <div class="container__adv">
                    <div class="yandex__station">
                        <img src="img/yandex_alisa.png" alt="">
                        <p class="yandex__header">Дружелюбная станция Яндекс.Алиса</p>
                        <p class="yandex__desc">Купите в пару кликов со скидкой в 20%</p>
                    </div>
                    <div class="yandex__station">
                        <img src="img/yandex_alisa.png" alt="">
                        <p class="yandex__header">Дружелюбная станция Яндекс.Алиса</p>
                        <p class="yandex__desc">Купите в пару кликов со скидкой в 20%</p>
                    </div>
                    <div class="yandex__station">
                        <img src="img/yandex_alisa.png" alt="">
                        <p class="yandex__header">Дружелюбная станция Яндекс.Алиса</p>
                        <p class="yandex__desc">Купите в пару кликов со скидкой в 20%</p>
                    </div>
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