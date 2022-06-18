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
				exam list
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
        				<th class="numeric">Date</th>
        				<th class="numeric">Apply</th>
        			</tr>
        		</thead>
        		<tbody>
					<?php
					$select_test = mysql_query("select `admin_test`.`id` as testid,`admin_test`.`testname`,`admin_test`.`date`,`admin_exam`.`examname` from `admin_exam` inner join `admin_test` on `admin_test`.`exam_id` = `admin_exam`.`id` order by `admin_exam`.`id` asc");
					$c= 1;
					While($fetch_test = mysql_fetch_array($select_test))
					{
						$select_result = mysql_query("select * from `admin_ques_ans` where `admin_ques_ans`.`user_id` ='".$id."' and `admin_ques_ans`.`test_id` ='".$fetch_test['testid']."'");
						$fetch_result = mysql_fetch_array($select_result);
						?>
						<tr>
							<td data-title="Sr.No."><?php echo $c; ?>.</td>
							<td data-title="Exam"><?php echo $fetch_test['examname']; ?></td>
							<td data-title="Test" class="numeric"><?php echo $fetch_test['testname']; ?></td>
							<td data-title="Date" class="numeric"><?php echo $fetch_test['date']; ?></td>
							<?php
							if($fetch_result[id] != "")
							{
								?>
								<td data-title="Applyed" class="numeric"><a class="btn">Applyed</a></td>
								<?php
							}
							else
							{
								?>
								<td data-title="Apply" class="numeric"><a class="btn" href="exam-sheet.php?id=<?php echo $fetch_test['testid']; ?>">Apply</a></td>
								<?php
							}								
							?>
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