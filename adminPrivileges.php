<?php
if((!isset($_SESSION['admin'])) || ($_SESSION['admin']!=1))
{
    echo "<script>window.location.href = '404.php'</script>";
}
?>