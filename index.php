<?php
session_start();

if(!isset($_SESSION['user'])){
   header("location: login.php");
}else{
   header("https://experience.arcgis.com/builder/?id=e4ea2315977a411288b03ef8e3330a21");
}