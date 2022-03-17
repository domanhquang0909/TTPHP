
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css">
    <title>Document</title>

    <style>
        .form-error{
            color: red;
        }
    </style>    
</head>
<body>

<?php
session_start();
$conn = mysqli_connect('localhost','root','','manhquang');
$err=[];
if(isset($_POST['mail_address'])){
$mail_address = $_POST['mail_address'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

}
 
    if (empty($mail_address) || strlen($mail_address) > 255 ) {
        $err['mail_address'] = 'Bạn chưa nhập email';
    }
    if (empty($password)|| strlen($password) < 6 || strlen($password) > 50) {
        $err['password']= 'Bạn chưa nhập mật khẩu';
    } 

    if(empty($password) || $password != $password_confirm){
        $err['password_confirm'] = 'Mật khẩu nhập lại không trùng khớp';
    }

    if(empty($err)){
        $pass= password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(mail_address,password) VALUES('$mail_address','$pass')";
        $query =  mysqli_query($conn,$sql);

        if($query){
            header('location: LoginPdo.php');
        }
    }

?>


<div class="container">
    
    <div class="row">
        
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            
            <form action="" method="POST" role="form">
                <h1 style="font-size: 28px; margin-bottom: 20px;">Đăng ký</h1>
            
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="Email" name="mail_address" class="form-control" id="" placeholder="Nhập email">
                    <div class="form-error">
                        <span><?php echo(isset($err['mail_address']))?$err['mail_address']:'' ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="" placeholder="Nhập mật khẩu">
                    <div class="form-error">
                        <span><?php echo(isset($err['password']))?$err['password']:'' ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirm" class="form-control" id="" placeholder="Nhập lại mật khẩu">
                    <div class="form-error">
                        <span><?php echo(isset($err['password_confirm']))?$err['password_confirm']:'' ?></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
            
        </div>
        
    </div>
    
</div>

</body>
</html>