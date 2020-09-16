<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>SQL Injection</title>
</head>
<body>
  <?php 
      require 'connect.php';
  ?>
    <div class="container login-container" >
      <form method="POST" action="<?php echo "index.php" ?>">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="<?php echo "username" ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name = "<?php echo "password" ?>" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button name="<?php echo "submit" ?>" type="submit" class="btn btn-primary">Submit</button>
      </form>    
    </div>
    <?php
        require 'connect.php';
        if(isset($_POST['submit'])){
            if($_POST['username'] == null){
                echo"Please enter your username! </br>";
            }
            else{
                $u =$_POST['username'];
            }
            if($_POST['password'] == null){
                echo"Please enter your password! </br>";
            }
            else{
                $p =$_POST['password'];
            }
            if($u && $p){
                $sql="SELECT * FROM user where username='".$u."' and password='".$p."'";
                $sql2="SELECT * FROM user where username='".$u."' and password='".$p."'";
                // 1111'or '1' = '1           // đây là mk của th nối chuỗi ra kết quả truy cập trái phép vào DB
                $result= mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)==0){
                    echo"Sai tài khoản hoặc mật khẩu, Vui lòng thử lại !";
                }
                else{
                    // echo"Fail";
                    header("Location: home.html");
                }
            }
        }
    ?>

    <script src="script.js"></script>
    <!-- bootstrap scrip  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>