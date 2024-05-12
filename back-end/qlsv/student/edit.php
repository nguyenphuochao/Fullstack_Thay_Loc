<?php require "../layout/header.php" ?>
<h1>Chỉnh sửa sinh viên</h1>
<?php
$id = $_GET['id'];
require "../config.php";
require "../connectDB.php";
$sql = "SELECT * FROM student WHERE id= $id";
$result = $conn->query($sql); // gửi thực thi đến mysql
$row = $result->fetch_assoc(); // hàm này lấy ra 1 row
?>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" placeholder="Tên của bạn" required name="name" value="<?= $row["name"] ?>">
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" class="form-control" placeholder="Ngày sinh của bạn" required name="birthday" value="<?= $row["birthday"] ?>">
                </div>
                <div class="form-group">
                    <label>Chọn Giới tính</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="0" <?= $row["gender"] == 0 ? "selected" : "" ?>>Nam</option>
                        <option value="1" <?= $row["gender"] == 1 ? "selected" : "" ?>>Nữ</option>
                        <option value="2" <?= $row["gender"] == 2 ? "selected" : "" ?>>Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                    <a href="list.php" class="btn btn-warning">Quay về</a>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require "../layout/footer.php" ?>