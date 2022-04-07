<?php
        require 'connectdb.php';
        require 'islogin.php';
        checklogin();
        $sqltiem="SELECT * FROM `tiem` WHERE `id`='".$_SESSION['username'] ."'";
        $querytiem = mysqli_query($connectdb,$sqltiem);
        while($tiem = mysqli_fetch_array($querytiem)){
            $mui1=$tiem['mui1'];
            $mui2=$tiem['mui2'];
        }
        $sqldktiem="SELECT * FROM `dktiem` WHERE `username`='{$_SESSION['username']}'";
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
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <div class="col-4 ">
            </div>
            <div class="col-4 ">
            <?php 
                if(isset($_SESSION['username'])) echo $name."|".$_SESSION['username']. " <a href='logout.php'>Đăng xuất </a> ";
                else {
                    echo "<a href='login.php'>
                    <button class='btn btn-primary'>Đăng nhập</button> </a>";
                }
            ?>
            </div>
        </header>
        <div class="container">
            <div class="menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link " href="./index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./thongtintiemchung.php">Thông tin tiêm chủng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./dangky.php">Đăng ký tiêm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Cá nhân</a>
                    </li>
                </ul>
            </div>
            <div class="row" style="height: 500px; border-radius: 10px; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; margin-bottom: 20px;">
                <div class="col-5" style=" padding:50px; ">
                    <div class="text-center" style="margin-bottom: 40px;">
                        <h2><?php echo $name; ?></h2>
                        <a href="doipass.php">Đổi mật khẩu</a>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <i class="bi bi-file-person-fill" style="font-size: 24px;"></i>
                            <b>Tài khoản</b>
                        </div>
                        <div class="col-8">
                            <p style="font-size: 18px; line-height: 200%;"><?php echo $_SESSION['username']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <i class="bi bi-briefcase-fill" style="font-size: 24px;"></i>
                            <b>Lớp</b>
                        </div>
                        <div class="col-8">
                            <p style="font-size: 18px; line-height: 200%;"><?php echo $idclass; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <i class="bi bi-credit-card-2-back-fill" style="font-size: 24px;"></i>
                            <b>Ngành</b>
                        </div>
                        <div class="col-8">
                            <p style="font-size: 18px; line-height: 200%;"><?php echo $nganh; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <i class="bi bi-telephone-fill" style="font-size: 24px;"></i>
                            <b>Sđt</b>
                        </div>
                        <div class="col-8">
                            <p style="font-size: 18px; line-height: 200%;"><?php echo $sdt; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <i class="bi bi-geo-alt-fill" style="font-size: 24px;"></i>
                            <b>Địa chỉ</b>
                        </div>
                        <div class="col-8">
                            <p style="font-size: 18px; line-height: 200%;"><?php echo $diachi; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-7" style="height: 500px;">
                    <div class="row" style="padding-top: 5%;">
                        <div class="col-6 text-center">
                            <h1>Mũi tiêm 1</h1>
                            <i class="<?php if($mui1==0) echo "bi bi-shield-fill-x"; else  echo "bi bi-shield-fill-check"; ?>" style="font-size: 100px; color: <?php if($mui1==0) echo "crimson"; else  echo "seagreen"; ?>;"></i>
                            <h4><?php if($mui1==0) echo "Chưa hoàn thành"; else  echo "Đã hoàn thành"; ?></h4>
                        </div>
                        <div class="col-6 text-center">
                            <h1>Mũi tiêm 2</h1>
                            <i class="<?php if($mui2==0) echo "bi bi-shield-fill-x"; else  echo "bi bi-shield-fill-check"; ?>" style="font-size: 100px; color:<?php if($mui2==0) echo "crimson"; else  echo "seagreen"; ?>;"></i>
                            <h4><?php if($mui2==0) echo "Chưa hoàn thành"; else  echo "Đã hoàn thành"; ?></h4>
                        </div>
                    </div>
                    <div style=" padding-top: 5%;">
                        <h4 class="text-center">lịch sử đăng ký tiêm</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Ngày tiêm</th>
                                    <th scope="col">Buổi</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Mũi số</th>
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
                                    $xntiem='';
                                    if($dktiem['checktiem']==0) $xntiem='Chưa tiêm';
                                    else $xntiem='Đã tiêm';
                                    echo "
                                    <tr>
                                    <th scope='row'>{$stt}</th>
                                    <td>{$dktiem['ngaytiem']}</td>
                                    <td>{$buoitiem}</td>
                                    <td>{$xntiem}</td>
                                    <td>{$dktiem['muitiem']}</td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php 
                        $none="";
                        if(!isset($_SESSION['admin'])){$none="none";}
                        else {
                            if($_SESSION['admin']==0){$none="none";}
                            else $none="";
                        }
                        echo "<a href='dstiem.php' style='width: 100%; display: {$none};'>Duyệt tiêm</a>"
                    ?>
                </div>
            </div>    
        </div>
        <?php
                if(isset($_SESSION['newpass'])&&$_SESSION['newpass']==true){
                    echo "<script>alert('Đăng mật khẩu thành công')</script>";
                    $_SESSION['newpass']=false;
                }
        ?>
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

</html>