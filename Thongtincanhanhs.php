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
                    <header class="text-center" style="font-size: 40px;"><b>TH??NG TIN C?? NH??N</b></header>
                    <?php
                        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("ch??a k???t n???i");
                        $sql1="SELECT * FROM hocsinh where MaHS='".$_SESSION['Username']."'";
                        $kq1= mysqli_query($kn,$sql1);
                        $row = mysqli_fetch_array($kq1);
                    ?>
                    <div class="row" style="margin-top:30px;">
                        <div class="col-sm-6" style="justify-content: left; display: flex;">
                            <p>M?? h???c sinh:</p>
                            <input class="form-control" type="text" value="<?php echo $row['MaHS']?>" name="txtmaHS" id="maHS" style="width: 300px; margin-left:30px">
                        </div>
                        <div class="col-sm-6" style="justify-content: left; display: flex;">
                            <p>H??? v?? t??n:</p>
                            <input class="form-control" type="text" value="<?php echo $row['HoTen']?>" name="txttenHS" id="TenHS" style="width: 325px; margin-left:30px">
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-sm-6" style="justify-content: left; display: flex;">
                            Gi???i t??nh:
                            <input type="radio" name ="rdbgioitinh" value ="1" <?php echo ($row['GioiTinh']=='1') ?  "checked" : "" ;  ?>/> Nam
                            <input type="radio" name ="rdbgioitinh" value ="0" <?php echo ($row['GioiTinh']=='0') ?  "checked" : "" ;  ?>/> N???
                        </div>
                        <div class="col-sm-6" style="justify-content:left; display: flex;">
                            S??? ??i???n tho???i:
                            <input class="form-control" type="text" value="<?php echo $row['SDT']?>" name="sdt" id="sdt" style="width: 300px; margin-left:30px">
                        </div>
                    </div>
                    <div style="margin-top:20px; justify-content:left; display: flex;">
                        ?????a ch???:
                        <input class="form-control" type="text" value="<?php echo $row['DiaChi']?>" name="txtdiachiHS" id="diachiHS" style="width: 802px; margin-left:30px">
                    </div>
                    <div style="margin-top:20px; justify-content:left; display: flex;">
                        Ng??y v??o h???c:
                        <input id="datepicker" value="<?php echo $row['NgayVaoHoc']?>" style="margin-left:30px" width="780" name="ngayvaohoc" />
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-sm-6" style="justify-content: left; display: flex;">
                            T??n cha/ m???:
                            <input class="form-control" type="text" value="<?php echo $row['PhuHuynh']?>" name="tenchame" id="TenHS" style="width: 300px; margin-left:30px">                 </div>
                        <div class="col-sm-6" style="justify-content:left; display: flex;">
                            S??T cha/ m???:
                            <input class="form-control" type="text" value="<?php echo $row['SDTPH']?>" name="sdtchame" id="TenHS" style="width: 300px; margin-left:30px">
                        </div>
                    </div>
                    <div style="margin-top:20px; float: right;">
                          <button type="submit" class="btn btn-primary" style="height: 50px;width: 100px;  " name="btnchinhsua">ch???nh s???a</button>
                    </div>

                    <header class="text-center" style="font-size: 40px; margin-top:30px;"><b>CHUY??N C???N</b></header>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">T??n L???p</th>
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                                <th scope="col">5</th>
                                <th scope="col">6</th>
                                <th scope="col">7</th>
                                <th scope="col">8</th>
                                <th scope="col">9</th>
                                <th scope="col">10</th>
                                <th scope="col">11</th>
                                <th scope="col">12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql2="SELECT * FROM diemdanh 
                                    INNER JOIN lophoc ON diemdanh.MaLop= lophoc.MaLop
                                    where MaHS='".$_SESSION['Username']."'";
                                $kq2= mysqli_query($kn,$sql2);
                                while($row1= mysqli_fetch_array($kq2))
                                    {
                            ?>
                            <tr class="text-center">
                                <td>
                                    <?php echo $row1['TenLop'];?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi1']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi1']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>

                                <td>
                                    <?php 
                                        if ($row1['Buoi2']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi2']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>

                                <td>
                                    <?php 
                                        if ($row1['Buoi3']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi3']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi4']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi4']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi5']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi5']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi6']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi6']==null){echo "Ch??a ??i???m danh";}
                                          else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi7']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi7']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi8']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi8']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi9']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi9']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi10']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi10']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi11']=='0') {echo "x";} 
                                        else
                                        {
                                            if($row1['Buoi11']==null){echo "Ch??a ??i???m danh";}
                                            else{echo '';}
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row1['Buoi12']=='0') {echo "x";} 
                                        else
                                        {if($row1['Buoi12']==null){echo "Ch??a ??i???m danh";}
                                        else{echo '';}
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                        </table>
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
        $txthoten=array_key_exists('txttenHS', $_POST) ? $_POST['txttenHS'] : null;
        $gioitinh=array_key_exists('rdbgioitinh', $_POST) ? $_POST['rdbgioitinh'] : null;
        $sdt=array_key_exists('sdt', $_POST) ? $_POST['sdt'] : null;
        $diachi=array_key_exists('txtdiachiHS', $_POST) ? $_POST['txtdiachiHS'] : null;
        $ngayvaohoc=array_key_exists('ngayvaohoc', $_POST) ? $_POST['ngayvaohoc'] : null;
        $tenchame=array_key_exists('tenchame', $_POST) ? $_POST['tenchame'] : null;
        $sdtchame=array_key_exists('sdtchame', $_POST) ? $_POST['sdtchame'] : null; 

        function CHINHSUA($txthoten,$gioitinh,$sdt,$diachi,$ngayvaohoc,$tenchame,$sdtchame){
            $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("ch??a k???t n???i");
            $sql8="UPDATE hocsinh set DiaChi='$diachi',HoTen='$txthoten',GioiTinh='$gioitinh',SDT='$sdt',NgayVaoHoc='$ngayvaohoc',PhuHuynh='$tenchame',SDTPH='$sdtchame' WHERE MaHS='".$_SESSION['Username']."'";
            $kq9=mysqli_query($kn,$sql8);

        };  
        if($_POST){
            if(isset($_POST['btnchinhsua']) AND $_SERVER['REQUEST_METHOD']=="POST")
            {
                 CHINHSUA($txthoten,$gioitinh,$sdt,$diachi,$ngayvaohoc,$tenchame,$sdtchame);
                 echo ("<meta http-equiv='refresh' content='0'>");

            } 
        }



      ?>
</body>
</html>