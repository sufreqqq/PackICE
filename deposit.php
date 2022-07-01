<?php
session_start();
include 'logs.php';
if (array_key_exists('authorized', $_SESSION)) {
} else {
   $_SESSION['authorized'] = 0;
}

if (isset($_POST["deposit"]) && $_POST["deposit"] != "") {
   $connection = new PDO("mysql:host=localhost;dbname=nazarov;charset=utf8;", "root", "root");
   $sql = "SELECT balance From authors WHERE login = :login";
   $payments = $connection->prepare("$sql");
   $payments->bindValue(":login", $_SESSION['login']);
   $payments->execute();
   $balance;
   if ($payments->rowCount() > 0) {
      foreach ($payments as $payment) {
         $balance = $payment["balance"];
      }
   }


   $balance += $_POST["deposit"];
   $sql = "UPDATE authors SET balance = :deposit WHERE login = :login";
   $stmt = $connection->prepare("$sql");
   $stmt->bindValue(":login", $_SESSION['login']);
   $stmt->bindValue(":deposit",$balance);
   $stmt->execute();

   $sql = "INSERT INTO payments (cost, date, idAuthor) VALUES (:deposit, CURRENT_DATE(), :login);";
   $stmt = $connection->prepare("$sql");
   $stmt->bindValue(":login", $_SESSION['login']);
   $stmt->bindValue(":deposit",$_POST["deposit"]);
   $stmt->execute();
   header('Location: balance.php');
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
               <li><a href="tarif.php">Подключенный тариф</a></li>
               <li><a href="deposit.php">Пополнение</a></li>
               <li><a href="balance.php">Баланс</a></li>
            </ul>
         </div>
         <div class="deposit">
            <h2 class="payments_title">На сколько хотите пополнить баланс?</h2>
            <form class="deposit__form" action="deposit.php" method="POST">
               <input class="deposit__input" name="deposit" min="100" step="50" type="number" placeholder="Введите число" value="100">
               <button class="deposit__sumbit" type="submit">Пополнить</button>
            </form>
         </div>
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