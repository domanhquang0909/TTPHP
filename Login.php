<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>


<?php

if(isset($_POST['btn_submit'])){
$email = $_POST['email'];
$password = $_POST['password'];

}
if (!empty($email) && !empty($password)) {
    if (strlen($email) > 255) {
        echo ' Email phải nhỏ hơn 255 ký tự ';
    }
    if (strlen($password) < 6 || strlen($password) > 50) {
        echo '<font style="color:red;"><h2> Mật Khẩu có độ dài từ 3 đến 50 ký tự </h2></font>';
    } elseif ($email == 'manhquang@gmail.com' && $password == 'manhquang123') {
        header('location: LoginSuccess.php ');
        die();
    } else {
        echo '<p style="color:red;"<h3> Đăng nhập thất bại </h3></p>';
    }
}
?>
    <form style="margin-top: 20px;" action="" method="post">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3  style="font-family: 'Times New Roman', Times, serif; text-align: center; font-size: 24px; " class="panel-title">ĐĂNG NHẬP</h3>
                        </div>
                        <div class="panel-body">
                            <label for="">Email</label>
                            <input type="email" value="" class="form-control" placeholder="Nhập email" name="email">
                        </div>
                        <div class="panel-body">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập password">
                        </div>
                        <div  class="panel-body">
                            <input  type="checkbox"> Remember me
                        </div>
                        <div class="panel-body">
                            <button type="submit" name="btn_submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>

</html>