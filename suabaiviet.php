<?php
        session_start();
        require './connectdb.php';
        if(!isset($_SESSION['admin'])){
                header('Location:thongtintiemchung.php');
        }else{
                if($_SESSION['admin']==0){
                        header('Location:thongtintiemchung.php');
                }
        }
        $idbaiviet = $_GET['id'];
        $sqlbaiviet="SELECT * FROM `baiviet` WHERE `idbaiviet`='{$idbaiviet}'";
        $querybaiviet = mysqli_query($connectdb,$sqlbaiviet);
        $baiviet = mysqli_fetch_array($querybaiviet);
        $title = $baiviet['title'];
        $img = $baiviet['img'];
        $content = $baiviet['content'];
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
        </header>
        <div class="container" style="height:500px">
			<h1 style="margin-bottom: 50px">Sửa bài viết</h1>
			<form method="post" action="checksuabaiviet.php">
                                <div class="form-group row">
					<label for="inputUsername" class="col-2" col-form-label">Id bài viết</label>
					<div class="col-8">
						<input name="idbaiviet" type="text" class="form-control" id="inputUsername" value="<?php echo $idbaiviet; $_SESSION['idbaiviet']= $idbaiviet; ?>" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputUsername" class="col-2" col-form-label">Tiêu đề</label>
					<div class="col-8">
						<input name="title" type="text" class="form-control" id="inputUsername" value="<?php echo $title; ?>">
					</div>
				</div>
                                <div class="form-group row">
					<label for="inputUsername" class="col-2" col-form-label">Link hình ảnh</label>
					<div class="col-8">
						<input name="img" type="text" class="form-control" id="inputUsername" value="<?php echo $img; ?>">
					</div>
				</div>
                                <div class="form-group row">
                                        <label class="col-2" for="exampleFormControlTextarea1">Nội dung bài viết</label>
                                        <div class="col-8">
                                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 200px"><?php echo $content; ?></textarea>
                                        </div>        
                                </div>
				<button type="submit" class="btn btn-primary">Sửa bài viết</button>
			</form>   
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

