<?php
include 'includes/connect.php';


	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>USER LIST</title>

  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">


  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
     <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  </style> 
</head>

<body>

  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>

  <header id="header" class="page-topbar">

        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                    <li><h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><div class="logo" style=>M A BERKAT ENTERPRISE</a>
                    </ul>
                </div>
            </nav>
        </div>

  </header>

  <div id="main" style="background-image: url('images/chicken.jpg'); background-repeat: no-repeat; background-size: cover; width:80%">

    <div class="wrapper">

      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation" style="background-image: url('images/waffle.jpg'); background-repeat: no-repeat; background-size: cover; width:16%">
            <li class="user-details cyan darken-2" style="background-image:url(images/chicken1.jpeg)">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/profile_1.png" alt="" class="circle responsive-img valign profile-image">
                </div>
				 <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> LOGOUT</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <li class="bold"><a href="index.php" class="collapsible collapsible-accordion"></i> FOOD MENU</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"></i> ORDERS</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="all-orders.php">ALL ORDERS</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                 <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"></i> FEEDBACKS</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="all-feedbacks.php">ALL FEEDBACKS</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM feedbacks;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-feedbacks.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>			
            <li class="bold active"><a href="users.php" class="collapsible collapsible-accordion"></i> USERS</a>
            </li>			
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>

      <section id="content">


        <div class="container">
          <div class="divider"></div>

          <div id="editableTable" class="section">
		  <form class="formValidate" id="formValidate1" method="post" action="routers/user-router.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">List of users</h4>
              </div>
              <div >
<table >
                    <thead style= "background :#4caf50">
                      <tr>
                        <th data-field="name">NAME</th>
                        <th data-field="price">EMAIL</th>
                        <th data-field="price">CONTACT</th>
                        <th data-field="price">ROLE</th>
                        <th data-field="price">VERIFIED</th>
                        <th data-field="price">ENABLE</th>				
                      </tr>
                    </thead>

                    <tbody style="backdrop-filter: blur(10px);">
				<?php
				$result = mysqli_query($con, "SELECT * FROM users");
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td>'.$row["name"].'</td>';
					echo '<td>'.$row["email"].'</td>';
					echo '<td>'.$row["contact"].'</td>';        					
					echo '<td><select name="'.$row['id'].'_role">
                      <option value="Administrator"'.($row['role']=='Administrator' ? 'selected' : '').'>Administrator</option>
                      <option value="Customer"'.($row['role']=='Customer' ? 'selected' : '').'>Customer</option>
                    </select></td>';
					echo '<td><select name="'.$row['id'].'_verified">
                      <option value="1"'.($row['verified'] ? 'selected' : '').'>Verified</option>
                      <option value="0"'.(!$row['verified'] ? 'selected' : '').'>Not Verified</option>
                    </select></td>';	
					echo '<td><select name="'.$row['id'].'_deleted">
                      <option value="1"'.($row['deleted'] ? 'selected' : '').'>Disable</option>
                      <option value="0"'.(!$row['deleted'] ? 'selected' : '').'>Enable</option>
                    </select></td>';
			
				}
				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12" >
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action" >Modify
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form >
		  <form class="formValidate" id="formValidate" method="post" action="routers/add-users.php" novalidate="novalidate" >
            <div class="row" style="backdrop-filter: blur(10px);">
              <div class="col s12 m4 l3">
                <h4 class="header">Add User</h4>
              </div>
              <div>
<table>
                    <thead>
                      <tr>
                        <th data-field="name">USERNAME</th>
                        <th data-field="name">PASSWORD</th>							
                        <th data-field="name">NAME</th>
                        <th data-field="price">EMAIL</th>
                        <th data-field="price">CONTACT</th>
                        <th data-field="price">ROLE</th>
                        <th data-field="price">VERIFIED</th>
                        <th data-field="price">ENABLE</th>		
                      </tr>
                    </thead>

                    <tbody>
				<?php
					echo '<tr><td><label for="username">Username</label><input id="username" name="username" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';   									
					echo '<td><label for="password">Password</label><input id="password" name="password" type="password" data-error=".errorTxt03"><div class="errorTxt03"></div></td>';   									
					echo '<td><label for="name">Name</label><input id="name" name="name" type="text" data-error=".errorTxt04"><div class="errorTxt04"></div></td>';
					echo '<td><label for="email">Email</label><input id="email" name="email" type="email"></td>';
					echo '<td><label for="contact">Phone number</label><input id="contact" name="contact" type="number" data-error=".errorTxt05"><div class="errorTxt05"></div></td>';      
					echo '<td><select name="role">
                      <option value="Administrator">Administrator</option>
                      <option value="Customer" selected>Customer</option>
                    </select></td>';
					echo '<td><select name="verified">
                      <option value="1">Verified</option>
                      <option value="0" selected>Not Verified</option>
                    </select></td>';	
					echo '<td><select name="deleted">
                      <option value="1">Disable</option>
                      <option value="0" selected>Enable</option>
                    </select></td></tr>';					
				?>
                    </tbody>
</table>
              </div>
			  <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
            </div>
			</form>			
            <div class="divider"></div>
            
          </div>
        </div>
        </div>


      </section>

    </div>


  </div>

    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    

    <script type="text/javascript" src="js/plugins/angular.min.js"></script>

    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    	
	
    <script type="text/javascript" src="js/plugins.min.js"></script>

    <script type="text/javascript" src="js/custom-script.js">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
            },
            password: {
                required: true,
                minlength: 5,
            },
            name: {
                required: true,
                minlength: 5,
			},
            contact: {
                required: true,
                minlength: 4,
			},		
            balance: {
                required: true,
			},				
		},
        messages: {
           username:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },	
           password:{
                required: "Provide a prove",
                minlength: "Password must be atleast 5 characters long",
            },	
           name:{
                required: "Please provide CVV number",
                minlength: "Enter at least 5 characters",		
            },	
           contact:{
                required: "Please provide card number",
                minlength: "Enter at least 4 digits",
            },	
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     }); 
    </script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:index.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>