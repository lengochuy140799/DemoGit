<?php
    $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
    $sql="SELECT * FROM lophoc 
            inner join phong on lophoc.MaPhong = phong.MaPhong
            inner join thoigian on lophoc.MaTG = thoigian.MaTG
            inner join giaovien on lophoc.CMND = giaovien.CMND
            inner join monhoc on lophoc.MaMH = monhoc.MaMH
            inner join thungay on lophoc.MaTN = thungay.MaTN";
    $kq= mysqli_query($kn,$sql);
    $stt=0;
    while($row = mysqli_fetch_array($kq))
    {
        $malop=$row['MaLop'];
        $stt=$stt+1;
?>
<tr>
    <td hidden style="text-align: center"><p><?php echo $row['MaLop']; ?></p></td>
    <td style="text-align: center"><p><?php echo $stt; ?></p></td>
    <td><p style="margin: 7px auto;"><a href="DSHSLop.php?ma=<?php echo $malop ?>"><?php echo $row['TenLop'];?></a></p></td>
    <td><p style="margin: 7px auto; text-align: center;"><?php echo $row['TenPhong'];?></p></td>
    <td><p style="margin: 7px auto; text-align: center;"><?php echo $row['Thoigian'];?></p></td>
    <td ><p style="margin: 7px auto; text-align: center;"><?php echo $row['HoTen'];?></p></td>
    <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['TenMH'];?></p></td>
    <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['ThuNgay'];?></p></td>
    <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['Trinhdo'];?></p></td>
    <!--  nút chi tiết -->
    <td style="text-align: center;">
        <button type="button" class="smallbtn3" data-bs-toggle="modal" data-bs-target="#mdchitietlh">
            <i class="far fa-edit"></i>
        </button>
    </td>
    <?php
        if(!(isset($_SESSION['Username']) && $_SESSION['Username'] != '')){
            $ss='';
        }
        else{
            $ss=$_SESSION['Username'];
        }
        $sql1 = "select * from quantri where MaQT='".$ss."'";
        $kq1 = mysqli_query($kn,$sql1);
        if(($row1 = mysqli_fetch_array($kq1))){
            echo '<td style="text-align: center;">
                    <button type="button" class="smallbtnxoalh" data-bs-toggle="modal" data-bs-target="#mdxoalh">
                    <i class="fas fa-trash"></i>
                    </button>
                </td>';
        }
    ?>
</tr>
<?php } ?>