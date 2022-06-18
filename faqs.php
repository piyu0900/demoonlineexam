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
				FAQ's
			</h1>

        <ul class="my-toggle">
		
			
		<?php 
		$sql = "SELECT * FROM ".DTABLE_FAQ." ORDER BY id DESC";
		$res = $db->selectData($sql);
		while($row_rec = $db->getRow($res))
		{
			?>
            <li>
                <a class="view">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="toggle-title"><?php echo $row_rec['question']; ?></h3>
                        </div>
                    </div>
                </a>
                <div class="detail">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="toggle-wrapper">
                                <?php echo $row_rec['answer']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
			<?php
		}
		?>
			
            
           
				
				
				
				
            
        </ul>
	</div>
</div> 


<?php
include('footer.php');
?>



