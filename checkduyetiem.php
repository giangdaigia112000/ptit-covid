<?php
        require './connectdb.php';
        require './islogin.php';
        checklogin();
        $iddk=$_GET['id'];
        $usernamedk=$_GET['username'];
        $mui=$_GET['mui'];
        echo $mui;
        $updatedktiem="UPDATE `dktiem` SET `checktiem`='1' WHERE `iddk`={$iddk}";
        mysqli_query($connectdb,$updatedktiem);
        if($mui==1){
                $updatetiem="UPDATE `tiem` SET `mui1`='1' WHERE `id`='{$usernamedk}'";        
        }else{
                $updatetiem="UPDATE `tiem` SET `mui2`='1' WHERE `id`='{$usernamedk}'";   
        }
        mysqli_query($connectdb,$updatetiem);
        header('Location:dstiem.php');
?>
