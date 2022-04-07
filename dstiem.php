<?php
    require 'connectdb.php';
    require 'islogin.php';
    if($_SESSION['admin']==0){
        header('Location:canhan.php');
    }
    $sqldktiem="SELECT * FROM `dktiem` ";
    $querydktiem = mysqli_query($connectdb,$sqldktiem);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Logo_PTIT.jpg/600px-Logo_PTIT.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>PTIT-Covid "Quản lý tiêm chủng"</title>
</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <a class="col-4 logopage" href="./index.php">
                <img class="logo" src="https://lh3.googleusercontent.com/zihc3UZKqe_wJpAbIeAMYgiDBPPcGg-DvUxmFLc-O9I4DKhR-kt-sTLA2kmLoqpejIE" alt="Logo_PTIT">
                <h1>Quản lý tiêm chủng PTIT</h1>
            </a>
        </header>
        <div class="container" style="min-height:500px">
			<h1 style="margin-bottom: 50px">Danh sách đăng ký tiêm</h1>
            <div class="row"style="margin-bottom:20px">
                <input class="form-control col-6" id="search-dstiem" type="search" placeholder="Tra cứu theo mã sinh viên" >
            </div>
			<table class="table table-bordered" id="dstiem">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Mã sinh viên</th>
                                    <th scope="col">Ngày tiêm</th>
                                    <th scope="col">Buổi</th>
                                    <th scope="col">Mũi số</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $stt=0;
                                while($dktiem = mysqli_fetch_array($querydktiem)){
                                    $stt++;
                                    $buoitiem='';
                                    if($dktiem['buoitiem']==1) $buoitiem='Buổi sáng';
                                    elseif($dktiem['buoitiem']==2) $buoitiem='Buổi Chiều';
                                    if($dktiem['buoitiem']==3) $buoitiem='Cả ngày';
                                    if($dktiem['checktiem']==0){
                                        echo "
                                        <tr>
                                        <th scope='row'>{$stt}</th>
                                        <td>{$dktiem['username']}</td>
                                        <td>{$dktiem['ngaytiem']}</td>
                                        <td>{$buoitiem}</td>
                                        <td>{$dktiem['muitiem']}</td>
                                        <td><a href='checkduyetiem.php?id={$dktiem['iddk']}&username={$dktiem['username']}&mui={$dktiem['muitiem']}'>Duyệt</a></td>
                                        </tr>";
                                     }
                                }
                                ?>
                            </tbody>
                        </table> 
        </div>
		<footer>
                        <div class="text-center ">
                                <p>© Bản quyền thuộc HỌC VIỆN CÔNG NGHỆ BƯU CHÍNH VIỄN THÔNG, BAN PHÒNG CHỐNG DỊCH COVID-19</p>
                        </div>
                        <div class="d-flex justify-content-center ">
                                <div>
                                <P>Liên hiện: 012345678</P>
                                <p>Email: PtitCovid@gmail.com</p>
                                <p>Trụ sở chính: 122 Hoàng Quốc Việt, Q.Cầu Giấy, Hà Nội. </p>
                                </div>
                                <div>
                                <img width="50 " src="./img/boyte.jpg " alt=" ">
                                <img width="50 " src="./img/ptit.png " alt=" ">
                                </div>
                        </div>
                </footer>
</body>
<script src="js2.js"></script>
</html>