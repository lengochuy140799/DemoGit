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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
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
                    <header class="text-center" style="font-size: 40px;"><b>DANH SÁCH</b></header>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#menu1">Danh sách giáo viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Danh sách học sinh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">Danh sách lớp học</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="menu1" class="container tab-pane active"><br>
                            <h4 class="text-center">Danh sách giáo viên</h4>
                            <hr>
                            <div class="container">
                                <table id="tbgiaovien" class="table table-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th hidden>CMND</th>
                                            <th>STT</th>
                                            <th>Họ Tên</th>
                                            <th hidden>Password</th>
                                            <th>Giới tính</th>
                                            <th hidden>Địa chỉ</th>
                                            <th hidden>SĐT</th>
                                            <th>Ngày vào</th>
                                            <th>Chi tiết</th>
                                            <?php
                                                if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                                    $ss='';
                                                }
                                                else{
                                                    $ss=$_SESSION['Username'];
                                                }
                                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                                $sql1 = "select * from quantri where MaQT='".$ss."'";
                                                $kq1 = mysqli_query($kn,$sql1);
                                                if(($row1 = mysqli_fetch_array($kq1))){
                                                  echo '<th>Xóa</th>';
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="SELECT * FROM giaovien";
                                            $kq= mysqli_query($kn,$sql);
                                            $stt=0;
                                            while($row = mysqli_fetch_array($kq))
                                            {
                                                $stt=$stt+1;
                                        ?>
                                        <tr>
                                            <td hidden style="text-align: center"><p><?php echo $row['CMND']; ?></p></td>
                                            <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                            <td><p style="margin: 7px auto;"><?php echo $row['HoTen'];?></p></td>
                                            <td hidden ><p style="margin: 7px auto; text-align: center;"><?php echo $row['Password'];?></p></td>
                                            <td>
                                                <p style="margin: 7px auto; text-align: center;">
                                                    <?php 
                                                        if($row['GioiTinh']=='1') {echo "Nam";}
                                                        else{ echo "Nữ";}
                                                    ?>
                                                </p>
                                            </td>
                                            <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['DiaChi'];?></p></td>
                                            <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['SDT'];?></p></td>
                                            <td><p style="margin: 7px auto; text-align: center;"><?php echo $row['NgayVaoTT'];?></p></td>
                                            <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['GioiTinh'];?></p></td>
                                            <!--  nút chi tiết -->
                                            <td style="text-align: center;">
                                                <button type="button" class="smallbtngv" data-bs-toggle="modal" data-bs-target="#mdchitietgv">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </td>
                                            <?php
                                                if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                                    $ss='';
                                                }
                                                else{
                                                    $ss=$_SESSION['Username'];
                                                }
                                                $sql1 = "select * from quantri where MaQT='".$ss."'";
                                                $kq1 = mysqli_query($kn,$sql1);
                                                if(($row1 = mysqli_fetch_array($kq1))){
                                                  echo '<td style="text-align: center;">
                                                            <button type="button" class="smallbtnxoagv" data-bs-toggle="modal" data-bs-target="#mdxoagv">
                                                            <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </td>';
                                                }
                                            ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                    if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                        $ss='';
                                    }
                                    else{
                                        $ss=$_SESSION['Username'];
                                    }
                                    $sql1 = "select * from quantri where MaQT='".$ss."'";
                                    $kq1 = mysqli_query($kn,$sql1);
                                    if(($row1 = mysqli_fetch_array($kq1))){
                                        echo '<div style="text-align: center;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdthemgv">Thêm giáo viên</button>
                                            </div>';
                                    }
                                ?>
                            </div>
                        </div>

                        <div id="menu2" class="container tab-pane fade"><br>
                            <h4 class="text-center">Danh sách học sinh</h4>
                            <hr>
                            <div class="container">
                                <table id="tbhocsinh" class="table table-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th hidden>Mã</th>
                                            <th>STT</th>
                                            <th>Tên học sinh</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ</th>
                                            <th>SĐT</th>
                                            <th hidden>Password</th>
                                            <th hidden >Ngày vào học</th>
                                            <th hidden>Phụ Huynh</th>
                                            <th hidden>SĐT phụ huynh</th>
                                            <th>Chi tiết</th>
                                            <?php
                                                if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                                    $ss='';
                                                }
                                                else{
                                                    $ss=$_SESSION['Username'];
                                                }
                                                $sql1 = "select * from quantri where MaQT='".$ss."'";
                                                $kq1 = mysqli_query($kn,$sql1);
                                                if(($row1 = mysqli_fetch_array($kq1))){
                                                    echo '<th>Xóa</th>';
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                            $sql="SELECT * FROM hocsinh ";
                                            $kq= mysqli_query($kn,$sql);
                                            $stt=0;
                                            while($row = mysqli_fetch_array($kq))
                                            {
                                                $stt=$stt+1;
                                        ?>
                                        <tr>
                                            <td hidden style="text-align: center"><p><?php echo $row['MaHS']; ?></p></td>
                                            <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                            <td><p style="margin: 7px auto;"><p><?php echo $row['HoTen'];?></p></td>
                                            <td><p style="margin: 7px auto; text-align: center;">
                                                    <?php 
                                                        if($row['GioiTinh']=='1') {echo "Nam";}
                                                        else{ echo "Nữ";}
                                                    ?>
                                                </p>
                                            </td>
                                            <td><p style="margin: 7px auto; text-align: center;"><?php echo $row['DiaChi'];?></p></td>
                                            <td ><p style="margin: 7px auto; text-align: center;"><?php echo $row['SDT'];?></p></td>
                                            <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['Password'];?></p></td>
                                            <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['NgayVaoHoc'];?></p></td>
                                            <td hidden ><p style="margin: 7px auto; text-align: center;"><?php echo $row['PhuHuynh'];?></p></td>
                                            <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['SDTPH'];?></p></td>
                                            <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['GioiTinh'];?></p></td>
                                            <!--  nút chi tiết -->
                                            <td style="text-align: center;">
                                                <button type="button" class="smallbtnhs" data-bs-toggle="modal" data-bs-target="#mdchitieths">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </td>
                                            <!--  nút xóa -->
                                            <?php
                                                if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                                    $ss='';
                                                }
                                                else{
                                                    $ss=$_SESSION['Username'];
                                                }
                                                $sql1 = "select * from quantri where MaQT='".$ss."'";
                                                $kq1 = mysqli_query($kn,$sql1);
                                                if(($row1 = mysqli_fetch_array($kq1))){
                                                    echo '<td style="text-align: center;">
                                                                <button type="button" class="smallbtn1" data-bs-toggle="modal" data-bs-target="#mdxoahs">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </td>';
                                                }
                                            ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                    if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                        $ss='';
                                    }
                                    else{
                                        $ss=$_SESSION['Username'];
                                    }
                                    $sql1 = "select * from quantri where MaQT='".$ss."'";
                                    $kq1 = mysqli_query($kn,$sql1);
                                    if(($row1 = mysqli_fetch_array($kq1))){
                                        echo '<div style="text-align: center;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdthemhs">Thêm học sinh</button>
                                            </div>';
                                    }
                                ?>
                            </div>
                        </div>
                        
                        <div id="menu3" class="container tab-pane fade"><br>
                            <h4 class="text-center">Danh sách lớp học</h4>
                            <hr>
                            <div class="container">
                                <table id="tblophoc" class="table table-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th hidden>Mã</th>
                                            <th>STT</th>
                                            <th>Tên lớp học</th>
                                            <th>Phòng học</th>
                                            <th>Giờ học</th>
                                            <th>Giáo viên</th>
                                            <th hidden> Môn học</th>
                                            <th hidden>Thứ Ngày</th>
                                            <th hidden>Trình độ</th>
                                            <th>Chi tiết</th>
                                            <?php
                                                if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                                    $ss='';
                                                }
                                                else{
                                                    $ss=$_SESSION['Username'];
                                                }
                                                $sql1 = "select * from quantri where MaQT='".$ss."'";
                                                $kq1 = mysqli_query($kn,$sql1);
                                                if(($row1 = mysqli_fetch_array($kq1))){
                                                    echo '<th>Xóa</th>';
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                                $ss='';
                                            }
                                            else{
                                                $ss=$_SESSION['Username'];
                                            }
                                            $sql1 = "select * from giaovien where CMND='".$ss."'";
                                            $kq1 = mysqli_query($kn,$sql1);
                                            if(($row1 = mysqli_fetch_array($kq1))){
                                                load_DSLGV();
                                            }
                                            else{
                                                load_DSL();
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                    if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                        $ss='';
                                    }
                                    else{
                                        $ss=$_SESSION['Username'];
                                    }
                                    $sql1 = "select * from quantri where MaQT='".$ss."'";
                                    $kq1 = mysqli_query($kn,$sql1);
                                    if(($row1 = mysqli_fetch_array($kq1))){
                                        echo '<div style="text-align: center;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdthemlh">
                                                    Thêm lớp học
                                                </button>
                                            </div>';
                                    }
                                ?>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->
        <!-- MODAL NÚT THÊM LH-->
        <div class="modal fade" id="mdthemlh" tabindex="-1" aria-labelledby="themLable" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="themLabel">Thêm lớp học</h5>
                        <button type="button" class="smallbtn2" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                Tên Lớp
                                <input  ria-label="Disabled input example" class="form-control" type="text" name="tenlop" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Giáo viên
                                <br>
                                <select name="giaovien" class="btn btn-outline-secondary btn-lg dropdown-toggle" style="width: 400px">
                                    <?php 
                                        $sql4="SELECT * FROM giaovien ";
                                        $kq5=mysqli_query($kn,$sql4);
                                        while ($row=mysqli_fetch_array($kq5)){ ?>
                                            <option value="<?php echo $row['CMND'] ?>"> <?php echo $row['HoTen']; ?> </option>
                                    <?php }?>
                                </select>
                            </p>
                        </div>
                        <div >
                            <p>
                                Phòng
                                <br>
                                <select name="phong"  class="btn btn-outline-secondary btn-lg dropdown-toggle" style="width: 400px" >
                                    <?php 
                                        $sql2="SELECT * FROM phong ";
                                        $kq3=mysqli_query($kn,$sql2);
                                        while ($row=mysqli_fetch_array($kq3)){ ?>
                                            <option value="<?php echo $row['MaPhong'] ?>"> <?php echo $row['TenPhong']; ?> </option>
                                    <?php }?>
                                    </select>
                            </p>
                        </div>
                        <div>
                            <p>
                                Môn học
                                <br>
                                <select name="monhoc" class="btn btn-outline-secondary btn-lg dropdown-toggle" style="width: 400px">
                                    <?php 
                                        $sql5="SELECT * FROM monhoc ";
                                        $kq6=mysqli_query($kn,$sql5);
                                        while ($row=mysqli_fetch_array($kq6)){ ?>
                                            <option value="<?php echo $row['MaMH'] ?>"> <?php echo $row['TenMH']; ?> </option>
                                    <?php }?>
                                </select>
                            </p>
                        </div>
                        <div>
                            <p>
                                Thứ ngày
                                <br>
                                <select name="thungay" class="btn btn-outline-secondary btn-lg dropdown-toggle" style="width: 400px">
                                    <?php 
                                        $sql3="SELECT * FROM thungay ";
                                        $kq4=mysqli_query($kn,$sql3);
                                        while ($row=mysqli_fetch_array($kq4)){ ?>
                                            <option value="<?php echo $row['MaTN'] ?>"> <?php echo $row['ThuNgay']; ?> </option>
                                    <?php }?>
                                </select>
                            </p>
                        </div>
                        <div>
                            <p>
                                Giờ
                                <br>
                                <select name="gio" class="btn btn-outline-secondary btn-lg dropdown-toggle" style="width: 400px">
                                    <?php 
                                        $sql3="SELECT * FROM thoigian ";
                                        $kq4=mysqli_query($kn,$sql3);
                                        while ($row=mysqli_fetch_array($kq4)){ ?>
                                            <option value="<?php echo $row['MaTG'] ?>"> <?php echo $row['Thoigian']; ?> </option>
                                    <?php }?>
                                </select>
                            </p>
                        </div>
                        <div>
                            <p>
                                Trình độ
                                <br>
                                <input ria-label="Disabled input example" class="form-control" type="text" name="trinhdo" style="width: 400px">
                            </p>
                        </div>  
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="btnthemlh">thêm</button>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <!-- MOADAL CHI TIẾT LH -->
        <div class="modal fade" id="mdchitietlh" tabindex="-1" aria-labelledby="chitietLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chitietLabel">Chi tiết lớp học</h5>
                        <button type="button" class="smallbtn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                Mã lớp
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtmalop" id="malop" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Tên Lớp
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txttenlop" id="tenlop" style="width: 400px">
                            </p>
                        </div>

                        <div>
                            <p>
                                Tên phòng
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txttenphong" id="phong" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Thời gian
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtthoigian" id="thoigian" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Giáo viên
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtgiaovien" id="giaovien" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Môn học
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtmonhoc" id="monhoc" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Thứ ngày
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtthungay" id="thungay" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Trình độ
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txttrinhdo" id="trinhdo" style="width: 400px">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL XÓA LH -->
        <div class="modal fade" id="mdxoalh" tabindex="-1" aria-labelledby="xoalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="xoalLabel">Bạn có chắc chắn muốn xóa lớp học này không?</h5>
                        <button type="button" class="smallbtn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                Mã lớp
                                <input class="form-control" type="text" name="xoamalop" id="xoamalop" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Tên Lớp
                                <input class="form-control" type="text" name="txtxoatenlop" id="xoatenlop" style="width: 400px">
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-primary"  name="btnxoalophoc">Xóa</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CHI TIẾT HS -->
        <div class="modal fade" id="mdchitieths" tabindex="-1" aria-labelledby="chitiethsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chitiethsLabel">Chi tiết học sinh</h5>
                        <button type="button" class="smallbtn2" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>
                        <p>
                            Mã học sinh
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtmahocsinh" id="mahs" style="width: 400px">
                        </p>
                        </div>
                        <div>
                        <p>
                            Họ tên 
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txthotenhs" id="hotenhs" style="width: 400px">
                        </p>
                        </div>
                        <div>
                        <p>
                            Password  
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtpass" id="pass" style="width: 400px">
                        </p>
                        </div>
                        <div>
                        <p>
                            Giới tính
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtgioitinh" id="gioitinh" style="width: 400px">
                        </p>
                        </div>
                        <div>
                        <p>
                            Địa chỉ  
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtdiachi" id="diachi" style="width: 400px">
                        </p>
                        </div>
                        <div>
                        <p>
                            SĐT 
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtsdt" id="sdt" style="width: 400px">
                        </p>
                        </div>
                        <div>
                            <p>
                            Ngày vào học  
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtngayvaohoc" id="ngayvaohochs" style="width: 400px">
                            </p>
                        </div>

                        <div>
                        <p>
                            Phụ Huynh 
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtph" id="ph" style="width: 400px">
                        </p>
                        </div>
                        <div>
                        <p>
                            SĐT Phụ huynh 
                            <input ria-label="Disabled input example" class="form-control" type="text" name="txtsdtph" id="sdtph" style="width: 400px">
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODOL NÚT THÊM HS-->
        <div class="modal fade" id="mdthemhs" tabindex="-1" aria-labelledby="themhslLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="themhslLabel">Thêm học sinh</h5>
                        <button type="button" class="smallbtn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                Họ và tên
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txthoten" id="hoten" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Passwword
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtpass" id="pass" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Giới tính 
                                <br>
                                <input type="radio" name="rdgioitinh" id="rdgioitinhnu" value="1"/> Nam
                                <input type="radio" name="rdgioitinh" id="rdgioitinhnam" value="0"> Nữ
                            </p>
                        </div>
                        <div>
                            <p>
                                Địa chỉ
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtdiachi" id="diachi" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                SĐT
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtsdt" id="sdt" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Ngày vào học
                                <input id="datepicker" width="270" name="ngayvaohoc"/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </p>
                        </div>
                        <div>
                            <p>
                                Phụ huynh
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtphuhuynh" id="phuhuynh" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                SĐT phụ huynh
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtsdtph" id="sdtph" style="width: 400px">
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnthemhs">Thêm</button>
                    </div>
                </div>
            </div>
        </div>

         <!--MODAL NÚT XÓA HS -->
        <div class="modal fade" id="mdxoahs" tabindex="-1" aria-labelledby="xoaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="xoaLabel">Bạn có chắc chắn muốn xóa học sinh này không?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                Mã học sinh
                                <input class="form-control" type="text" name="xoamahs" id="xoamahs" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Tên học sinh
                                <input class="form-control" type="text" name="txtxoa" id="xoahs" style="width: 400px">
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnxoahs">Xóa</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MOADOL CHI TIẾT GV-->
        <div class="modal fade" id="mdchitietgv" tabindex="-1" aria-labelledby="chitietLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="chitietLabel">Chi tiết giáo viên</h5>
                        <button type="button" class="smallbtn2" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                CMND
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtCMND" id="CMND" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Họ Tên
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtHoTen" id="HoTen" style="width: 400px">
                            </p>
                        </div>

                        <div>
                            <p>
                                Password 
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtPassword" id="Password" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Giới Tính
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtGioiTinh" id="GioiTinh" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Địa Chỉ
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtDiaChi" id="DiaChi" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                SDT
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtSDT" id="SDT" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Ngày vào
                                <input ria-label="Disabled input example" class="form-control" type="text" name="txtNgayVaoTT" id="NgayVaoTT" style="width: 400px">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL NÚT THÊM GV-->
        <div class="modal fade" id="mdthemgv" tabindex="-1" aria-labelledby="themlabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="themlabel">Thêm giáo viên</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>            
                            <p>
                                CMND
                                <input  ria-label="Disabled input example" class="form-control" type="text" name="txtCMND" style="width: 400px">
                            </p>
                        </div>  
                        <div>
                            <p>
                            Họ tên
                            <input  ria-label="Disabled input example" class="form-control" type="text" name="txtHoTen" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Password 
                                <input  ria-label="Disabled input example" class="form-control" type="text" name="txtPassword" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Giới Tính
                                <br>
                                    <input type="radio" name ="txtGioiTinh" value ="1"/> Nam
                                    <input type="radio" name ="txtGioiTinh" value ="0"/> Nữ
                                </br>
                            </p>
                        </div>
                        <div>
                            <p>
                                Địa Chỉ
                                <input  ria-label="Disabled input example" class="form-control" type="text" name="txtDiaChi" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                SDT
                                <input  ria-label="Disabled input example" class="form-control" type="text" name="txtSDT" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Ngày vào
                                <input id="txtNgayVaoTT" width="270" name="txtNgayVaoTT"/>
                                <script>
                                    $('#txtNgayVaoTT').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"name="btnThemGV">Thêm</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL NÚT XÓA -->
        <div class="modal fade" id="mdxoagv" tabindex="-1" aria-labelledby="xoaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="xoalLabel">Bạn có chắc chắn muốn xóa giáo viên này không?</h5>
                        <button type="button" class="smallbtn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                CMND
                                <input class="form-control" type="text" name="xoaCMND" id="xoaCMND" style="width: 400px">
                            </p>
                        </div>
                        <div>
                            <p>
                                Họ tên
                                <input class="form-control" type="text" name="txtxoahoten" id="xoahoten" style="width: 400px">
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-primary"  name="btnxoagiaovien">Xóa</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <!-- FOOTER -->
        <div style="margin-top:30px">
            <?php load_footer() ?>
        </div>
        <!-- END -->
    </form>

    <!-- load modal chi tiết LH -->
    <script>
        $(document).ready(function () {
            $('.smallbtn3').on('click', function () {
                $('#mdchitietlh').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#malop').val(data[0]);
                $('#tenlop').val(data[2]);
                $('#phong').val(data[3]);
                $('#thoigian').val(data[4]);
                $('#giaovien').val(data[5]);
                $('#monhoc').val(data[6]);
                $('#thungay').val(data[7]);
                $('#trinhdo').val(data[8]);
                
            });
        });
    </script>

    <!-- load modal xóa LH -->
    <script>
        $(document).ready(function () {
            $('.smallbtnxoalh').on('click', function () {
                $('#mdxoalh').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#xoamalop').val(data[0]);
                $('#xoatenlop').val(data[2]);
            });
        });
    </script>

    <!-- load modal chi tiết HS-->
    <script>
        $(document).ready(function () {
            $('.smallbtnhs').on('click', function () {
                $('#mdchitieths').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $gt='';
                if(data[10]=='1'){
                    $gt='Nam';
                }
                else{
                    $gt='Nữ';
                }
                $('#mahs').val(data[0]);
                $('#hotenhs').val(data[2]);
                $('#pass').val(data[6]);

                $('#gioitinh').val($gt);


                $('#diachi').val(data[4]);
                $('#sdt').val(data[5]);
                $('#ngayvaohochs').val(data[7]);
                $('#ph').val(data[8]);
                $('#sdtph').val(data[9]);
            
            });
        });
    </script>

    <!-- load modal xóa HS -->
    <script>
        $(document).ready(function () {
            $('.smallbtn1').on('click', function () {
                $('#mdxoahs').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#xoamahs').val(data[0]);
                $('#xoahs').val(data[2]);
            });
        });
    </script>  

    <!-- load modal chi tiết gv -->
    <script>
        $(document).ready(function () {
            $('.smallbtngv').on('click', function () {
                $('#mdchitietgv').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $gt='';
                if(data[8]=='1'){
                    $gt='Nam';
                }
                else{
                    $gt='Nữ';
                }
                $('#CMND').val(data[0]);
                $('#HoTen').val(data[2]);
                $('#Password').val(data[3]);
                $('#GioiTinh').val($gt);
                $('#DiaChi').val(data[5]);
                $('#SDT').val(data[6]);
                $('#NgayVaoTT').val(data[7]);
            });
        });
    </script>

    <!-- load modal xóa gv -->
    <script>
        $(document).ready(function () {
            $('.smallbtnxoagv').on('click', function () {
                $('#mdxoagv').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#xoaCMND').val(data[0]);
                $('#xoahoten').val(data[2]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tblophoc').DataTable();
        } );
        $(document).ready(function() {
            $('#tbhocsinh').DataTable();
        } );
        $(document).ready(function() {
            $('#tbgiaovien').DataTable();
        } );
    </script>

    <?php
    // HS
        $txthoten= array_key_exists('txthoten', $_POST) ? $_POST['txthoten'] : null;
        $txtpass= array_key_exists('txtpass', $_POST) ? $_POST['txtpass'] : null;
        $gioitinhhs=array_key_exists('txtpass', $_POST) ? $_POST['rdgioitinh']:null;
        $diachi= array_key_exists('txtdiachi', $_POST) ? $_POST['txtdiachi'] : null;
        $sdt= array_key_exists('txtsdt', $_POST) ? $_POST['txtsdt'] : null;
        $ngayvaohoc= array_key_exists('ngayvaohoc', $_POST) ? $_POST['ngayvaohoc'] : null;
        $phuhuynh= array_key_exists('txtphuhuynh', $_POST) ? $_POST['txtphuhuynh'] : null;
        $sdtph= array_key_exists('txtsdtph', $_POST) ? $_POST['txtsdtph'] : null;
    // Lớp
        $tenlop= array_key_exists('tenlop', $_POST) ? $_POST['tenlop'] : null;
        $giaovien= array_key_exists('giaovien', $_POST) ? $_POST['giaovien'] : null;
        $phong= array_key_exists('phong', $_POST) ? $_POST['phong'] : null;
        $monhoc= array_key_exists('monhoc', $_POST) ? $_POST['monhoc'] : null;
        $thungay=array_key_exists('thungay', $_POST) ? $_POST['thungay'] : null;
        $gio= array_key_exists('gio', $_POST) ? $_POST['gio'] : null;
        $trinhdo= array_key_exists('trinhdo', $_POST) ? $_POST['trinhdo'] : null;
    // GV
        $CMND= array_key_exists('txtCMND', $_POST) ? $_POST['txtCMND'] : null;
        $HoTen= array_key_exists('txtHoTen', $_POST) ? $_POST['txtHoTen'] : null;
        $Password= array_key_exists('txtPassword', $_POST) ? $_POST['txtPassword'] : null;
        $GioiTinh= array_key_exists('txtGioiTinh', $_POST) ? $_POST['txtGioiTinh'] : null;
        $Diachi=array_key_exists('txtDiaChi', $_POST) ? $_POST['txtDiaChi'] : null;
        $SDT= array_key_exists('txtSDT', $_POST) ? $_POST['txtSDT'] : null;
        $NgayVao= array_key_exists('txtNgayVaoTT', $_POST) ? $_POST['txtNgayVaoTT'] : null;

    $XCMND=array_key_exists('xoaCMND', $_POST) ? $_POST['xoaCMND'] : null;
    $XML=array_key_exists('xoamalop', $_POST) ? $_POST['xoamalop'] : null;
    $XHS=array_key_exists('xoamahs', $_POST) ? $_POST['xoamahs'] : null;

    function XOAHS($XHS){
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
        $sql111="DELETE FROM diemdanh where MaHS = '".$XHS."'";
        $kq111=mysqli_query($kn,$sql111);
        $sql112="DELETE FROM dangkylophoc where MaHS = '".$XHS."'";
        $kq112=mysqli_query($kn,$sql112);
        $sqlxoa="DELETE FROM hocsinh where MaHS = '".$XHS."'";
        $kq10=mysqli_query($kn,$sqlxoa);
        echo ("<meta http-equiv='refresh' content='0'>");
    };
    //Chưa lấy đc giới tính
    function THEMHS($txthoten,$txtpass,$gioitinhhs,$diachi,$sdt,$ngayvaohoc,$phuhuynh,$sdtph){
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
        $sql8="insert into hocsinh (MaHS,HoTen,Password,GioiTinh,DiaChi,SDT,NgayVaoHoc,PhuHuynh,SDTPH) value('','$txthoten','$txtpass','$gioitinhhs','$diachi','$sdt','$ngayvaohoc','$phuhuynh','$sdtph')";
        $kq9=mysqli_query($kn,$sql8);
        echo ("<meta http-equiv='refresh' content='0'>");
    };
    
    function XOALH($XML){
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
        $sqlxoa="DELETE FROM diemdanh where MaLop = '".$XML."'";
        $kq12=mysqli_query($kn,$sqlxoa);
        $sqlxoa="DELETE FROM dangkylophoc where MaLop = '".$XML."'";
        $kq11=mysqli_query($kn,$sqlxoa);
        $sqlxoa="DELETE FROM lophoc where MaLop = '".$XML."'";
        $kq10=mysqli_query($kn,$sqlxoa);
        echo ("<meta http-equiv='refresh' content='0'>");
    };
    function THEMLH($tenlop,$giaovien,$phong,$monhoc,$thungay,$gio,$trinhdo){
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
        $sql8="insert into lophoc (MaLop,TenLop,CMND,MaPhong,MaMH,MaTN,MaTG,Trinhdo) value('','$tenlop','$giaovien','$phong','$monhoc','$thungay','$gio','$trinhdo')";
        $kq9=mysqli_query($kn,$sql8);
    };
    function THEMGV($CMND,$HoTen,$Password,$GioiTinh,$Diachi,$SDT,$NgayVao){
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
       $sql40="INSERT into giaovien (CMND,HoTen,Password,GioiTinh,DiaChi,SDT,NgayVaoTT) value('$CMND','$HoTen','$Password','$GioiTinh','$Diachi','$SDT','$NgayVao')";
       $kq40=mysqli_query($kn,$sql40);
       echo ("<meta http-equiv='refresh' content='0'>");
    // echo '<script>alert("'.$gt.'");</script>';
    };
    function XOAGV($XCMND){
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
        $sql11="DELETE FROM lophoc where CMND = '".$XCMND."'";
        $kq11=mysqli_query($kn,$sql11);
        $sqlxoa="DELETE FROM giaovien where CMND = '".$XCMND."'";
        $kq10=mysqli_query($kn,$sqlxoa);
        echo ("<meta http-equiv='refresh' content='0'>");
    };
    if($_POST){
        if(isset($_POST['btnthemhs']) AND $_SERVER['REQUEST_METHOD']=="POST")
        {
            THEMHS($txthoten,$txtpass,$gioitinhhs,$diachi,$sdt,$ngayvaohoc,$phuhuynh,$sdtph);
            echo '<script>alert("Thêm thành công");</script>';
        }
        if(isset($_POST['btnxoahs']) AND $_SERVER['REQUEST_METHOD']=="POST")
        {
            XOAHS($XHS);
            echo '<script>alert("Xóa thành công");</script>';
        }
        if(isset($_POST['btnthemlh']) AND $_SERVER['REQUEST_METHOD']=="POST")
        {
            THEMLH($tenlop,$giaovien,$phong,$monhoc,$thungay,$gio,$trinhdo);
            echo ("<meta http-equiv='refresh' content='0'>");
            echo '<script>alert("Thêm thành công");</script>';
        }
        if(isset($_POST['btnxoalophoc']) AND $_SERVER['REQUEST_METHOD']=="POST")
        {
            XOALH($XML);
            echo '<script>alert("Xóa thành công");</script>';
        }
        if(isset($_POST['btnThemGV']) AND $_SERVER['REQUEST_METHOD']=="POST")
        {
            THEMGV($CMND,$HoTen,$Password,$GioiTinh,$Diachi,$SDT,$NgayVao);
            echo '<script>alert("Thêm thành công");</script>';
        }
        if(isset($_POST['btnxoagiaovien']) AND $_SERVER['REQUEST_METHOD']=="POST")
        {
            XOAGV($XCMND);
            echo '<script>alert("Xóa thành công");</script>';
        }
    }
    ?>
</body>
</html>