<aside class="main-sidebar">

<section class="sidebar">

<div class="user-panel">

<div class="pull-left image" style="height:50px;">

<!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

</div>

<div class="pull-left info" style="left:0px">

<p>
Admin Panel
</p>

<a href="<?php $gf->linkURL('admin/dashboard.php');?>"><i class="fa fa-circle text-success"></i> Online</a>

</div>

</div>

<?php if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != "")){ ?>

<ul class="sidebar-menu">

<li class="treeview <?php if($getPageName == 'theme-panel.php'){?> active <?php }?>">

<a href="theme-panel.php"><i class="fa fa-link"></i> <span>Theme Panel</span></a>

</li>

<li class="treeview <?php if($getPageName == 'create-testi.php' || $getPageName == 'list-testi.php' || $getPageName == 'edit-testi.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Testimonial</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/create-testi.php');?>">Create Testimonial</a></li>

<li><a href="<?php $gf->linkURL('admin/list-testi.php');?>">List Testimonial</a></li>

</ul>

</li>

<li class="treeview <?php if($getPageName == 'create-faq.php' || $getPageName == 'list-faq.php' || $getPageName == 'edit-faq.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Faq</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/create-faq.php');?>">Create Faq</a></li>

<li><a href="<?php $gf->linkURL('admin/list-faq.php');?>">List Faq</a></li>

</ul>

</li>

<li class="treeview <?php if($getPageName == 'list-user.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/list-user.php');?>">List User</a></li>

</ul>

</li>

<li class="treeview <?php if($getPageName == 'list-order.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Order</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/list-order.php');?>">List Order</a></li>

</ul>

</li>


<li class="treeview <?php if($getPageName == 'create-exam.php' || $getPageName == 'list-exam.php' || $getPageName == 'edit-exam.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Exam</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/create-exam.php');?>">Create Exam</a></li>

<li><a href="<?php $gf->linkURL('admin/list-exam.php');?>">List Exam</a></li>

</ul>

</li>


<li class="treeview <?php if($getPageName == 'create-test.php' || $getPageName == 'list-test.php' || $getPageName == 'edit-test.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Test</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/create-test.php');?>">Create Test</a></li>

<li><a href="<?php $gf->linkURL('admin/list-test.php');?>">List Test</a></li>

</ul>

</li>


<li class="treeview <?php if($getPageName == 'create-question-answer.php' || $getPageName == 'list-question-answer.php' || $getPageName == 'edit-question-answer.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Question-Answer(PT & other)</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/create-question-answer.php');?>">Create Question Answer</a></li>

<li><a href="<?php $gf->linkURL('admin/list-question-answer.php');?>">List Question Answer</a></li>

</ul>

</li>


<li class="treeview <?php if($getPageName == 'create-question-answer2.php' || $getPageName == 'list-question-answer2.php' || $getPageName == 'edit-question-answer2.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Question-Answer(Mains & SSC III)</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/create-question-answer2.php');?>">Create Question Answer</a></li>

<li><a href="<?php $gf->linkURL('admin/list-question-answer2.php');?>">List Question Answer</a></li>

</ul>

</li>


<li class="treeview <?php if($getPageName == 'list-answers.php' || $getPageName == 'give-marks.php'){?> active <?php }?>">

<a href="#"><i class="fa fa-link"></i> <span>Give marks</span> <i class="fa fa-angle-left pull-right"></i></a>

<ul class="treeview-menu">

<li><a href="<?php $gf->linkURL('admin/list-answer.php');?>">List Answers</a></li>

</ul>

</li>


<li class="treeview <?php if($getPageName == 'user-result.php'){?> active <?php }?>">

<a href="user-result.php"><i class="fa fa-link"></i> <span>Result</span></a>

</li>





</ul>

<?php }else{ ?>

<?php /*?><ul class="sidebar-menu">

<li class="<?php if($getPageName == 'dashboard.php'){?> active <?php }?>"><a href="<?php $gf->linkURL('admin/dashboard.php');?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>

<li class="<?php if($getPageName == 'list_profile_user.php' || $getPageName == 'update_profile_user.php'){?> active <?php }?>"><a href="<?php $gf->linkURL('admin/list_profile_user.php');?>"><i class="glyphicon glyphicon-pencil"></i> <span>My Profile</span></a></li>

<li class="<?php if($getPageName == 'list-category-user.php'){?> active <?php }?>"><a href="<?php $gf->linkURL('admin/list-category-user.php');?>"><i class="glyphicon glyphicon-pencil"></i> <span>List Category Assign</span></a></li>

<li><a href="<?php $gf->linkURL('admin/logout.php');?>" onclick="return confirm('Are You Sure You Want To Logout !!')"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

</ul><?php */?>

<?php } ?>

</section>

</aside>