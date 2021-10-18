<?php
    require 'site.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/22403d42e6.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="Style/CSSButton.css">
</head>
<body>
    <form action="" method="POST">
        <!-- menu and image -->
        <div class="jumbotron text-center" style="margin-bottom:0; padding: 20px">
            <?php load_menu() ?>
        </div>
        <div style="display: flex; justify-content: center;">
            <img src="Image/Trangchu.png" style="width: 100%;">
        </div>
        <!-- END -->

        <!-- BODY Content -->
        <div style="margin-top:30px; display: flex; justify-content: center;">
            <div style="width: 60%;">
                <div style="margin-top:30px;">
                    <header class="text-center" style="font-size: 40px;"><b>GIỚI THIỆU</b></header>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-sm-6" style="justify-content: center;display: block;">
                            <img src="Image/Trangchu_img1.png" style="width:90%;">
                        </div>
                        <div class="col-sm-6" style="justify-content: center;display: block;">
                            <p style="text-align: justify;">
                                Trung tâm dạy thêm số 10 Nguyễn Nhạc (thành lập từ năm 2003) – trực thuộc Trường THPT chuyên Lê Qúy Đôn. <br>
                                Được đánh giá là một trong những trung tâm dạy thêm uy tín tại Tp.Quy Nhơn, trung tâm dạy thêm hàng đầu tại Quy Nhơn. <br>
                                Trung tâm dạy thêm số 10 Nguyễn Nhạc sử dụng Cơ sở vật chất hiện đại của Trường THPT chuyên Lê Qúy Đôn, các lớp ban ngày có trang bị máy lạnh, nằm ở Số 10 Nguyễn Nhạc, Thành phố Qui Nhơn, tỉnh Bình Định thuận tiện cho việc đi lại của học sinh và phụ huynh (đường rộng rãi, thông thoáng, có nhiều tuyến xe buýt đi lại).
                            </p>
                        </div>
                    </div>
                </div>
                <div style="margin-top:30px;">
                    <header class="text-center" style="font-size: 40px;"><b>CÁC MÔN HỌC</b></header>
                    <table id="tbmonhoc" class="table table-striped table-bordered table-hover" style="width:100%; margin-top:30px;">
                        <thead>
                            <tr style="text-align: center">
                                <th hidden>Mã</th>
                                <th>STT</th>
                                <th>Tên môn học</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql1="SELECT * FROM monhoc";
                                $kq1= mysqli_query($kn,$sql1);
                                $stt=0;
                                while($row = mysqli_fetch_array($kq1))
                                {
                                    $stt=$stt+1;
                            ?>
                            <tr class="text-center">
                                <td hidden style="text-align: center"><p><?php echo $row['MaMH']; ?></p></td>
                                <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                <td><p style="margin: 7px auto;"><?php echo $row['TenMH'];?></p></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div style="margin-top:30px;">
                    <header class="text-center" style="font-size: 40px;"><b>HỌC PHÍ</b></header>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-sm-6" style="justify-content: center;display: block;">
                            <table id="tbmonhoc" class="table table-bordered table-hover" style="width:100%;">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>STT</th>
                                        <th>Môn</th>
                                        <th>Học phí</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center"><p>1</p></td>
                                        <td style="text-align: center"><p>Toán</p></td>
                                        <td><p style="margin: 7px auto;">600.000 đ/tháng</p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center"><p>2</p></td>
                                        <td style="text-align: center"><p>Văn</p></td>
                                        <td><p style="margin: 7px auto;">600.000 đ/tháng</p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center"><p>3</p></td>
                                        <td style="text-align: center"><p>Anh</p></td>
                                        <td><p style="margin: 7px auto;">400.000 đ/tháng</p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center"><p>4</p></td>
                                        <td style="text-align: center"><p>Lý</p></td>
                                        <td><p style="margin: 7px auto;">400.000 đ/tháng</p></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center"><p>5</p></td>
                                        <td style="text-align: center"><p>Hóa</p></td>
                                        <td><p style="margin: 7px auto;">400.000 đ/tháng</p></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style="text-align: justify;">
                                <b>Ghi chú:</b>
                                <p style="margin-left: 10%;"> 
                                    + 1 môn đóng 3 tháng : giảm 10% <br>
                                    + 2 môn đóng 3 tháng: giảm 15% <br>
                                    + 3 môn đóng 3 tháng: giảm 20%
                                </p>
                            </p>
                        </div>
                        <div class="col-sm-6" style="justify-content: center;display: block;">
                            <img src="Image/Trangchu_img2.png" style="width:99%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <!-- END -->
        
        <!-- FOOTER -->
        <div style="margin-top:30px">
            <?php load_footer() ?>
        </div>
        <!-- END -->
    </form>
</body>
</html>