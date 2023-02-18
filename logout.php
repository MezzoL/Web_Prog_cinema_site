<?php
try
{
    require_once 'utils/init.php';
}
catch (Throwable $exp) {}
session_start();
session_destroy();
header("Location: index.php");
?>