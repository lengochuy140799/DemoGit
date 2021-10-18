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
                    <header class="text-center" style="font-size: 40px;"><b>THỜI KHÓA BIỂU</b></header>
                </div>
                <div style="margin-top:30px;">
                    <table class="table table-bordered table-hover" style="width:100%;">
                        <thead>
                            <tr style="text-align: center">
                                <th>Thời gian</th>
                                <th>Thứ 2</th>
                                <th>Thứ 3</th>
                                <th>Thứ 4</th>
                                <th>Thứ 5</th>
                                <th>Thứ 6</th>
                                <th>Thứ 7</th>
                                <th>Chủ nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                            ?>
                            <tr class="text-center">
                                <td style="text-align: center">
                                    <b>
                                        <p>
                                            <?php  
                                                $sql43="SELECT * FROM thoigian where MaTG='1'";
                                                $kq43= mysqli_query($kn,$sql43);
                                                $row43 = mysqli_fetch_array($kq43);
                                                echo $row43['Thoigian'];
                                            ?>
                                        </p>
                                    </b>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql1="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='1'
                                                and lophoc.MaTG='1'";
                                            $kq1= mysqli_query($kn,$sql1);
                                            $row1 = mysqli_fetch_array($kq1);
                                            echo $row1['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql2="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='2'
                                                and lophoc.MaTG='1'";
                                            $kq2= mysqli_query($kn,$sql2);
                                            $row2 = mysqli_fetch_array($kq2);
                                            echo $row2['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql3="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='3'
                                                and lophoc.MaTG='1'";
                                            $kq3= mysqli_query($kn,$sql3);
                                            $row3 = mysqli_fetch_array($kq3);
                                            echo $row3['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql4="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='4'
                                                and lophoc.MaTG='1'";
                                            $kq4= mysqli_query($kn,$sql4);
                                            $row4 = mysqli_fetch_array($kq4);
                                            echo $row4['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql5="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='5'
                                                and lophoc.MaTG='1'";
                                            $kq5= mysqli_query($kn,$sql5);
                                            $row5 = mysqli_fetch_array($kq5);
                                            echo $row5['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql6="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='6'
                                                and lophoc.MaTG='1'";
                                            $kq6= mysqli_query($kn,$sql6);
                                            $row6 = mysqli_fetch_array($kq6);
                                            echo $row6['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql7="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='7'
                                                and lophoc.MaTG='1'";
                                            $kq7= mysqli_query($kn,$sql7);
                                            $row7 = mysqli_fetch_array($kq7);
                                            echo $row7['TenLop'];
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align: center">
                                    <b>
                                        <p>
                                            <?php  
                                                $sql44="SELECT * FROM thoigian where MaTG='2'";
                                                $kq44= mysqli_query($kn,$sql44);
                                                $row44 = mysqli_fetch_array($kq44);
                                                echo $row44['Thoigian'];
                                            ?>
                                        </p>
                                    </b>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql8="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='1'
                                                and lophoc.MaTG='2'";
                                            $kq8= mysqli_query($kn,$sql8);
                                            $row8 = mysqli_fetch_array($kq8);
                                            echo $row8['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql9="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='2'
                                                and lophoc.MaTG='2'";
                                            $kq9= mysqli_query($kn,$sql9);
                                            $row9 = mysqli_fetch_array($kq9);
                                            echo $row9['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql10="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='3'
                                                and lophoc.MaTG='2'";
                                            $kq10= mysqli_query($kn,$sql10);
                                            $row10 = mysqli_fetch_array($kq10);
                                            echo $row10['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql11="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='4'
                                                and lophoc.MaTG='2'";
                                            $kq11= mysqli_query($kn,$sql11);
                                            $row11 = mysqli_fetch_array($kq11);
                                            echo $row11['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql12="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='5'
                                                and lophoc.MaTG='2'";
                                            $kq12= mysqli_query($kn,$sql12);
                                            $row12 = mysqli_fetch_array($kq12);
                                            echo $row12['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql13="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='6'
                                                and lophoc.MaTG='2'";
                                            $kq13= mysqli_query($kn,$sql13);
                                            $row13 = mysqli_fetch_array($kq13);
                                            echo $row13['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql14="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='7'
                                                and lophoc.MaTG='2'";
                                            $kq14= mysqli_query($kn,$sql14);
                                            $row14 = mysqli_fetch_array($kq14);
                                            echo $row14['TenLop'];
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align: center">
                                    <b>
                                        <p>
                                            <?php  
                                                $sql44="SELECT * FROM thoigian where MaTG='3'";
                                                $kq44= mysqli_query($kn,$sql44);
                                                $row44 = mysqli_fetch_array($kq44);
                                                echo $row44['Thoigian'];
                                            ?>
                                        </p>
                                    </b>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql15="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='1'
                                                and lophoc.MaTG='3'";
                                            $kq15= mysqli_query($kn,$sql15);
                                            $row15 = mysqli_fetch_array($kq15);
                                            echo $row15['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql16="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='2'
                                                and lophoc.MaTG='3'";
                                            $kq16= mysqli_query($kn,$sql16);
                                            $row16 = mysqli_fetch_array($kq16);
                                            echo $row16['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql17="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='3'
                                                and lophoc.MaTG='3'";
                                            $kq17= mysqli_query($kn,$sql17);
                                            $row17 = mysqli_fetch_array($kq17);
                                            echo $row17['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql18="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='4'
                                                and lophoc.MaTG='3'";
                                            $kq18= mysqli_query($kn,$sql18);
                                            $row18 = mysqli_fetch_array($kq18);
                                            echo $row18['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql19="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='5'
                                                and lophoc.MaTG='3'";
                                            $kq19= mysqli_query($kn,$sql19);
                                            $row19 = mysqli_fetch_array($kq19);
                                            echo $row19['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql20="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='6'
                                                and lophoc.MaTG='3'";
                                            $kq20= mysqli_query($kn,$sql20);
                                            $row20 = mysqli_fetch_array($kq20);
                                            echo $row20['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql21="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='7'
                                                and lophoc.MaTG='3'";
                                            $kq21= mysqli_query($kn,$sql21);
                                            $row21 = mysqli_fetch_array($kq21);
                                            echo $row21['TenLop'];
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align: center">
                                    <b>
                                        <p>
                                            <?php  
                                                $sql44="SELECT * FROM thoigian where MaTG='4'";
                                                $kq44= mysqli_query($kn,$sql44);
                                                $row44 = mysqli_fetch_array($kq44);
                                                echo $row44['Thoigian'];
                                            ?>
                                        </p>
                                    </b>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql22="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='1'
                                                and lophoc.MaTG='4'";
                                            $kq22= mysqli_query($kn,$sql22);
                                            $row22 = mysqli_fetch_array($kq22);
                                            echo $row22['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql23="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='2'
                                                and lophoc.MaTG='4'";
                                            $kq23= mysqli_query($kn,$sql23);
                                            $row23 = mysqli_fetch_array($kq23);
                                            echo $row23['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql24="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='3'
                                                and lophoc.MaTG='4'";
                                            $kq24= mysqli_query($kn,$sql24);
                                            $row24 = mysqli_fetch_array($kq24);
                                            echo $row24['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql25="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='4'
                                                and lophoc.MaTG='4'";
                                            $kq25= mysqli_query($kn,$sql25);
                                            $row25 = mysqli_fetch_array($kq25);
                                            echo $row25['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql26="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='5'
                                                and lophoc.MaTG='4'";
                                            $kq26= mysqli_query($kn,$sql26);
                                            $row26 = mysqli_fetch_array($kq26);
                                            echo $row26['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql27="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='6'
                                                and lophoc.MaTG='4'";
                                            $kq27= mysqli_query($kn,$sql27);
                                            $row27 = mysqli_fetch_array($kq27);
                                            echo $row27['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql28="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='7'
                                                and lophoc.MaTG='4'";
                                            $kq28= mysqli_query($kn,$sql28);
                                            $row28 = mysqli_fetch_array($kq28);
                                            echo $row28['TenLop'];
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align: center">
                                    <b>
                                        <p>
                                            <?php  
                                                $sql44="SELECT * FROM thoigian where MaTG='5'";
                                                $kq44= mysqli_query($kn,$sql44);
                                                $row44 = mysqli_fetch_array($kq44);
                                                echo $row44['Thoigian'];
                                            ?>
                                        </p>
                                    </b>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql29="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='1'
                                                and lophoc.MaTG='5'";
                                            $kq29= mysqli_query($kn,$sql29);
                                            $row29 = mysqli_fetch_array($kq29);
                                            echo $row29['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql30="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='2'
                                                and lophoc.MaTG='5'";
                                            $kq30= mysqli_query($kn,$sql30);
                                            $row30 = mysqli_fetch_array($kq30);
                                            echo $row30['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql31="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='3'
                                                and lophoc.MaTG='5'";
                                            $kq31= mysqli_query($kn,$sql31);
                                            $row31 = mysqli_fetch_array($kq31);
                                            echo $row31['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql32="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='4'
                                                and lophoc.MaTG='5'";
                                            $kq32= mysqli_query($kn,$sql32);
                                            $row32 = mysqli_fetch_array($kq32);
                                            echo $row32['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql33="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='5'
                                                and lophoc.MaTG='5'";
                                            $kq33= mysqli_query($kn,$sql33);
                                            $row33 = mysqli_fetch_array($kq33);
                                            echo $row33['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql34="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='6'
                                                and lophoc.MaTG='5'";
                                            $kq34= mysqli_query($kn,$sql34);
                                            $row34 = mysqli_fetch_array($kq34);
                                            echo $row34['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql35="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='7'
                                                and lophoc.MaTG='5'";
                                            $kq35= mysqli_query($kn,$sql35);
                                            $row35 = mysqli_fetch_array($kq35);
                                            echo $row35['TenLop'];
                                        ?>
                                    </p>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align: center">
                                    <b>
                                        <p>
                                            <?php  
                                                $sql44="SELECT * FROM thoigian where MaTG='6'";
                                                $kq44= mysqli_query($kn,$sql44);
                                                $row44 = mysqli_fetch_array($kq44);
                                                echo $row44['Thoigian'];
                                            ?>
                                        </p>
                                    </b>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql36="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='1'
                                                and lophoc.MaTG='6'";
                                            $kq36= mysqli_query($kn,$sql36);
                                            $row36 = mysqli_fetch_array($kq36);
                                            echo $row36['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql37="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='2'
                                                and lophoc.MaTG='6'";
                                            $kq37= mysqli_query($kn,$sql37);
                                            $row37 = mysqli_fetch_array($kq37);
                                            echo $row37['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql38="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='3'
                                                and lophoc.MaTG='6'";
                                            $kq38= mysqli_query($kn,$sql38);
                                            $row38 = mysqli_fetch_array($kq38);
                                            echo $row38['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql39="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='4'
                                                and lophoc.MaTG='6'";
                                            $kq39= mysqli_query($kn,$sql39);
                                            $row39 = mysqli_fetch_array($kq39);
                                            echo $row39['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql40="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='5'
                                                and lophoc.MaTG='6'";
                                            $kq40= mysqli_query($kn,$sql40);
                                            $row40 = mysqli_fetch_array($kq40);
                                            echo $row40['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql41="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='6'
                                                and lophoc.MaTG='6'";
                                            $kq41= mysqli_query($kn,$sql41);
                                            $row41 = mysqli_fetch_array($kq41);
                                            echo $row41['TenLop'];
                                        ?>
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    <p>
                                        <?php  
                                            $sql42="SELECT * FROM dangkylophoc 
                                            inner join lophoc on dangkylophoc.MaLop  = lophoc.MaLop 
                                            inner join thungay on lophoc.MaTN= thungay.MaTN
                                            inner join thoigian on lophoc.MaTG= thoigian.MaTG
                                            where MaHS='".$_SESSION['Username']."'
                                                and lophoc.MaTN='7'
                                                and lophoc.MaTG='6'";
                                            $kq42= mysqli_query($kn,$sql42);
                                            $row42 = mysqli_fetch_array($kq42);
                                            echo $row42['TenLop'];
                                        ?>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div >
                    <a style="float: left;" class="btn btn-primary" href="DangKyLopHoc.php" role="button">Đăng kí lớp học</a>
                    <a style="margin-left: 33.33%" class="btn btn-primary" href="CacMonDangHoc.php" role="button">Chỉnh sửa</a>
                    <a style="float: right;" class="btn btn-primary" href="Thongtincanhanhs.php" role="button">Chuyên cần</a>
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