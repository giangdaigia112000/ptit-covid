<?php
        session_start();
        require 'connectdb.php';
        $newpass = $_POST['newpass'];
        $sqlnewpass = "UPDATE  `login` SET `password`={$newpass} WHERE `id`='{$_SESSION['username']}'";
        mysqli_query($connectdb,$sqlnewpass);
        $_SESSION['newpass']=true;
        header('Location:canhan.php');
?>