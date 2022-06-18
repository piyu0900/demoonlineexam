<?php
include('header.php');

?>



   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

	
<section>    				
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				Schedule
			</h1>
			<div class="col-sm-12">
			<table id="miyazaki">
<thead>
<tr><th>TEST NAME</th><th>SYLLABUS</th><th>DATE</th></tr>
<tbody>

<?php 
$select_test = mysql_query("select * from `admin_test` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id`");
While($fetch_test = mysql_fetch_array($select_test))
{
	?>
	<tr>
	<td class="text-text"><?php echo $fetch_test['testname']; ?> <?php echo $fetch_test['examname']; ?></td>
	<td class="whitetd">
	<p><?php echo $fetch_test['syllabus']; ?></p>

	</td>
	<td class="day-year"><p><?php echo $fetch_test['date']; ?></p></td>
	</tr>
	<?php 
}
?>






</table>
			</div>		

			
		</div>
	</div>
</section>






<?php
include('footer.php');

?>