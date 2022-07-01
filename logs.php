<?php
   function logs($pdo, $action){
   $stmt = $pdo->prepare("INSERT INTO logs( action, userAgent) VALUES (:act, :userAgent)");
   $stmt->execute(array('act' => $action, 'userAgent' => $_SERVER['HTTP_USER_AGENT'] ));
   }
?>