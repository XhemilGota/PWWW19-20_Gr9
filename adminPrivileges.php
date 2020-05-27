<?php
if((!isset($_SESSION['admin'])) || ($_SESSION['admin']!=1))
{
    header('location: 404.php');
}
?>