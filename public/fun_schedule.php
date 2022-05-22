<?php
function php_func(){
    shell_exec("php artisan short-schedule:run");
}
php_func();
?>

<!--
$hola = shell_exec("ifconfig");
echo $hola;
-->