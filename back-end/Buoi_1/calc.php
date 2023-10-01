<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng 2 số bằng ajax</title>
</head>

<body>
    Số 1: <input type="text" id="num1" placeholder="Nhập số 1"> <br><br>
    Số 2: <input type="text" id="num2" placeholder="Nhập số 2"><br><br>
    Kết quả: <span id="kq"></span> <br>
    <button>Tính tổng</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            var num1 = $("#num1").val();
            var num2 = $("#num2").val();
            $.ajax({
                type: "GET",
                url: "server-calc.php",
                data: {
                    number1: num1,
                    number2: num2
                },
                success: function(response) {
                    $("#kq").html(response)
                }
            });
        })
    });
</script>

</html>