<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Blood Bank & Management - Admin Login</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style>
    body {
      background-image: url('https://www.freevector.com/uploads/vector/preview/24437/DD-Space-Background-00908-Preview.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      background: rgba(0, 0, 0, 0.7);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
      color: white;
    }
    .card-header {
      text-align: center;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    .form-control {
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: none;
    }
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }
    .btn-primary {
      border-radius: 25px;
      padding: 12px 30px;
      font-size: 18px;
      font-weight: bold;
      background-color: #ff4757;
      border-color: #ff4757;
      transition: all 0.3s;
    }
    .btn-primary:hover {
      background-color: #e84118;
      border-color: #e84118;
    }
    .alert {
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7 col-sm-9">
        <div class="card">
          <div class="card-header">
            <h2>Blood Bank & Management</h2>
            <h4>Admin Login Portal</h4>
          </div>
          <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-group">
                <label for="username">Username <span style="color: red;">*</span></label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
              </div>
              <div class="form-group">
                <label for="password">Password <span style="color: red;">*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
              </div>
              <div class="form-group text-center">
                <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
              </div>
            </form>
            <?php
              include 'conn.php';
              if(isset($_POST["login"])){
                $username=mysqli_real_escape_string($conn,$_POST["username"]);
                $password=mysqli_real_escape_string($conn,$_POST["password"]);
                $sql="SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
                $result=mysqli_query($conn,$sql) or die("Query failed.");
                if(mysqli_num_rows($result)>0) {
                  session_start();
                  $_SESSION['loggedin'] = true;
                  $_SESSION["username"]=$username;
                  header("Location: dashboard.php");
                } else {
                  echo '<div class="alert alert-danger"> Username and Password do not match!</div>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>