<?php
session_start();
unset($_SESSION["usuario"], $_SESSION["rut"]);
setcookie('PHPSESSID', '', time() - 3600, '/');


setcookie ("nameCookieAdm", "", time() - 3600, "/");
setcookie ("userCookieAdm", "", time() - 3600, "/");
setcookie ("rutCookieAdm", "", time() - 3600, "/");

setcookie ("nameCookieProf", "", time() - 3600, "/");
setcookie ("userCookieProf", "", time() - 3600, "/");
setcookie ("rutCookieProf", "", time() - 3600, "/");

setcookie ("nameCookieEstd", "", time() - 3600, "/");
setcookie ("userCookieEstd", "", time() - 3600, "/");
setcookie ("rutCookieEstd", "", time() - 3600, "/");


session_destroy();

sleep(3);

header('Location: ../../index.php');
?>