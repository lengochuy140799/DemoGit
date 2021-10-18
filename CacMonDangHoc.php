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
                    <header class="text-center" style="font-size: 40px;"><b>CÁC MÔN ĐANG HỌC</b></header>
                    <table id="tbhoatdong" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr style="text-align: center">
                                <th>STT</th>
                                <th hidden></th>
                                <th>Tên môn học</th>
                                <th>Giáo viên</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql1 = "SELECT * FROM dangkylophoc
                                        INNER JOIN lophoc ON dangkylophoc.MaLop= lophoc.MaLop
                                        INNER JOIN hocsinh ON dangkylophoc.MaHS= hocsinh.MaHS
                                        INNER JOIN giaovien ON lophoc.CMND= giaovien.CMND
                                        where dangkylophoc.MaHS= '".$_SESSION['Username']."'";
                                $kq1= mysqli_query($kn,$sql1);
                                $stt=0;
                                while($row = mysqli_fetch_array($kq1))
                                {
                                    $stt=$stt+1;
                                    $MaSV = $_SESSION['Username'];
                            ?>
                            <tr>
                                <td style="text-align: center"><p style="margin: 7px auto;"><?php echo $stt; ?></p</td>
                                <td hidden><?php echo $row['MaLop']; ?></td>
                                <td style="text-align: center"><p style="margin: 7px auto;"><?php echo $row['TenLop'];?></p</td>
                                <td><p style="margin: 7px auto;"><?php echo $row['HoTen'];?></p></td>
                                <td style="text-align: center">
                                    <button type="button" class="smallbtn" data-bs-toggle="modal" data-bs-target="#mdxoa">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div style="float: left;">
                        <a class="btn btn-primary" href="ThoiKhoaBieu.php" role="button">Trở về</a>
                    </div>
                    <div style="float: right;">
                        <a class="btn btn-primary" href="DangKyLopHoc.php" role="button">Đăng kí lớp học</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->
        <!-- MODAL CHI TIẾT, CHỈNH SỬA -->
        <div class="modal fade" id="mdxoa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdxoaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mdxoaLabel">Bạn có chắc chắn muôn xóa học phần này không?</h5>
                        <button type="button" style="border:none; outline:none; border-radius:5px; background:transparent;" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <p style=" font-size: 18px;">
                            Mã môn học: 
                            <input type="text" class="form-control" id="mamon" name="txtMaMH" style="font-size: 18px; pointer-events: none;" >
                        </p>
                        <p style=" font-size: 18px;">
                            Tên môn học: 
                            <input type="text" class="form-control" id="tenmon" name="txtTenMH" style="font-size: 18px; pointer-events: none;" >
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnxoa">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <!-- FOOTER -->
        <div style="margin-top:30px">
            <?php load_footer() ?>
        </div>
        <!-- END -->
    </form>

    <!-- load modal chi tiết -->
    <script>
    $(document).ready(function () {
        $('.smallbtn').on('click', function () {
            $('#mdChitiet').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#mamon').val(data[1]);
            $('#tenmon').val(data[2]);
        });
    });
    </script>
    <?php
        $txtMaMH=array_key_exists('txtMaMH', $_POST) ? $_POST['txtMaMH'] : null;
        function XoaMH($txtMaMH){
            $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
            $sql2="DELETE from dangkylophoc where MaLop='".$txtMaMH."'";
            $kq2= mysqli_query($kn,$sql2);
            echo ("<meta http-equiv='refresh' content='0'>");
            echo "<script>alert('Xóa thành công');</script>";
        }
        if($_POST){
            if(isset($_POST['btnxoa']) and $_SERVER['REQUEST_METHOD'] == "POST")
            { 
                XoaMH($txtMaMH);
                echo '<script>alert("Xóa thành công");</script>';
            } 
        }
    ?>
</body>
</html>