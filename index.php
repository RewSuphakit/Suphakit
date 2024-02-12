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
        <title>ระบบงานห้องสมุด</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3><center>การจัดการข้อมูลการยืม-คืนหนังสือ</center></h3>
                    <br>
                    <center>
                    <form action="index.php" method="post">
                    <span>
                    <input type="text" name="search" class="form-control" minlength="3" style="width: 400px">&nbsp;&nbsp;
                    <button class="btn btn-primary" name="submit" type="submit">ค้นหา</button>
                    </span>
                    </center>
                    </form>
                    <br>
                    <span>
                    <a href="br.php" class="btn btn-info" style="margin-left: 1000px;">ยืม-คืนหนังสือ</a>
                    <a href="#" class="btn btn-secondary" style="margin-left: 20px;">ข้อมูลสถิติ</a>
                    </span>
                    <p>
                       <center>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="10%">รหัสหนังสือ</th>
                                <th width="15%">ชื่อหนังสือ</th>
                                <th width="15%">ผู้ยืม-ผู้คืน</th>
                                <th width="10%">วันที่ยืม</th>
                                <th width="10%">วันที่คืน</th>
                                <th width="5%">ค่าปรับ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once './connect/connect.php';

                        if (isset($_POST['search'])){
                            $search = $_POST['search'];
                            $query = "SELECT * FROM tb_borrow_book INNER JOIN tb_member ON tb_borrow_book.m_user=tb_member.m_user 
                            INNER JOIN tb_book ON tb_borrow_book.b_id=tb_book.b_id WHERE b_name='$search' or m_name='$search'";
                            $result = mysqli_query($condb, $query);
                        } else {
                        $query = "SELECT * FROM tb_borrow_book INNER JOIN tb_member ON tb_borrow_book.m_user=tb_member.m_user 
                        INNER JOIN tb_book ON tb_borrow_book.b_id=tb_book.b_id ORDER BY br_date_br DESC";
                        $result = mysqli_query($condb, $query);
                        }
                        foreach($result as $row) {
                        ?>
                            <tr>
                                <td><center><?= $row['b_id'];?></center></td>
                                <td><?= $row['b_name'];?></td>
                                <td><?= $row['m_name'];?></td>
                                <td><center><?= $row['br_date_br'];?></center></td>
                                <td><center><?= $row['br_date_rt'];?></center></td>
                                <td><center><?= $row['br_fine'];?></center></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </center>
                </div>
            </div>
        </div>
    </body>
</html>