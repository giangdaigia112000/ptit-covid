<?php
        session_start();
        require './connectdb.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql="SELECT * FROM login";
        $query = mysqli_query($connectdb,$sql);
        $checklogin = false;
        while($login = mysqli_fetch_array($query)){
                if($username == $login['username']&&$password==$login['password']){
                                $_SESSION['username']=$username;
                                $_SESSION['admin']= $login['admin'];
                                $checklogin=true;
                                header('Location:index.php');
                }
        }
        if($checklogin==false){
                $_SESSION['loginfailed']= 1;
                header('Location:login.php');
        }
?>