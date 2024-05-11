<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="../public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="container" style="margin-top:20px;">
        <a href="../student/list.html" class="active btn btn-info">Students</a>
        <a href="../subject/list.html" class=" btn btn-info">Subject</a>
        <a href="../register/list.html" class=" btn btn-info">Register</a>
        <div style="height:40px; margin-top:20px">
            <div class="error bg-danger container-fluid text-center">
            </div>
            <div class="message bg-primary container-fluid text-center">
            </div>
        </div>
        <h1>Danh sách sinh viên</h1>
        <a href="add.php" class="btn btn-info">Add</a>
        <form action="list.php" method="GET">
            <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="<?=$_GET["search"] ?? ""?>">
                <button class="btn btn-danger">Tìm</button>
            </label>
        </form>
        <?php
        require "../config.php"; // gắn cái kết nối ở đây
        require "../connectDB.php";
        require "../functions.php";
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã SV</th>
                    <th>Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM student";
                if(!empty($_GET["search"])){
                    $pattern = $_GET["search"];
                    $sql .= " WHERE name LIKE '%$pattern%'";
                }
                $result = $conn->query($sql);
                $stt = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $stt++;
                ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= formatVietNamDate($row['birthday']) ?></td>
                            <td><?= getGenderName($row['gender']) ?></td>
                            <td><a href="edit.html">Sửa</a></td>
                            <td><a onclick="return confirm('Bạn chắc xóa?')" data="1" class="delete" href="list.html" type="student">Xóa</a></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <th>No data</th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div>
            <span>Số lượng: <?= $stt ?></span>
        </div>
        <script src="../public/vendor/jquery-3.5.1.min.js"></script>
        <script src="../public/vendor/popper.min.js"></script>
        <script src="../public/vendor/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
        <script src="../public/js/script.js"></script>
    </div>
</body>

</html>