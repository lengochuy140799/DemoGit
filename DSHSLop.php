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
                    <header class="text-center" style="font-size: 40px;"><b>Chi tiết lớp học</b></header>
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
                            <?php
                                if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
                                    $ss='';
                                }
                                else{
                                    $ss=$_SESSION['Username'];
                                }
                                $sql23 = "select * from quantri where MaQT='".$ss."'";
                                $kq23 = mysqli_query($kn,$sql23);
                                if(($row23 = mysqli_fetch_array($kq23))){
                                    echo '<div>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdthemhs">Thêm hoc sinh vào lớp học</button>
                                        </div>';
                                }
                            ?>
                        <div class="container">
                            <table id="tbhslophoc" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>STT</th>
                                        <th hidden></th>
                                        <th>Tên học sinh</th>
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
                                            $mahocsinh=$row['MaHS'];
                                            $stt=$stt+1;
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                        <td hidden><p style="margin: 7px auto;"><p><?php echo $row['MaHS'];?></p></td>
                                        <td><p style="margin: 7px auto;"><p><?php echo $row['HoTen'];?></p></td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mdthemhs" tabindex="-1" aria-labelledby="themlabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="themlabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>
                                Chọn học sinh: 
                                <br>
                                <select name="hocsinh" class="btn btn-outline-secondary btn-lg dropdown-toggle" style="width: 400px">
                                    <?php 
                                        $sql4="SELECT * FROM hocsinh ";
                                        $kq5=mysqli_query($kn,$sql4);
                                        while ($row=mysqli_fetch_array($kq5)){ ?>
                                            <option value="<?php echo $row['MaHS'] ?>"> <?php echo $row['HoTen']; ?> </option>
                                    <?php }?>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"name="btnThemhs">Thêm</button>
                    </div>
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
            $(document).ready(function() {
                $('#tbhslophoc').DataTable();
            } );
        </script>
        <?php
            $hocsinh= array_key_exists('hocsinh', $_POST) ? $_POST['hocsinh'] : null;
            function DANGKY($hocsinh){
                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                $sql8="INSERT INTO dangkylophoc(MaLop,MaHS)VALUES('".$_GET[ma]."','".$hocsinh."')";
                $kq8=mysqli_query($kn,$sql8);
                $sql9="INSERT INTO diemdanh(MaHS,MaLop,Buoi1,Buoi2,Buoi3,Buoi4,Buoi5,Buoi6,Buoi7,Buoi8,Buoi9,Buoi10,Buoi11,Buoi12)VALUES('".$hocsinh."','".$_GET[ma]."',null,null,null,null,null,null,null,null,null,null,null,null)";
                $kq9=mysqli_query($kn,$sql9);
            };
            if($_POST){
                if(isset($_POST['btnThemhs']) AND $_SERVER['REQUEST_METHOD']=="POST")
                {
                    DANGKY($hocsinh);
                    echo ("<meta http-equiv='refresh' content='0'>");
                    header("Location:ThoiKhoaBieu.php");
                    echo '<script>alert("Thêm thành công");</script>';
                }
            }
        ?>
    </form>
</body>
</html>