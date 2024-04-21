<?php
include 'includes/connect.php';
include 'includes/userid.php';

	if($_SESSION['customer_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>ORDERS DETAILS</title>



 
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
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

  <div id="main">
   
    <div class="wrapper">

      
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation" style="background-image: url('images/waffle.jpg'); background-repeat: no-repeat; background-size: cover; width:16%">
            <li class="user-details cyan darken-2" style="background-image:url(images/chicken1.jpeg)" >
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
            <li class="bold"><a href="index.php" class="collapsible collapsible-accordion"><i class="mdi-action-store"></i>FOOD MENU</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"><i class="mdi-maps-local-mall"></i> ORDERS</a>
                            <div class="collapsible-body">
                                <ul>
								<li class="<?php
								if(!isset($_GET['status'])){
										echo 'active';
									}?>
									"><a href="orders.php">ORDER DETAILS</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders  WHERE customer_id = $user_id;;");
									while($row = mysqli_fetch_array($sql)){
									if(isset($_GET['status'])){
										$status = $row['status'];
									}
                                    echo '<li class='.(isset($_GET['status'])?($status == $_GET['status'] ? 'active' : ''): '').'><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
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

      <section id="content" >

        <div id="breadcrumbs-wrapper" style="background-image: url('images/chicken.jpg'); background-repeat: no-repeat; background-size: cover; width:100%">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">PAST ORDERS</h5>
              </div>
            </div>
        </div>
 



        <div class="container">

<div id="work-collections" class="seaction">
             
					<?php
					if(isset($_GET['status'])){
						$status = $_GET['status'];
					}
					else{
						$status = '%';
					}
					$sql = mysqli_query($con, "SELECT * FROM orders WHERE customer_id = $user_id AND status LIKE '$status';;");
					echo '              <div class="row">
                <div>
                    <h4 class="header">List</h4>
                    <ul id="issues-collection" class="collection">';
					while($row = mysqli_fetch_array($sql))
					{
						$status = $row['status'];
						echo '<li class="collection-item avatar">
                              <i class="mdi-content-content-paste circle"></i>
                              <span class="collection-header">Order No. '.$row['id'].'</span>
                              <p><strong>Date:</strong> '.$row['date'].'</p>
                              <p><strong>Payment Type:</strong> '.$row['payment_type'].'</p>						   							  
							  '.(!empty($row['description']) ? '<p><strong>Note: </strong>'.$row['description'].'</p>' : '').'						                               
							  <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                              </li>';
						$order_id = $row['id'];
						$sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $order_id;");
						while($row1 = mysqli_fetch_array($sql1))
						{
							$item_id = $row1['item_id'];
							$sql2 = mysqli_query($con, "SELECT * FROM items WHERE id = $item_id;");
							while($row2 = mysqli_fetch_array($sql2)){
								$item_name = $row2['name'];
							}
							echo '<li class="collection-item">
                            <div class="row">
                            <div class="col s7">
                            <p class="collections-title"><strong>#'.$row1['item_id'].'</strong> '.$item_name.'</p>
                            </div>
                            <div class="col s2">
                            <span>'.$row1['quantity'].' Pieces</span>
                            </div>
                            <div class="col s3">
                            <span>RM. '.$row1['price'].'</span>
                            </div>
                            </div>
                            </li>';
							$id = $row1['order_id'];
						}
								echo'<li class="collection-item">
                                        <div class="row">
                                            <div class="col s7">
                                                <p class="collections-title"> Total</p>
                                            </div>
                                            <div class="col s2">
											<span> </span>
                                            </div>
                                            <div class="col s3">
                                                <span><strong>RM. '.$row['total'].'</strong></span>
                                            </div>';
								if(!preg_match('/^CANCELLED/', $status)){
									if($status != 'DELIVERED'){
								echo '<form action="routers/cancel-order.php" method="post">
										<input type="hidden" value="'.$id.'" name="id">
										<input type="hidden" value="CANCELLED" name="status">	
										<input type="hidden" value="'.$row['payment_type'].'" name="payment_type">											
										<button class="btn waves-effect waves-light right submit" type="submit" name="action">Cancel Order
                                              <i class="mdi-content-clear right"></i> 
										</button>
										</form>';
								}
								}
								echo'</div></li>';

					}
					?>
				 </ul>
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

    <script type="text/javascript" src="js/plugins.min.js"></script>

</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:all-orders.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>