<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test time ajax</title>
</head>

<body>
    <button>Mấy giờ rồi</button>
    <div>Kết quả: <span id="kq"></span></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            $.ajax({
                type: "GET",
                url: "server-time.php",
                success: function(response) {
                    $("#kq").html(response)
                }
            });

        });
    });
</script>

</html>