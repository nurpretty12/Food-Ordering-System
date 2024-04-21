<?php  
session_start(); 
if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']))
{
	header("location:index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en" style="background-image: url('images/chicken.jpg'); background-repeat: no-repeat; background-size: cover; width:100%">

<head >
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>LOGIN</title>

  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">


  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan" >

  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>




  <div id="login-page" class="row1" >
    
      <form method="post" action="routers/router.php" class="login-form" id="form">
        <div class="row">
          <div class="input-field col s12 center">
            <h4 class="center login-form-text">M A BERKAT ENTERPRISE </h4>
            <h4 class="center login-form-text">BOOKING SYSTEM</h4>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-face-unlock prefix"></i>
            <input name="username" id="username" type="text">
            <label for="username" class="center-align">USERNAME</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock prefix"></i>
            <input name="password" id="password" type="password">
            <label for="password">PASSWORD</label>
          </div>
        
        <p class="center login-form-text">Don't have any account?</p>
          
        <div class="row">
			<a href="javascript:void(0);" onclick="document.getElementById('form').submit();" class="btn waves-effect waves-light col s12">LOGIN</a>
          </div>
		  		<div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin big-medium"><a href="register.php">Register Now!</a></p>
          </div>         
        </div>
        </div>


      </form>
    </div>
  </div>

  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
 
  <script type="text/javascript" src="js/materialize.min.js"></script>
 
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script type="text/javascript" src="js/plugins.min.js"></script>

</body>
</html>
<?php
}
?>