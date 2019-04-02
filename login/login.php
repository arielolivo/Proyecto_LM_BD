<?php
$email=trim(htmlspecialchars($_REQUEST["email"], ENT_QUOTES, "UTF-8"));
$pass=trim(htmlspecialchars($_REQUEST["password"], ENT_QUOTES, "UTF-8"));
echo $email;
echo $pass;
?>
