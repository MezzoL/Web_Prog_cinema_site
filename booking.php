<?php
ob_start();
session_start();
if(isset($_GET['movie_id']) AND isset($_SESSION["id"])){
    $movie_id =$_GET['movie_id'];
    $user_id=$_SESSION["id"];

}elseif (isset($_GET['movie_id']) AND !isset($_SESSION["id"])){
    header("Location: login.php");
}
?>