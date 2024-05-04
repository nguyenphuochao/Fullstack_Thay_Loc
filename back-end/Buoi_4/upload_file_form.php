<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file </title>
</head>

<body>
    <form action="upload_file_submit.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="avatar"><br><br>
        <input type="text" name="desc"><br><br>
        <input type="text" name="test"><br><br>
        <input type="submit" value="Upload">
    </form>
</body>

</html>