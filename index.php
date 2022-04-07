<?php
        require 'connectdb.php';
        require 'islogin.php';
        $tongdangky=0;
        $tongmui1=0;
        $tongmui2=0;
        $sqlthongke="SELECT * FROM `thongke`";
        $querythongke = mysqli_query($connectdb,$sqlthongke);
        while($thongke = mysqli_fetch_array($querythongke)){
            $tongdangky+=$thongke['dangky'];
            $tongmui1+=$thongke['mui1'];
            $tongmui2+=$thongke['mui2'];
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
                <img class="img-rounded logo " src="https://lh3.googleusercontent.com/zihc3UZKqe_wJpAbIeAMYgiDBPPcGg-DvUxmFLc-O9I4DKhR-kt-sTLA2kmLoqpejIE" alt="Logo_PTIT">
                <h1>Quản lý tiêm chủng PTIT</h1>
            </a>
            <div class="col-4 ">
            </div>
            <div class="col-4 "> <?php 
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
                        <a class="nav-link active" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./thongtintiemchung.php">Thông tin tiêm chủng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(!isset($_SESSION['username'])) echo "disabled" ?>" href="./dangky.php">Đăng ký tiêm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if(!isset($_SESSION['username'])) echo "disabled" ?>" href="./canhan.php">Cá nhân</a>
                    </li>
                </ul>
            </div>
            <div class="slide-view">
                <div class="slider">
                    <div class="slide row s1">
                        <div class="col-8 title">
                            <h3>Những anh hùng áo trắng nơi tuyến đầu chống dịch</h3>
                            <p>Hy vọng cùng với hậu phương vững chắc từ gia đình và xã hội, với ý chí, nghị lực và y đức của mình, các y, bác sĩ sẽ góp phần cùng thành phố đẩy lùi dịch bệnh để cuộc sống của người dân trở lại trạng thái bình thường mới.</p>
                        </div>
                        <div class="col-4">
                            <img src="./img/3.png" alt="">
                        </div>
                    </div>
                    <div class="slide row s2">
                        <div class="col-8 title">
                            <h3>Vắc-xin COVID-19 cần tiêm 2 mũi</h3>
                            <p>Nếu không được tiêm vaccine COVID-19 mũi hai, cơ thể sẽ không được kích hoạt đủ chức năng miễn dịch để bảo vệ khỏi tình trạng nhiễm trùng.</p>
                        </div>
                        <div class="col-4">
                            <img src="./img/1.png" alt="">
                        </div>
                    </div>
                    <div class="slide row s3">
                        <div class="col-8 title">
                            <h3>Tuân thủ "5K" – giải pháp hữu hiệu</h3>
                            <p>Trong bất kỳ tình huống nào cũng phải tuân thủ "5K" Bộ Y tế đã khuyến cáo, là giải pháp hữu hiệu để kết hợp cùng với vắc xin ngừa Covid-19 giúp chúng ta đi tới thắng lợi cuối cùng trong cuộc chiến chống đại dịch.</p>
                        </div>
                        <div class="col-4">
                            <img src="./img/2.png" alt="">
                        </div>
                    </div>
                </div>
                <i onclick="previousFunction()" class="bi bi-arrow-left-circle previous round"></i>
                <i onclick="nextFunction()" class="bi bi-arrow-right-circle next round"></i>
            </div>
            <div class="row justify-content-center statistical">
                <div class="col-4 row">
                    <i class="col-2 bi bi-person-plus-fill"></i>
                    <div class="col-10">
                        <h5>Đối tượng đăng ký tiêm</h5>
                        <div>
                            <h3><?php echo $tongdangky; ?></h3>
                            <span>(lượt)</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 row">
                    <i class="col-2 bi bi-check-circle-fill"></i>
                    <div class="col-10">
                        <h5>Số lượng hoàn thành mũi 1</h5>
                        <div>
                            <h3><?php echo $tongmui1; ?></h3>
                            <span>(lượt)</span>
                        </div>
                    </div>
                </div>
                <div class="col-4 row">
                    <i class="col-2 bi bi-shield-fill-check"></i>
                    <div class="col-10">
                        <h5>Số lượng mũi 2 đã tiêm</h5>
                        <div>
                            <h3><?php echo $tongmui2; ?></h3>
                            <span>(lượt)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="color:red; margin-bottom: 15px;">
                <i><b>Thông báo:</b> Nếu bạn chưa được tiêm chủng hãy đăng ký tiêm chủng ở mục "Đăng ký tiêm"</i>
            </div>
            <div class="chart">
                <h5 style="font-weight: bold;">Dữ liệu tiêm theo ngày</h5>
                <canvas id="myChart" "></canvas>
            </div>
            <div class="statistical statistical-table ">
                <h5 style="font-weight: bold; ">Dữ liệu tiêm theo ngày</h5>
                <table class="table table-striped ">
                    <thead>
                      <tr>
                        <th scope="col ">Số thứ tự</th>
                        <th scope="col ">Tên khoa</th>
                        <th scope="col ">Tỷ lệ tiêm mũi 1</th>
                        <th scope="col ">Tỷ lệ tiêm mũi 2</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sqlthongke="SELECT * FROM `thongke`";
                    $querythongke = mysqli_query($connectdb,$sqlthongke);
                    $stt=0; 
                    while($thongke = mysqli_fetch_array($querythongke)){
                        $stt ++;
                        $mui1=round($thongke['mui1']/$thongke['dangky']*100,2);
                        $mui2=round($thongke['mui2']/$thongke['dangky']*100,2);
                        echo "
                        <tr>
                            <th scope='row'>{$stt}</th>
                            <td>{$thongke['tenkhoa']}</td>
                            <td>{$mui1}%</td>
                            <td>{$mui2}%</td>
                         </tr>
                        " ;       
                    }
                    ?>
                    </tbody>
                </table>  
            </div>  
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
<script src="js.js "></script>
</html>