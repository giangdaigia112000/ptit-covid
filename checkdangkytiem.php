<?php
        session_start();
        require 'connectdb.php';
        $nguoidamho = $_POST['nguoidamho'];
        $ngaytiem = $_POST['ngaytiem'];
        $sdt = $_POST['sdt'];
        $buoitiem = $_POST['buoitiem'];
        $sqltiem="SELECT * FROM `tiem` WHERE `id`='".$_SESSION['username'] ."'";
        $querytiem = mysqli_query($connectdb,$sqltiem);
        while($tiem = mysqli_fetch_array($querytiem)){
            $mui1=$tiem['mui1'];
        }
        $id =$_SESSION['username'];
        if($mui1==0){
                $sqldktiem = "INSERT INTO `dktiem` (`username`, `nguoidamho`, `sdt`, `ngaytiem`, `buoitiem`,`checktiem`,`muitiem`) VALUES ('$id','$nguoidamho ','$sdt','$ngaytiem ','$buoitiem','0','1')";
        }else $sqldktiem = "INSERT INTO `dktiem` (`username`, `nguoidamho`, `sdt`, `ngaytiem`, `buoitiem`,`checktiem`,`muitiem`) VALUES ('$id','$nguoidamho ','$sdt','$ngaytiem ','$buoitiem','0','2')";
        mysqli_query($connectdb,$sqldktiem);
        $_SESSION['dktiem']=true;
        header('Location:dangky.php');
?>