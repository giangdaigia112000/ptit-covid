<?php
        session_start();
        require './connectdb.php';
        if(isset($_SESSION['username'])){
        $sqluser="SELECT * FROM `information` WHERE `id`='{$_SESSION['username']}'";
        $queryuser = mysqli_query($connectdb,$sqluser);
        while($user = mysqli_fetch_array($queryuser)){
            $name=$user['name'];
            $birthday=$user['birthday'];
            $sex=$user['sex'];
            $diachi=$user['diachi'];
            $sdt=$user['sdt'];
            $cccd=$user['cccd'];
            $nganh=$user['nganh'];
            $idclass=$user['idclass'];
            $dantoc=$user['dantoc'];
        }
}
function checklogin(){
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
}
?>