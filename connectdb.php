<?php
        $dbhost ="o2olb7w3xv09alub.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $dbuser="t2td0zkieyi5c6lw";
        $dbpass="oij9hp5tiff12h95";
        $dbname="svw1fm9rmdyc1cfy";
        $port="3306";
        $connectdb = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$port);
        if($connectdb){
                mysqli_query($connectdb,"SET NAMES 'utf8'");
        } else {
                echo "Kết nối thất bại!!!".mysqli_connect_error();
        }
?>