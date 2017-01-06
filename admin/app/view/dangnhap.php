<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="<?= BASE_DIR_ADMIN ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= BASE_DIR_ADMIN ?>css/admin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>

<body>
<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

    <form class="form-signin" action="<?= BASE_URL_ADMIN ?>controlleradmin/dangNhap" method="POST">
        <h1 class="form-signin-heading text-muted">Đăng nhập</h1>
        <input type="text" class="form-control" placeholder="Tên đăng nhập" required="" autofocus="" name="username">
        <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Đăng nhập
        </button>
    </form>

</div>
</body>
</html>