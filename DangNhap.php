<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style/CSSDangnhap.css">
</head>
<body>
    <form action="" method="POST">
        <div class="box">
             <h1 class="header">Login</h1>
             <h4 class="header">Login here using your username and password</h4>
             <input type="text" class="text" name="Username" id="Username" placeholder="Username" required=""/>
             <input type="password" class="text" placeholder="Password" name="txtPassword" required=""/>
             <button type="submit" class="btn" name="btnDangNhap" ID="btnDangNhap"> Login</button>
         </div>
    </form>
</body>
<?php
    $txtTenDN= array_key_exists('Username', $_POST) ? $_POST['Username'] : null;
    $txtPassword= array_key_exists('txtPassword', $_POST) ? $_POST['txtPassword'] : null;
    if (isset($_POST["btnDangNhap"])){
        $_SESSION['Username'] = $_POST["Username"]; 
        $kn = mysqli_connect("localhost","root","","thlvn")or die("chưa kết nối");
        $sql1 = "select * from quantri where MaQT='".$txtTenDN."'";
        $kq1 = mysqli_query($kn,$sql1);
        if(!($row1 = mysqli_fetch_array($kq1))){
            $sql2 = "select * from giaovien where CMND='".$txtTenDN."'";
            $kq2 = mysqli_query($kn,$sql2);
            if(!($row2 = mysqli_fetch_array($kq2))){
                $sql3 = "select * from hocsinh where MaHS='".$txtTenDN."'";
                $kq3 = mysqli_query($kn,$sql3);
                if(!($row3 = mysqli_fetch_array($kq3))){
                    echo '<script>alert("Tên đăng nhập không tồn tại");</script>';
                }
                else
                {
                    if($txtPassword != $row3['Password']){
                        echo '<script>alert("Sai mật khẩu hs");</script>';
                    }
                    else
                    {
                        header("Location: TrangChu.php");
                    }
                }
            }
            else
            {
                if($txtPassword != $row2['Password']){
                    echo '<script>alert("Sai mật khẩu gv");</script>';
                }
                else
                {
                    header("Location: TrangChu.php");
                }
            }
        }
        else
        {
            if($txtPassword != $row1['Password']){
                echo '<script>alert("Sai mật khẩu qt");</script>';
            }
            else
            {
                header("Location: TrangChu.php");
            }
        }
    }
?>
</html>