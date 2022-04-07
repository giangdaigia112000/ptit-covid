<?php 
        session_start();
        require './connectdb.php';
        $idbaiviet = $_SESSION['idbaiviet'];
        $title = $_POST['title'];
        $img = $_POST['img'];
        $content = $_POST['content'];
        $sqlbaiviet="UPDATE `baiviet` SET `title`='{$title}',`img`='{$img}',`content`='{$content}' WHERE `idbaiviet`='{$idbaiviet}'";
        mysqli_query($connectdb,$sqlbaiviet);
        header('Location:thongtintiemchung.php');
?>