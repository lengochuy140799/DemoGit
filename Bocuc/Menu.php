<?php
    session_start();
?>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
  <a class="navbar-brand" href="TrangChu.php"><img src="Image/Screenshot 2021-06-03 160758.png" style=" max-width: 30%;"></a>
  <ul class="navbar-nav" style="float: left;">
    <li class="nav-item active">
      <a class="nav-link" href="TrangChu.php">Trang chủ</a>
    </li>
    <li class="nav-item dropdown active">
      <a class="nav-link" href="Danhsach.php">Danh sách</a>
    </li>
    <?php
      if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
        echo'<li class="nav-item active">
              <a class="nav-link" href="DangNhap.php">Đăng nhập</a>
            </li>';
      }
      else
      {
        $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
        $sql1 = "select * from quantri where MaQT='".$_SESSION['Username']."'";
        $kq1 = mysqli_query($kn,$sql1);
        if(!($row1 = mysqli_fetch_array($kq1))){
          $sql2 = "select * from giaovien where CMND='".$_SESSION['Username']."'";
          $kq2 = mysqli_query($kn,$sql2);
          if(!($row2 = mysqli_fetch_array($kq2)))
          {
            $sql3 = "select * from hocsinh where MaHS='".$_SESSION['Username']."'";
            $kq3 = mysqli_query($kn,$sql3);
            $row3 = mysqli_fetch_array($kq3);
            echo '<li class="nav-item active">
                    <a class="nav-link" href="ThoiKhoaBieu.php">Thời khóa biểu</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      '.$row3['HoTen'] .'
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="Thongtincanhanhs.php">Thông tin cá nhân</a></li>
                      <li><a class="dropdown-item" href="DoiMK.php">Đổi mật khẩu</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="DangXuat.php">Đăng xuất</a></li>                    
                    </ul>
                  </li>';
          }
          else
          {
            echo '<li class="nav-item active">
                    <a class="nav-link" href="LichDay.php">Lịch dạy</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      '.$row2['HoTen'] .'
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="Thongtincanhangv.php">Thông tin cá nhân</a></li>
                      <li><a class="dropdown-item" href="DoiMK.php">Đổi mật khẩu</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="DangXuat.php">Đăng xuất</a></li>                    
                    </ul>
                  </li>';
          }
        }
        else
        {
          echo '<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    '.$row1['HoTen'] .'
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="DoiMK.php">Đổi mật khẩu</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="DangXuat.php">Đăng xuất</a></li>                    
                  </ul>
                </li>';
        }
      }
    ?>
  </ul>
</nav>