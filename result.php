<?php
include('header.php');

if(empty($_SESSION["firstname"]))
{
	header('Location: subscribe.php');
}
$id = $_SESSION['id'];
?>



   <div class="all-page-slide space-top">
   <img src="img/all-page-slide.jpg">

    </div>

<section>    				
	<div class="container">
		<div class="row">
			<h1 class="main-title">
				Result list
			</h1>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<div class="dashboard-grid">
			
		<?php
		include('sidebar.php');
		?>
			
		<div class="col-sm-8">
				
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>Sr.No.</th>
        				<th>Exam</th>
        				<th class="numeric">Test</th>
        				<th class="numeric">Total</th>
        				<th class="numeric">Result</th>
        				<th class="numeric">Date</th>
        			</tr>
        		</thead>
        		<tbody>
					<?php
					$select_test = mysql_query("select `admin_test`.`testname`,`admin_exam`.`examname`,`admin_user_result`.`total_marks`,`admin_user_result`.`result`,`admin_user_result`.`date` from `admin_user_result` inner join `admin_test` on `admin_user_result`.`test_id` = `admin_test`.`id` inner join `admin_exam` on `admin_test`.`exam_id` = `admin_exam`.`id` where `admin_user_result`.`user_id` ='".$id."'");
					$c= 1;
					While($fetch_test = mysql_fetch_array($select_test))
					{
						?>
						<tr>
							<td data-title="Sr.No."><?php echo $c; ?>.</td>
							<td data-title="Exam"><?php echo $fetch_test['examname']; ?></td>
							<td data-title="Test" class="numeric"><?php echo $fetch_test['testname']; ?></td>
							<td data-title="Total" class="numeric"><?php echo $fetch_test['total_marks']; ?></td>
							<td data-title="Result" class="numeric"><?php echo $fetch_test['result']; ?></td>
							<td data-title="Date" class="numeric"><?php echo $fetch_test['date']; ?></td>
						</tr>
						<?php
						$c++;
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
</section>



<?php
include('footer.php');

?>