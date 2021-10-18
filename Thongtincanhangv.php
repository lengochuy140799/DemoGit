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
  <script src="https://kit.fontawesome.com/22403d42e6.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/22403d42e6.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
                    <header class="text-center" style="font-size: 40px;"><b>THÔNG TIN CÁ NHÂN</b></header>
                    <?php
                        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                        $sql1="SELECT * FROM giaovien where CMND='".$_SESSION['Username']."'";
                        $kq1= mysqli_query($kn,$sql1);
                        $row = mysqli_fetch_array($kq1);
                    ?>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-sm-6" style="justify-content: left; display: flex;">
                            <p>CMND:</p>
                            <input class="form-control" type="text" value="<?php echo $row['CMND']?>" name="txtCMND" id="maHS" style="width: 300px; margin-left:30px">
                        </div>
                        <div class="col-sm-6" style="justify-content: left; display: flex;">
                            <p>Họ và tên:</p>
                            <input class="form-control" type="text" value="<?php echo $row['HoTen']?>" name="txttenGV" id="TenHS" style="width: 325px; margin-left:30px">
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-sm-6" style="justify-content: left; display: flex;">
                            Giới tính:
                            <input type="radio" name ="rdbgioitinh" value ="1" <?php echo ($row['GioiTinh']=='1') ?  "checked" : "" ;  ?>/> Nam
                            <input type="radio" name ="rdbgioitinh" value ="0" <?php echo ($row['GioiTinh']=='0') ?  "checked" : "" ;  ?>/> Nữ
                       </div>
                        <div class="col-sm-6" style="justify-content:left; display: flex;">
                            Số điện thoại:
                            <input class="form-control" type="text" value="<?php echo $row['SDT']?>" name="sdt" id="TenHS" style="width: 300px; margin-left:30px">
                        </div>
                    </div>
                    <div style="margin-top:20px; justify-content:left; display: flex;">
                        Địa chỉ:
                        <input class="form-control" type="text" value="<?php echo $row['DiaChi']?>" name="txtdiachigv" id="diachiHS" style="width: 802px; margin-left:30px">
                    </div>
                    <div style="margin-top:20px; justify-content:left; display: flex;">
                        Ngày vào trung tâm:
                        <input id="datepicker" value="<?php echo $row['NgayVaoTT']?>" style="margin-left:30px" width="735" name="ngayvao" />
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                     <div style="margin-top:20px; float: right;">
                          <button type="submit" class="btn btn-primary" style="height: 50px;width: 100px;  " name="btnchinhsua">chỉnh sửa</button>
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
     <?php
        /*$maHS=array_key_exists('txtmaHS', $_POST) ? $_POST['txtmaHS'] : null;*/
        $txthoten=array_key_exists('txttenGV', $_POST) ? $_POST['txttenGV'] : null;
        $gioitinh=array_key_exists('rdbgioitinh', $_POST) ? $_POST['rdbgioitinh'] : null;
        $sdt=array_key_exists('sdt', $_POST) ? $_POST['sdt'] : null;
        $diachi=array_key_exists('txtdiachigv', $_POST) ? $_POST['txtdiachigv'] : null;
        $ngayvao=array_key_exists('ngayvao', $_POST) ? $_POST['ngayvao'] : null;
        

        function CHINHSUA($txthoten,$gioitinh,$sdt,$diachi,$ngayvao){
            $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
            $sql8="UPDATE giaovien set DiaChi='$diachi',HoTen='$txthoten',SDT='$sdt',NgayVaoTT='$ngayvao',GioiTinh='$gioitinh' WHERE CMND='".$_SESSION['Username']."'";
            $kq9=mysqli_query($kn,$sql8);
           /* ,GioiTinh='$gioitinh',PhuHuynh='$tenchame',SDTPH='$sdtchame' */

        };  
        if($_POST){
            if(isset($_POST['btnchinhsua']) AND $_SERVER['REQUEST_METHOD']=="POST")
            {
                 CHINHSUA($txthoten,$gioitinh,$sdt,$diachi,$ngayvao);
                 echo ("<meta http-equiv='refresh' content='0'>");

            } 
        }
        ?>
</body>
</html>