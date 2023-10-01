<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
</head>

<body>
    <?php
    $danhSachNV = [
        ["code" => "NV123", "name" => "Nguyễn Văn Sáu", "department" => "Phát triển dự án", "salary" => 15000000],
        ["code" => "NV124", "name" => "Nguyễn Văn Bảy", "department" => "Nhân sự", "salary" => 11000000],
        ["code" => "NV125", "name" => "Nguyễn Thị Tám", "department" => "Thiết kế", "salary" => 14000000],
    ];
    ?>
    <table border="1">
        <p>Số lượng : <?php echo count($danhSachNV) ?> nhân viên</p>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Department</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($danhSachNV as $value) : ?>
                <tr>
                    <td><?php echo $value["code"]; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo $value["department"]; ?></td>
                    <td><?php echo number_format($value["salary"]); ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>