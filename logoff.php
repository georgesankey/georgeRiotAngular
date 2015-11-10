<?php
require __DIR__ . '/include/Auth.php';
$auth = new OMBAuth($cfg);
$auth->logout();

header('Location: index.php');
?>