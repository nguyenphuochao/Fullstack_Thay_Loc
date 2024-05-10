<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng 2 số bằng ajax</title>
</head>

<body>
    Số 1: <input type="text" id="num1" placeholder="Nhập số 1"><br><br>
    <div id="errorNum1" style="color: red;"></div>
    Số 2: <input type="text" id="num2" placeholder="Nhập số 2"><br><br>
    <div id="errorNum2" style="color: red;"></div>
    Kết quả: <span id="kq"></span> <br>
    <button>Tính tổng</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            // reset error
            $("#errorNum1").html('');
            $("#errorNum2").html('');
            $("#kq").html('');
            var num1 = $("#num1").val();
            var num2 = $("#num2").val();
            // validate
            if (num1 == '') {
                $("#errorNum1").html("Vui lòng nhập số thứ 1");
                return;
            }
            if (num2 == '') {
                $("#errorNum2").html("Vui lòng nhập số thứ 2");
                return;
            }
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