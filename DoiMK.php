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
             <h1 class="header">Change Password</h1>
             <h4 class="header">Enter your new password</h4>
             <input type="password" class="text" name="PassOld" id="PassOld" placeholder="Old Password" required=""/>
             <input type="password" class="text" placeholder="New Password" name="PassNew" required=""/>
             <input type="password" class="text" placeholder="Retype new Password" name="rePass" required=""/>
             <button type="submit" class="btn" name="btnDoiMK" ID="btnDoiMK"> Change</button>
         </div>
    </form>
</body>
<?php
    session_start();
    $PassOld= array_key_exists('PassOld', $_POST) ? $_POST['PassOld'] : null;
    $PassNew= array_key_exists('PassNew', $_POST) ? $_POST['PassNew'] : null;
    $rePass= array_key_exists('rePass', $_POST) ? $_POST['rePass'] : null;
    if (isset($_POST["btnDoiMK"])){
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
        $sql1 = "select * from quantri where MaQT='".$_SESSION['Username']."'";
        $kq1 = mysqli_query($kn,$sql1);
        if(!($row1 = mysqli_fetch_array($kq1))){
            $sql2 = "select * from giaovien where CMND='".$_SESSION['Username']."'";
            $kq2 = mysqli_query($kn,$sql2);
            if(!($row2 = mysqli_fetch_array($kq2))){
                $sql3 = "select * from hocsinh where MaHS='".$_SESSION['Username']."'";
                $kq3 = mysqli_query($kn,$sql3);
                $row3 = mysqli_fetch_array($kq3);
                if($PassOld!=$row3['Password']){
                    echo '<script>alert("Mật khẩu cũ không đúng");</script>';
                }
                else{
                    if($PassNew!=$rePass){
                        echo '<script>alert("Mật khẩu nhập lại không khớp");</script>';
                    }
                    else{
                        $sql4="UPDATE hocsinh SET Password='".$PassNew."' WHERE MaHS='".$_SESSION['Username']."'";
                        $kq4 = mysqli_query($kn,$sql4);
                        header("Location:DangNhap.php");
                        echo '<script>alert("Đã đổi mật khẩu");</script>';
                    }
                }
            }
            else
            {
                if($PassOld!=$row2['Password']){
                    echo '<script>alert("Mật khẩu cũ không đúng");</script>';
                }
                else{
                    if($PassNew!=$rePass){
                        echo '<script>alert("Mật khẩu nhập lại không khớp");</script>';
                    }
                    else{
                        $sql5="UPDATE giaovien SET Password='".$PassNew."' where CMND='".$_SESSION['Username']."'";
                        $kq5 = mysqli_query($kn,$sql5);
                        header("Location:DangNhap.php");
                        echo '<script>alert("Đã đổi mật khẩu");</script>';
                    }
                }
            }
        }
        else
        {
            if($PassOld!=$row2['Password']){
                echo '<script>alert("Mật khẩu cũ không đúng");</script>';
            }
            else{
                if($PassNew!=$rePass){
                    echo '<script>alert("Mật khẩu nhập lại không khớp");</script>';
                }
                else{
                    $sql5="UPDATE giaovien SET Password='".$PassNew."' where CMND='".$_SESSION['Username']."'";
                    $kq5 = mysqli_query($kn,$sql5);
                    header("Location:DangNhap.php");
                    echo '<script>alert("Đã đổi mật khẩu");</script>';
                }
            }
        }
    }
?>
</html>