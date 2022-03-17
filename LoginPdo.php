<?php

session_start();

$conn = mysqli_connect('localhost','root','','manhquang');
$err=[];
if(isset($_POST['login'])){
      $email = $_POST['mail_address'];
      $password = $_POST['password'];

if(empty($email) || strlen($email) > 255 ){
    $err['mail_address'] = 'email không được bỏ trống và nhỏ hơn 255 ký tự';

}
if(empty($password) || strlen($password) < 6 || strlen($password)>50){
    $err['password'] = 'password từ 6 đến 50 ký tự';
}

$sql = "SELECT * FROM users WHERE mail_address ='$email'";
$query = mysqli_query($conn,$sql);

$data = mysqli_fetch_row($query);


$checkMail = mysqli_num_rows($query);




if($checkMail != 0){
   
    $checkPass=password_verify($password , $data['password']);
    $checkPass=md5($checkPass);
    if($checkPass){
      $_SESSION['user'] = $data;
      header('location: LoginSuccessPdo.php');
    }else{
        $err['checkPass']= 'Sai mật khẩu';
    }
}else {
    $err['checkMail']= 'Sai Email';
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css">
    <style>
        .form-error{
            color: red;
        }
    </style>

</head>
<body>



   <div class="container">
    
    <div class="row">
        
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            
            <form action="" method="POST" role="form">
                
            <h1 style="font-size: 28px; margin-bottom: 20px;">Đăng Nhập</h1>
                    <div class="form-error">
                        <span><?php echo(isset($err['checkMail']))?$err['checkMail']:'' ?></span>
                    </div>
                    <div class="form-error">
                        <span><?php echo(isset($err['checkPass']))?$err['checkPass']:'' ?></span>
                    </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="mail_address" class="form-control" id="" placeholder="Nhập email">
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
                <div  class="form-group">
                            <input  type="checkbox"> Remember me
                        </div>
                        <div class="form-group">
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
            </form>
            
        </div>
        
    </div>
    
</div>
</body>

</html>