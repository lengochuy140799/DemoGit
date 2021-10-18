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
  <link rel="stylesheet" type="text/css" href="Style/CSSButton.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
            <div style="width: 70%;">
           
                    
                       <H1 style="text-align: center;" >ĐĂNG KÝ LỚP HỌC</H1>
                 
    <table id="tbmonhoc" class="table table-bordered table-hover" style="width:100%">

                        <thead>
                            <tr style="text-align: center">
                                <th hidden>Mã</th>
                                <th>STT</th>
                                <th>Tên môn học</th>
                                <th>Giáo viên</th>
                                <th>Đăng ký</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql1="SELECT * FROM lophoc inner join giaovien  on lophoc.CMND = giaovien.CMND";
                                $kq1= mysqli_query($kn,$sql1);
                                $stt=0;
                                while($row = mysqli_fetch_array($kq1))
                                {
                                    $stt=$stt+1;
                            ?>
                            <tr>
                                <td hidden style="text-align: center"><p><?php echo $row['MaLop']; ?></p></td>
                                <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                <td><p style="margin: 7px auto;"><?php echo $row['TenLop'];?></p></td>
                                <td><p style="margin: 7px auto;"><?php echo $row['HoTen'];?></p></td>

                                <td style="text-align: center;">
                                    <button type="button" class="smallbtndangky" data-bs-toggle="modal" data-bs-target="#mddangky">
                                       <i class="fas fa-user-plus"></i>
                                    </button>
                                </td>
                            <?php } ?>

                        </tbody>
                    </table>
                    <div style="float: left;">
                        <a class="btn btn-primary" href="ThoiKhoaBieu.php" role="button">Trở về</a>
                    </div>
            </div>
        </div>

<!-- modol đăng ký lớp học -->
        <div class="modal fade" id="mddangky" tabindex="-1" aria-labelledby="dangkyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dangkyLabel">Đăng ký lớp học</h5>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn đăng ký lớp học này ?
          <div>
                <p>
                  Mã lớp học
                  <input class="form-control" type="text" name="dklophoc" id="dklophoc" style="width: 400px">
                </p>
          </div>
                   <div>
                <p>
                   Tên môn học
                    <input class="form-control" type="text" name="mahs" id="mahs" style="width: 400px">
                 </p>
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
        <button type="submit" class="btn btn-primary" name="btndangky">Đăng ký</button>
      </div>
    </div>
  </div>
</div>

<script>
         $(document).ready(function () {
             $('.smallbtndangky').on('click', function () {
                $('#mddangky').modal('show');
                $tr = $(this).closest('tr');
                 var data = $tr.children("td").map(function () {
                  return $(this).text();
                 }).get();
                 console.log(data);
                  $('#dklophoc').val(data[0]);
                  $('#mahs').val(data[2]);
                        });
                });
</script>  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <div style="margin-top:30px">
            <?php load_footer() ?>
        </div>
        <!-- END -->

        <?php
        $malop= array_key_exists('dklophoc', $_POST) ? $_POST['dklophoc'] : null;
        function DANGKY($malop){
            $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
            $sql8="INSERT INTO dangkylophoc(MaLop,MaHS)VALUES('$malop','".$_SESSION['Username']."')";
            $kq8=mysqli_query($kn,$sql8);
            $sql9="INSERT INTO diemdanh(MaHS,MaLop,Buoi1,Buoi2,Buoi3,Buoi4,Buoi5,Buoi6,Buoi7,Buoi8,Buoi9,Buoi10,Buoi11,Buoi12)VALUES('".$_SESSION['Username']."','$malop',null,null,null,null,null,null,null,null,null,null,null,null)";
            $kq9=mysqli_query($kn,$sql9);
        };
      if($_POST){
            if(isset($_POST['btndangky']) AND $_SERVER['REQUEST_METHOD']=="POST")
            {
                 DANGKY($malop);
                 echo ("<meta http-equiv='refresh' content='0'>");
                header("Location:ThoiKhoaBieu.php");
                echo '<script>alert("Đăng kí thành công");</script>';
            }
        }
        ?>
    </form>
</body>
</html>