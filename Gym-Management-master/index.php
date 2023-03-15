<?php
session_start();
require('db.php');
$username="";
$errors = array(); 

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  if (count($errors) == 0) {
    $query = "SELECT * FROM login WHERE uname='$username' AND pwd='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['uname'] = $username;
      header("location:home.php?info=add_gym");
    }else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");
    }
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gym Management</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
      margin:0;
      padding:0;
      font-family: 'Times New Roman', Times, serif;
      background: url(2.png) no-repeat;
      background-size: cover
    }
  
  .heading h1{
    color: red;
    font-size: 50px;
    font-style: oblique;
    font-weight: bolder;
    font-family:Arial;
    padding-left: 400px;
    float: center;
    padding-top: 50px; 
    border-bottom: 1px solid red;
  }

	.login-box{
		width:280px;
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    color: white;
	}
	
  .login-box h2{
    float:left;
    font-size: 45px;
    border-bottom:3px solid red;
    margin-bottom:50px;
    padding:13px 0;
  }

  .heading h1:hover{
    color: white;
    transition: 0.3s ease;
}

  .textbox{
    width:100%
    overflow: hidden;
    font-size:20px;
    padding:8px 0;
    margin:8px 0;
    border-bottom: 1px solid red;
  }

  .textbox i{
    width: 20px;
    float:left;
    text-align:center;
    position:relative;
    left:-15px;
    top:25px;

  }

  .textbox input{
    border:none;
    outline:none;
    background:none;
    color: white;
    font-size:18px;
    width:80%
    float:center;
    margin: 0 10px;
  }

  .form{
    background: rgba(0,0,0,0.8);
    border-radius:10px;
    box-shadow: 0 25px 25px rgba(0,0,0,0.5);
    padding: 0px 30px 30px;
  }

  .btn{
    width:100%;
    background:none;
    border:2px solid red;
    color: white;
    padding:5px;
    font-size:18px;
    cursor:pointer;
    margin: 12px 0;  
  }

  .copyright h3{
    color: grey;
    font-size: 15px;
    font-family:Arial;
   position: absolute;
   bottom:-5px;
   right:50px;

  }
    
  </style>
</head>
<body>
  <div class="heading">
<h1> GYM MANAGEMENT DATABASE </h1>
</div>
<div class="login-box">
 
  <form class="form " action="" method="post">
  <h2> Admin Login </h2> <br>
  <div class="textbox" action="" method="post"> <br> <br> <br>
    <i class="fas fa-user" aria-hidden="true"> </i> 
    <input type="text"  name="username" placeholder="Username" value=""> 
  </div>

  <div class="textbox" action="" method="post">
    <span><i class="fas fa-lock" aria-hidden="true"></i></span>
    <input type="password" placeholder="Password" name="pwd" value="">
  </div>

    
	  <button type="submit" class="btn btn-outline-light mb-2" name="login_user">Login</button>
</form>
	 <br> 


<div class="copyright">
<i class="far fa-copyright"></i><br>
<h3>Nidhi Nayak & Kshitij Srivastav</h3>
</div>


</body>
</html>