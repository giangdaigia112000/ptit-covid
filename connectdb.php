<?php
        $dbhost ="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="ptitcovid";
        $connectdb = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if($connectdb){
                mysqli_query($connectdb,"SET NAMES 'utf8'");
        } else {
                echo "Kết nối thất bại!!!".mysqli_connect_error();
        }
?>