  <?php 

require('configure.php'); 

if(empty($_SESSION["student_id"]))
{
	header('Location: index.php');
}
$id = $_SESSION['student_id'];

?>

<?php include "includes/header.php" ?>



<div class="row topspace">
<div class="post-hero">
<div class="row">

						
<div class="container">
<div class="marqu-icon">
<a href="#">
<i class="fa fa-user" aria-hidden="true"></i>
</a>
</div>



 <?php include('includes/dashboard-marquee.php'); ?> 

<p class="upload"><i class="fa fa-cloud-upload"></i><a href="student-resume.php">Upload Resume</a></p>	
</div>		
</div>
</div>




<div class="row">
<img src="images/banner/profile.jpg" alt="" width="100%">
</div>

</div>



			
<div class="clearfix"></div>
			

<div class="row">
<div id="main"> 
<div class="container">
<!--<h1 class="page-header">My Profile</h1>-->


<?php include('includes/navbar-dashboard.php'); ?> 


<div class="top-std">





<div class="col-md-12 personal-info">

<div class="top-std">
<div class="table-responsive">
  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
    <thead>
      <tr>
        <th style="width:10%">Book Name</th>
        <th style="width:10%" class="hidden-phone">Price</th>
         <th style="width:10%" class="hidden-phone">Title</th>
         <th style="width:10%" class="hidden-phone">Image</th>
         <th style="width:10%" class="hidden-phone">Download</th>
         <th style="width:10%" class="hidden-phone">Transaction</th>
         <th style="width:20%" class="hidden-phone">Status</th>
        <th style="width:20%" class="hidden-phone">Purchase Date</th>
      </tr>
    </thead>
    <tbody>
	
	<?php 
	
	//$select_applyjob_list = mysql_query("select `admin_job_apply`.`apply_date`,`admin_category`.`category_name`,`admin_company`.`image_browse`,`admin_company`.`company_phone_no`,`admin_company`.`company_email`,`admin_company`.`company_address`,`admin_company`.`company_website`,`admin_company`.`company_name`,`admin_jobs`.`job_title`,`admin_jobs`.`job_type` from `admin_jobs` inner join `admin_category` on `admin_jobs`.`category_id` = `admin_category`.`id` inner join `admin_company` on `admin_company`.`id` = `admin_jobs`.`company_id` inner join `admin_job_apply` on `admin_job_apply`.`company_id` = `admin_company`.`id` where `admin_job_apply`.`user_id` = '".$_SESSION['student_id']."'");
	$select_purchase_list = mysql_query("select * from `admin_payment` inner join `admin_e_library` on `admin_payment`.`product_id` = `admin_e_library`.`id` where `admin_payment`.`user_id` = '".$_SESSION['student_id']."'");
	
	while($fetch_purchase_list = mysql_fetch_array($select_purchase_list))
	{
		?>
		  <tr>
			 <td>
			  <span class="name"><?php echo $fetch_purchase_list['book_name'] ?></span>
			 </td>
	  
			 <td>
			  <span class="name"><?php echo $fetch_purchase_list['payment_gross'] ?></span>
			 </td>
			<td>
			  <span class="name"><?php echo $fetch_purchase_list['book_title'] ?></span>
			</td>
			<td class="hidden-phone">
		   <span class="name">
		   
		   <?php
		$image_browse = $fetch_purchase_list['image_browse'];
		$array_img = explode('.',$image_browse);
		if(isset($array_img[1]))
		{
			?>
			<img src="images/e-library-book/<?php echo $fetch_purchase_list['image_browse']; ?>"/>
			<?php
		}
		else
		{
			?>
			<img src="images/no-image.jpg"/>
			<?php
		}
		
		?>
		   </span></td>
		   <td>
			  <span class="name"><span class="name">
			  <?php
			  if($fetch_purchase_list['satus'] == 'Completed')
			  {
				  ?>
				  <a target="_blank" href="images/e-library-book/<?php echo $fetch_purchase_list['file_browse'] ;?>">Download</a>
				  <?php
			  }
			  ?>
			  </span></span>
			</td>
			<td>
			  <span class="name"><span class="name"><?php echo $fetch_purchase_list['txn_id']; ?></span></span>
			</td>
			<td>
			  <span class="name"><span class="name"><?php echo $fetch_purchase_list['satus']; ?></span></span>
			</td>
		   <td>
			  <span class="name"><span class="name"><?php echo $fetch_purchase_list['date']; ?></span></span>
			</td>
			
		  </tr>
		  <?php
	}
	  ?>
	  
        
    </tbody>
  </table>
</div>


</div>

</div>
</div>

</div>
          		  
</div>          
</div>
        

           

            

            

            

 <div class="clearfix"></div>

   





				<div class="clear mb-50"></div>

				


			


            

            

       

            

            

            

            

            

            
<!--....................................footer start..............................-->
            

             <?php include "includes/footer.php" ?> 

          

			