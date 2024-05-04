<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login (POST/GET)</title>
    <style>
        fieldset {
            width: 200px;
        }
    </style>
</head>

<body>
    <!-- Form là phương thức POST -->
    <form action="login_submit.php" method="POST">
        <fieldset>
            <legend>Login</legend>
            <input type="text" name="username"><br><br>
            <input type="password" name="password"><br><br>
            <button>Login</button>
        </fieldset>
    </form>
    <!-- Link là phương thức GET -->
    <a href="get_product.php?maSP=1">Sản phẩm 1</a>
    <a href="get_product.php?maSP=2">Sản phẩm 2</a>
</body>

</html>