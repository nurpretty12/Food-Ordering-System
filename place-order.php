<?php
include 'includes/connect.php';
include 'includes/userid.php';
$total = 0;
	if($_SESSION['customer_sid']==session_id())
	{
$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while($row = mysqli_fetch_array($result)){
$name = $row['name'];	
$contact = $row['contact'];
$verified = $row['verified'];
}
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>ORDER DETAILS</title>


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
                    </h1></li>
                    </ul>			
                </div>
            </nav>
        </div>

  </header>

  <div id="main" style="background-image: url('images/chicken.jpg'); background-repeat: no-repeat; background-size: cover; width:100%">

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
            <li class="bold"><a href="index.php" class="collapsible collapsible-accordion"><i class="mdi-action-store"></i> FOOD MENU</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-maps-local-mall"></i> ORDERS</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="orders.php">ALL ORDERS</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
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
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-communication-message"></i> FEEDBACKS</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="feedbacks.php">ALL FEEDBACKS</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM feedbacks WHERE poster_id = $user_id AND not deleted;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="feedbacks.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>				
            <li class="bold"><a href="details.php" class="collapsible collapsible-accordion"><i class="mdi-social-people"></i> USERS</a>
            </li>				
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>

      <section id="content">


				<div class="container">

            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Details</h4>
              </div>
<div>
                <div class="card-panel">
                  <div class="row">
                    <form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="confirm-order.php" novalidate="novalidate">
                      <div class="row">
                        <div class="input-field col s12">
							<label for="payment_type">Payment Type</label><br><br>
              <div class="row">
  <div class="input-field col s12">
    <input type="hidden" id="payment_type" name="payment_type" value="Cash">
  </div>
</div>
              <h6>Cash</h6>
                        </div>
                      </div>					

                      </div>					  
                      <div class="row">
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
					  <?php
					  	foreach ($_POST as $key => $value)
						{
							if($key == 'action' || $value == ''){
								break;
							}
							echo '<input name="'.$key.'" type="hidden" value="'.$value.'">';
						}
					  ?>
                    </form>
                  </div>
                </div>
              </div>
            <div class="divider"></div>
            
          </div>


      </div>
	  
        <div class="container">
          <p class="caption">RECEIPT</p>
          <div class="divider"></div>

<div id="work-collections" class="seaction">
<div class="row">
<div>

<ul id="issues-collection" class="collection">
<?php
    echo '<li class="collection-item avatar">
        <i class="mdi-content-content-paste circle"></i>
        <p><strong>Name:</strong>'.$name.'</p>
		<p><strong>Contact Number:</strong> '.$contact.'</p>
        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>';
		
	foreach ($_POST as $key => $value)
	{
		if($value == ''){
			break;
		}
		if(is_numeric($key)){
		$result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
		while($row = mysqli_fetch_array($result))
		{
			$price = $row['price'];
			$item_name = $row['name'];
			$item_id = $row['id'];
		}
			$price = $value*$price;
			    echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"><strong>#'.$item_id.' </strong>'.$item_name.'</p>
            </div>
            <div class="col s2">
                <span>'.$value.' Pieces</span>
            </div>
            <div class="col s3">
                <span>RM '.$price.'</span>
            </div>
        </div>
    </li>';
		$total = $total + $price;
	}
	}
    echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"> Total</p>
            </div>
            <div class="col s2">
                <span>&nbsp;</span>
            </div>
            <div class="col s3">
                <span><strong>RM '.$total.'</strong></span>
            </div>
        </div>
    </li>';
		if(!empty($_POST['description']))
		echo '<li class="collection-item avatar"><p><strong>Note: </strong>'.htmlspecialchars($_POST['description']).'</p></li>';
?>
</ul>


                </div>
				</div>
                </div>
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
	<script type="text/javascript" src="js/plugins/formatter/jquery.formatter.min.js"></script>   

    <script type="text/javascript" src="js/plugins.min.js"></script>

	<script type="text/javascript">
    $("#formValidate").validate({


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
	  $('#cc_number').formatter({
          'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
          'persistent': true
      });
	  $('#cvv_number').formatter({
          'pattern': '{{9}}-{{9}}-{{9}}',
          'persistent': true
      });
		$('#payment_type').change(function() {
		if ($(this).val() === 'Cash') {
		  $("#cc_number").prop('disabled', true);
		  $("#cvv_number").prop('disabled', true);		  
		}
		if ($(this).val() === 'Wallet'){
		  $("#cc_number").prop('disabled', false);
		  $("#cvv_number").prop('disabled', false);	
		}
		});
    </script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>