<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
    table, th, td, tr {
    border: 1px solid;
    }
     body {
  background-image: url('https://img.freepik.com/premium-vector/modern-luxury-stripe-texture-white-background_105940-612.jpg?w=2000');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
    </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>คืนหนังสือ</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                <span><center>
                    <a href="index.php" style="margin-right: 40px;">หน้าหลัก</a>
                    <a href="br.php" style="margin-right: 40px;">ยืมหนังสือ</a>
                    <a href="rt.php">คืนหนังสือ</a>
                    </center>
                    </span>
                    <br>
                    <h3><center>คืนหนังสือ</center></h3>
                    </span>
                    <br>
                    <p>
                        <span> <center>
                        <form action="rt.php" method="post">
                        <table class="hiden">
                            <tbody>
                                <tr>
                                    <td>รหัสหนังสือที่ต้องการคืน : </td>
                                    <td><input type="text" name="search" class="form-control" style="width: 300px; margin-left: 10px;"></td>
                                    <td><button type="submit" class="btn btn-primary" style="margin-left: 10px;">ค้นหา</button></td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        </span>
                        <br>
                        <table class="table table-striped  table-hover table-responsive table-bordered" style="width: 700px;">
                        <tbody>
                        <?php
                        require_once './connect/connect.php';
                        if (isset($_POST['search'])) {
                            $search = $_POST['search'];
                            $query = "SELECT * FROM tb_borrow_book 
                            INNER JOIN tb_book ON tb_borrow_book.b_id=tb_book.b_id 
                            INNER JOIN tb_member ON tb_borrow_book.m_user=tb_member.m_user 
                            WHERE tb_book.b_id = '$search'";
                            $result = mysqli_query($condb, $query);
                        }
                        foreach($result as $row) {
                        ?>
                            <tr>
                                <td width="3%">รหัสหนังสือ : </td> 
                                <td width="10%"><?= $row['b_id'];?></td>
                            </tr>
                            <tr>
                                <td width="3%">ชื่อหนังสือ : </td>
                                <td width="10%"><?= $row['b_name'];?></td>
                            </tr>
                            <tr>
                                <td width="3%">ผู้ยืม-คืนหนังสือ : </td>
                                <td width="10%"><?= $row['m_user'];?></td>
                            </tr>
                            <tr>
                                <td width="3%">วันที่ยืมหนังสือ : </td>
                                <td width="10%"><?= $row['br_date_br'];?></td>
                            </tr>
                            <tr>
                                <td width="3%">ค่าปรับ : </td>
                                <td width="10%">
                                    <div class="col-sm-6">
                                    <center><input type="text" name="search" class="form-control" placeholder="กรอกค่าปรับหนังสือ"></center></td>
                                    </div> 
                            </tr>
                            <tr>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>