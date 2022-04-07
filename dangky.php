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
                        <a class="nav-link active" href="#">Đăng ký tiêm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./canhan.php">Cá nhân</a>
                    </li>
                </ul>
            </div>
            <div class="text-center" style="color: red; margin: 20px;">
                <i>Lưu ý !!!</i>
                <p style="margin: 0;">Việc đăng ký thông tin hoàn toàn bảo mật và phục vụ cho chiến dịch tiêm chủng Vắc xin COVID - 19</p>
                <p style="margin: 0;">Bằng việc nhấn nút " Xác nhận ", bạn hoàn toàn hiểu và đồng ý chịu trách nhiệm với các thông tin đã cung cấp.</p>
                <p style="margin: 0;">Xin vui lòng kiểm tra kỹ các thông tin bắt buộc(VD: Họ và tên, Ngày tháng năm sinh, Số điện thoại, CCCD/Mã định danh công dân/HC ...)</p>
            </div>
            <h2>Đăng ký tiêm</h2>
            <form action="checkdangkytiem.php" method="post" style="margin-top: 20px; margin-bottom: 20px;" class="form-tiem">
                <label>Đăng kí mũi tiêm thứ (*)</label>
                <div class="form-group row">
                    <select class="form-control col-4" disabled>
                      <option value="1" <?php if($mui1 == 0) echo"selected" ?>>Mũi tiêm thứ nhất</option>
                      <option value="2" <?php if($mui1 == 1 && $mui2 == 0) echo"selected" ?>>Mũi tiêm thứ hai</option>
                      <option value="3" <?php if($mui2 == 1 ) echo"selected" ?>>Đã tiêm đủ 2 mũi</option>
                    </select>
                </div>
                <label>1. Thông tin người đăng ký tiêm</label>
                <div class="form row">
                    <div class="form-group col">
                        <label for="inputName">Họ và tên</label>
                        <input type="text" class="form-control" id="inputName" disabled value="<?php echo $name ?>">
                    </div>
                    <div class="form-group col">
                        <label for="inputDate">Ngày sinh</label>
                        <input type="date" class="form-control" id="inputDate" disabled value="<?php echo $birthday ?>">
                    </div>
                    <div class="form-group col">
                        <label for="inputSex">Giới tính</label>
                        <select class="form-control" id="inputSex" disabled>
                            <option value="1" <?php if($sex==1) echo"selected" ?>>Nam</option>
                            <option value="2" <?php if($sex==0) echo"selected" ?>>Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-8">
                        <label for="inputAdd">Địa chỉ</label>
                        <input type="text" class="form-control" id="inputAdd" disabled value="<?php echo $diachi ?>">
                    </div>
                    <div class="form-group col">
                        <label for="inputDt">Dân tộc</label>
                        <input type="text" class="form-control" id="inputDt" disabled value="<?php echo $dantoc ?>">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col">
                        <label for="inputPhone">Số điện thoại</label>
                        <input type="text" class="form-control" id="inputPhone" disabled value="<?php echo $sdt ?>">
                    </div>
                    <div class="form-group col">
                        <label for="inputMsv">Mã sinh viên</label>
                        <input name="id" type="text" class="form-control" id="inputMsv" disabled value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="form-group col disabled ">
                        <label for="inputCc">CCCD/Chứng minh thư</label>
                        <input type="text" class="form-control" id="inputCc" disabled value="<?php echo $cccd ?>">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-8">
                        <label for="inputNganh">Ngành học</label>
                        <select class="form-control" id="inputNganh" disabled>
                            <option value="1"  <?php if($nganh=="Công nghệ đa phương tiện") echo"selected" ?>>Khoa đa phương tiện</option>
                            <option value="2" <?php if($nganh=="Khoa viễn thông") echo"selected" ?>>Khoa viễn thông</option>
                            <option value="3" <?php if($nganh=="Khoa quản trị kinh doanh") echo"selected" ?>>Khoa quản trị kinh doanh</option>
                            <option value="4" <?php if($nganh=="Khoa tài chính kế toán") echo"selected" ?>>Khoa tài chính kế toán</option>
                            <option value="5"<?php if($nganh=="Khoa công nghệ thông tin") echo"selected" ?> >Khoa công nghệ thông tin</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="inputClass">Mã lớp</label>
                        <input type="text" class="form-control" id="inputClass" disabled value="<?php echo $idclass ?>">
                    </div>
                </div>
                <label>2. Thông tin người giám hộ</label>
                <div class="form row">
                    <div class="form-group col">
                        <label for="inputNameGh">Họ và tên người giám hộ</label>
                        <input name="nguoidamho" name="namegiamho" type="text" class="form-control" id="inputNameGh">
                    </div>
                    <div class="form-group col">
                        <label for="inputPhoneGh">Số điện thoại</label>
                        <input name="sdt" type="text" class="form-control" id="inputPhoneGh">
                    </div>
                    <div class="form-group col">
                        <label for="inputRelative">Quan hệ</label>
                        <select class="form-control" id="inputRelative">
                            <option value="1" >Bố</option>
                            <option value="2" >Mẹ</option>
                            <option value="3" >Người giám hộ</option>
                        </select>
                    </div>
                </div>
                <label>3. Thông tin đăng ký tiêm chủng</label>
                <div class="form row">
                    <div class="form-group col-4">
                        <label for="inputDateTiem">Ngày mong muốn được tiêm</label>
                        <input name="ngaytiem" type="date" class="form-control" id="inputDateTiem">
                    </div>
                    <div class="form-group col-4">
                        <label for="inputSession">Buổi tiêm mong muốn</label>
                        <select name="buoitiem"class="form-control" id="inputSession">
                            <option value="1" >Buổi sáng</option>
                            <option value="2" >Buổi chiều</option>
                            <option value="3" >Cả ngày</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-primary  col-4 "  <?php if($mui2 == 1 ) echo"disabled"; ?>><?php if($mui2 == 1 ) echo"Bạn đã tiêm đủ 2 mũi"; else echo"Đăng ký tiêm" ?></button>
                </div>
            </form>
            <?php if(isset($_SESSION['dktiem']) && $_SESSION['dktiem']==true ) {echo "<script>alert('Đăng ký thành công')</script>"; $_SESSION['dktiem']=false; }?>
        </div>
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