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
                    <header class="text-center" style="font-size: 40px;"><b>THÔNG TIN chi tiết lớp học</b></header>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#menu1">Danh sách giáo viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#menu2">Danh sách học sinh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#menu3">Danh sách lớp học</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div id="menu3" class="container tab-pane active"><br>
                        <h4 class="text-center">Danh sách lớp học</h4>
                        <hr>
                        <p>
                            <b>Tên lớp: </b>
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql20="SELECT * FROM diemdanh
                                        inner join lophoc on diemdanh.MaLop= lophoc.MaLop
                                        where diemdanh.MaLop=$_GET[ma]";
                                $kq20= mysqli_query($kn,$sql20);
                                $row20 = mysqli_fetch_array($kq20);
                                echo ''.$row20['TenLop'].'';
                            ?>
                        </p>
                        <br>
                        <p>
                            <b>Giáo viên: </b> 
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql21="SELECT * FROM diemdanh
                                        inner join lophoc on diemdanh.MaLop= lophoc.MaLop
                                        INNER JOIN giaovien ON lophoc.CMND= giaovien.CMND
                                        where diemdanh.MaLop=$_GET[ma]";
                                $kq21= mysqli_query($kn,$sql21);
                                $row21 = mysqli_fetch_array($kq21);
                                echo ''.$row21['HoTen'].'';
                            ?>
                        </p>
                        <p>
                            <b>Lịch học: </b> 
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql22="SELECT * FROM diemdanh
                                        inner join lophoc on diemdanh.MaLop= lophoc.MaLop
                                        inner join thungay on lophoc.MaTN= thungay.MaTN
                                        inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                        where diemdanh.MaLop=$_GET[ma]";
                                $kq22= mysqli_query($kn,$sql22);
                                $row22 = mysqli_fetch_array($kq22);
                                echo ''.$row22['ThuNgay'].' - '.$row22['Thoigian'].'';
                            ?>
                        </p>
                        <div class="container">
                            <table id="tblophoc" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>STT</th>
                                        <th hidden></th>
                                        <th>Tên học sinh</th>
                                        <th>Buổi 1</th>
                                        <th>Buổi 2</th>
                                        <th>Buổi 3</th>
                                        <th>Buổi 4</th>
                                        <th>Buổi 5</th>
                                        <th>Buổi 6</th>
                                        <th>Buổi 7</th>
                                        <th>Buổi 8</th>
                                        <th>Buổi 9</th>
                                        <th>Buổi 10</th>
                                        <th>Buổi 11</th>
                                        <th>Buổi 12</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                        $sql="SELECT * FROM diemdanh
                                                inner join hocsinh on diemdanh.MaHS=hocsinh.MaHS
                                                inner join lophoc on diemdanh.MaLop= lophoc.MaLop
                                                where diemdanh.MaLop=$_GET[ma]";
                                        $kq= mysqli_query($kn,$sql);
                                        $stt=0;
                                        while($row = mysqli_fetch_array($kq))
                                        {
                                            $malop=$row['MaLop'];
                                            $stt=$stt+1;
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                        <td hidden><p style="margin: 7px auto;"><p><?php echo $row['MaHS'];?></p></td>
                                        <td><p style="margin: 7px auto;"><p><?php echo $row['HoTen'];?></p></td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi1']!=null){
                                                    if($row['Buoi1']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fas fa-signature"></i>
                                                </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                        <?php
                                                if($row['Buoi2']!=null){
                                                    if($row['Buoi2']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fas fa-signature"></i>
                                                </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi3']!=null){
                                                    if($row['Buoi3']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="3" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi4']!=null){
                                                    if($row['Buoi4']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="4" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi5']!=null){
                                                    if($row['Buoi5']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="5" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi6']!=null){
                                                    if($row['Buoi6']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="6" data-bs-toggle="modal" data-bs-target="#exampleModal6">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi7']!=null){
                                                    if($row['Buoi7']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="7" data-bs-toggle="modal" data-bs-target="#exampleModal7">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi8']!=null){
                                                    if($row['Buoi8']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="8" data-bs-toggle="modal" data-bs-target="#exampleModal8">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi9']!=null){
                                                    if($row['Buoi9']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="9" data-bs-toggle="modal" data-bs-target="#exampleModal9">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi10']!=null){
                                                    if($row['Buoi10']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="10" data-bs-toggle="modal" data-bs-target="#exampleModal10">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi11']!=null){
                                                    if($row['Buoi11']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="11" data-bs-toggle="modal" data-bs-target="#exampleModal11">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                if($row['Buoi12']!=null){
                                                    if($row['Buoi12']=='1'){
                                                        echo "";
                                                    }
                                                    else{
                                                        echo"x";
                                                    }
                                                }
                                                else{
                                                    echo '<button type="button" class="12" data-bs-toggle="modal" data-bs-target="#exampleModal12">
                                                    <i class="fas fa-signature"></i>
                                                    </button>';
                                                }
                                            ?>
                                        </td>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 1</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb1" id="tenhsb1" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd1" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd1" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd1" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 2</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb2" id="tenhsb2" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd2" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd2" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd2" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 3</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb3" id="tenhsb3" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd3" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd3" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd3" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 4</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb4" id="tenhsb4" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd4" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd4" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd4" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 5</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb5" id="tenhsb5" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd5" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd5" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd5" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 6</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb6" id="tenhsb6" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd6" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd6" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd6" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 7</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb7" id="tenhsb7" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd7" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd7" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd7" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 8</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb8" id="tenhsb8" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd8" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd8" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd8" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 9</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb9" id="tenhsb9" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd9" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd9" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd9" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 10</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb10" id="tenhsb10" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd10" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd10" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd10" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 11</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb11" id="tenhsb11" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd11" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd11" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd11" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Buổi 12</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mã học sinh:
                                            <input class="form-control" type="text" name="tenhsb12" id="tenhsb12" aria-label="default input example">
                                            Điểm danh: 
                                            <input type="radio" name ="dd12" value ="1"/> Có mặt
                                            <input style="margin-left:20px" type="radio" name ="dd12" value ="0"/> Vắng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                            <button type="submit" name="btndd12" class="btn btn-primary">Lưu </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <!-- END -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <!-- FOOTER -->
        <div style="margin-top:30px">
            <?php load_footer() ?>
        </div>
        <!-- END -->
        <script>
        $(document).ready(function () {
            $('.1').on('click', function () {
                $('#exampleModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb1').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.2').on('click', function () {
                $('#exampleModal2').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb2').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.3').on('click', function () {
                $('#exampleModal3').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb3').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.4').on('click', function () {
                $('#exampleModal4').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb4').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.5').on('click', function () {
                $('#exampleModal5').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb5').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.6').on('click', function () {
                $('#exampleModal6').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb6').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.7').on('click', function () {
                $('#exampleModal7').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb7').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.8').on('click', function () {
                $('#exampleModal8').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb8').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.9').on('click', function () {
                $('#exampleModal9').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb9').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.10').on('click', function () {
                $('#exampleModal10').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb10').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.11').on('click', function () {
                $('#exampleModal11').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb11').val(data[1]);
            });
        });
        </script>
        <script>
        $(document).ready(function () {
            $('.12').on('click', function () {
                $('#exampleModal12').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#tenhsb12').val(data[1]);
            });
        });
        </script>
        <script>
            $(document).ready(function() {
                $('#tblophoc').DataTable();
            } );
        </script>
        <?php
            $dd1=array_key_exists('dd1', $_POST) ? $_POST['dd1'] : null;
            $txtmahs1= array_key_exists('tenhsb1', $_POST) ? $_POST['tenhsb1'] : null;
            $dd2=array_key_exists('dd2', $_POST) ? $_POST['dd2'] : null;
            $txtmahs2= array_key_exists('tenhsb2', $_POST) ? $_POST['tenhsb2'] : null;
            $dd3=array_key_exists('dd3', $_POST) ? $_POST['dd3'] : null;
            $txtmahs3= array_key_exists('tenhsb3', $_POST) ? $_POST['tenhsb3'] : null;
            $dd4=array_key_exists('dd4', $_POST) ? $_POST['dd4'] : null;
            $txtmahs4= array_key_exists('tenhsb4', $_POST) ? $_POST['tenhsb4'] : null;
            $dd5=array_key_exists('dd5', $_POST) ? $_POST['dd5'] : null;
            $txtmahs5= array_key_exists('tenhsb5', $_POST) ? $_POST['tenhsb5'] : null;
            $dd6=array_key_exists('dd6', $_POST) ? $_POST['dd6'] : null;
            $txtmahs6= array_key_exists('tenhsb6', $_POST) ? $_POST['tenhsb6'] : null;
            $dd7=array_key_exists('dd7', $_POST) ? $_POST['dd7'] : null;
            $txtmahs7= array_key_exists('tenhsb7', $_POST) ? $_POST['tenhsb7'] : null;
            $dd8=array_key_exists('dd8', $_POST) ? $_POST['dd8'] : null;
            $txtmahs8= array_key_exists('tenhsb8', $_POST) ? $_POST['tenhsb8'] : null;
            $dd9=array_key_exists('dd9', $_POST) ? $_POST['dd9'] : null;
            $txtmahs9= array_key_exists('tenhsb9', $_POST) ? $_POST['tenhsb9'] : null;
            $dd10=array_key_exists('dd10', $_POST) ? $_POST['dd10'] : null;
            $txtmahs10= array_key_exists('tenhsb10', $_POST) ? $_POST['tenhsb10'] : null;
            $dd11=array_key_exists('dd11', $_POST) ? $_POST['dd11'] : null;
            $txtmahs11= array_key_exists('tenhsb11', $_POST) ? $_POST['tenhsb11'] : null;
            $dd12=array_key_exists('dd12', $_POST) ? $_POST['dd12'] : null;
            $txtmahs12= array_key_exists('tenhsb12', $_POST) ? $_POST['tenhsb12'] : null;

            function diemdanh1($dd1,$txtmahs1){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql1="UPDATE diemdanh set Buoi1='$dd1' where MaHS='".$txtmahs1."' and MaLop='".$_GET[ma]."'";
                $kq1=mysqli_query($kn,$sql1);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh2($dd2,$txtmahs2){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql2="UPDATE diemdanh set Buoi2='$dd2' where MaHS='".$txtmahs2."' and MaLop='".$_GET[ma]."'";
                $kq2=mysqli_query($kn,$sql2);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh3($dd3,$txtmahs3){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql3="UPDATE diemdanh set Buoi3='$dd3' where MaHS='".$txtmahs3."' and MaLop='".$_GET[ma]."'";
                $kq3=mysqli_query($kn,$sql3);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh4($dd4,$txtmahs4){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql4="UPDATE diemdanh set Buoi4='$dd4' where MaHS='".$txtmahs4."' and MaLop='".$_GET[ma]."'";
                $kq4=mysqli_query($kn,$sql4);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh5($dd5,$txtmahs5){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql5="UPDATE diemdanh set Buoi5='$dd5' where MaHS='".$txtmahs5."' and MaLop='".$_GET[ma]."'";
                $kq5=mysqli_query($kn,$sql5);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh6($dd6,$txtmahs6){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql6="UPDATE diemdanh set Buoi6='$dd6' where MaHS='".$txtmahs6."' and MaLop='".$_GET[ma]."'";
                $kq6=mysqli_query($kn,$sql6);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh7($dd7,$txtmahs7){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql7="UPDATE diemdanh set Buoi7='$dd7' where MaHS='".$txtmahs7."' and MaLop='".$_GET[ma]."'";
                $kq7=mysqli_query($kn,$sql7);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh8($dd8,$txtmahs8){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql8="UPDATE diemdanh set Buoi8='$dd8' where MaHS='".$txtmahs8."' and MaLop='".$_GET[ma]."'";
                $kq8=mysqli_query($kn,$sql8);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh9($dd1,$txtmahs1){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql9="UPDATE diemdanh set Buoi9='$dd9' where MaHS='".$txtmahs9."' and MaLop='".$_GET[ma]."'";
                $kq9=mysqli_query($kn,$sql9);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh10($dd10,$txtmahs10){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql10="UPDATE diemdanh set Buoi10='$dd10' where MaHS='".$txtmahs10."' and MaLop='".$_GET[ma]."'";
                $kq10=mysqli_query($kn,$sql10);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh11($dd11,$txtmahs11){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql11="UPDATE diemdanh set Buoi11='$dd11' where MaHS='".$txtmahs11."' and MaLop='".$_GET[ma]."'";
                $kq11=mysqli_query($kn,$sql11);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            function diemdanh12($dd12,$txtmahs12){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql12="UPDATE diemdanh set Buoi12='$dd12' where MaHS='".$txtmahs12."' and MaLop='".$_GET[ma]."'";
                $kq12=mysqli_query($kn,$sql12);
                echo ("<meta http-equiv='refresh' content='0'>");
                //echo '<script>alert("'.$dd1.'");</script>';
            }
            if($_POST){
                if(isset($_POST['btndd1']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh1($dd1,$txtmahs1);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd2']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh2($dd2,$txtmahs2);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd3']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh3($dd3,$txtmahs3);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd4']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh4($dd4,$txtmahs4);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd5']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh5($dd5,$txtmahs5);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd6']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh6($dd6,$txtmahs6);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd7']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh7($dd7,$txtmahs7);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd8']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh8($dd8,$txtmahs8);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd9']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh9($dd9,$txtmahs9);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd10']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh10($dd10,$txtmahs10);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd11']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh11($dd11,$txtmahs11);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
                if(isset($_POST['btndd12']) and $_SERVER['REQUEST_METHOD'] == "POST")
                { 
                    diemdanh12($dd12,$txtmahs12);
                    echo ("<meta http-equiv='refresh' content='0'>");
                } 
            }
        ?>
    </form>
</body>
</html>