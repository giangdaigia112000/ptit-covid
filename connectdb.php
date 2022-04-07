<?php
        $dbhost ="x8autxobia7sgh74.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $dbuser="ywc50ze2or1zqfzz";
        $dbpass="akfayqcs13esmqp0";
        $dbname="rihsfukiozhtkti7";
        $port="3306";
        $connectdb = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$port);
        if($connectdb){
                mysqli_query($connectdb,"SET NAMES 'utf8'");
        } else {
                echo "Kết nối thất bại!!!".mysqli_connect_error();
        }
?>