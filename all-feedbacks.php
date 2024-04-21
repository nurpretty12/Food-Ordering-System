<?php
include 'includes/connect.php';
include 'includes/userid.php';

	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en" style="background-image: url('images/chicken.jpg'); background-repeat: no-repeat; background-size: cover; width:150%">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>FEEDBACKS</title>

  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>

  <header id="header" class="page-topbar">
        <div class="navbar-fixed" >
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

 
  <div id="main" style="background-image: url('images/chicken.jpg'); background-repeat: no-repeat; background-size: cover; width:150%">
    
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
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
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
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"></i> FEEDBACKS</a>
                            <div class="collapsible-body">
                                <ul>
								<li class="<?php
								if(!isset($_GET['status'])){
										echo 'active';
									}?>
									"><a href="all-feedbacks.php">ALL FEEDBACKS</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM feedbacks;");
									while($row = mysqli_fetch_array($sql)){
									if(isset($_GET['status'])){
										$status = $row['status'];
									}
                                    echo '<li class='.(isset($_GET['status'])?($status == $_GET['status'] ? 'active' : ''): '').'><a href="all-feedbacks.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>			
            <li class="bold"><a href="details.php" class="collapsible collapsible-accordion"></i> USERS</a>
            </li>				
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      
      <section id="content">

      
        <div id="breadcrumbs-wrapper" style="background-image: url('images/chicken.jpg'); background-repeat: no-repeat; background-size: cover; width:150%">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">FEEDBACKS</h5>
              </div>
            </div>
          </div>
        </div>
        
		
	       
        <div class="container">
          <p class="caption">List of feedbacks</p>
          <div class="divider"></div>
									<div id="work-collections">
									<ul id="projects-collection" class="collection">
								<?php
									if(isset($_GET['status'])){
										$status = $_GET['status'];
									}
									else{
										$status = '%';
									}			
									$sql = mysqli_query($con, "SELECT * FROM feedbacks WHERE status LIKE '$status';");
									while($row = mysqli_fetch_array($sql)){								                                
									echo'<a href="view-feedbacks-admin.php?id='.$row['id'].'"class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">'.$row['subject'].'</p>                                              
                                            </div>
                                            <div class="col s2">
                                            <span class="task-cat  black text">'.$row['status'].'</span></div>											
                                            <div class="col s2">
                                            <span class="task-cat grey darken-3">'.$row['type'].'</span></div>
                                            <div class="col s2">
                                            <span class="badge">'.$row['date'].'</span></div>
                                        </div>
                                    </a>';
									}
									?>
									</ul>
									</div>
            <div class="divider"></div>
            
          </div>
        
  
      </section>




    
    
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    
    <script type="text/javascript" src="js/materialize.min.js"></script>
   
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    
    <
    <script type="text/javascript" src="js/plugins.min.js"></script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:feedbacks.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>