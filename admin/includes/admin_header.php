<header class="main-header">
<a href="dashboard.php" class="logo">
<span class="logo-mini"><b>SY</b>S</span>
<span class="logo-lg"><b><?php echo SITE_NAME; ?></b></span>
</a>
<nav class="navbar navbar-static-top" role="navigation">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
<span class="hidden-xs">
<?php 
if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != ""))
echo $_SESSION['ADMIN']['name'];
else
echo $_SESSION['CLIENTS']['name'];
?>
</span>
</a>
<ul class="dropdown-menu">
<li class="user-header">
<?php if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != "")){ ?>
<!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
<p><?php echo $_SESSION['ADMIN']['name']; ?>
<small><strong>Last-loging IP:</strong> <?php echo $getAdminDeatils['admin_last_login_ip']; ?></small>
<small><strong>Last-visted TIME:</strong> <?php echo $getAdminDeatils['admin_last_login_datetime']; ?></small>
</p>
<?php }else{ ?>
<?php /*?><?php if(!empty($_SESSION['CLIENTS']['logo'])){ ?>
<img src="../images/upload/clients/<?php echo $_SESSION['CLIENTS']['logo']; ?>" class="img-circle" alt="User Image">	
<?php } ?><?php */?>
<p><?php echo $_SESSION['CLIENTS']['name']; ?>
<small><strong>Email:</strong> <?php echo $_SESSION['CLIENTS']['email']; ?></small>
<small><strong>Phone:</strong> <?php echo $_SESSION['CLIENTS']['phone']; ?></small>
</p>
<?php } ?>
</li>
<li class="user-footer">

<div class="pull-right">
<a href="logout.php" class="btn btn-default btn-flat" onclick="return confirm('Are You Sure You Want To Logout !!')">Logout</a>
</div>
</li>
</ul>
</li>
<li>
</li>
</ul>
</div>
</nav>
</header>