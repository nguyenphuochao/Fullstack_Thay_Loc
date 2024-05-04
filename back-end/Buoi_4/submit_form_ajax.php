<!-- Viết code html,css,js,php chung 1 file nha -->
<!doctype html>
<html lang="en">

<head>
    <title>Send mail with ajax</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="sendMail.php" method="POST">
            <div class="form-group">
                <label>Fullname</label>
                <input type="text" placeholder="Họ và tên" name="fullname" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" placeholder="Họ và tên" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Fullname</label>
                <textarea name="content" rows="10" cols="10" class="form-control"></textarea>
            </div>
            <div class="message alert alert-success d-none"></div>
            <div>
                <button class="bnt btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("form").submit(function(e) {
                e.preventDefault(); // ngăn chặn sự kiện submit
                var method = $(this).attr("method");
                var submitUrl = $(this).attr("action");
                var fullname = $("input[name=fullname]").val(); // get value
                var email = $("input[name=email]").val();
                var content = $("textarea[name=content]").val();
                $(".message").html("Đang gửi mail.Vui lòng chờ...");
                $(".message").removeClass("d-none");
                $.ajax({
                    type: method,
                    url: submitUrl,
                    data: {
                        fullname: fullname,
                        email: email,
                        content: content
                    },
                    success: function(response) {
                        $(".message").html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>