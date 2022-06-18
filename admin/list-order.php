<?php 
include('includes/admin_top.php');
$msg ="";
$page_title = 'List Order'; 

?>  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- Main Header -->
<?php include('includes/admin_header.php'); ?>  
<!-- Left side column. contains the logo and sidebar -->
<?php include('includes/admin_sidebar.php'); ?>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1><?php echo $page_title; ?></h1>
</section>
<section class="content">
<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>
<div class="box box-info">
<!-- form start -->
<div class="box-body">
<table id="example1" class="table table-bordered table-striped tableGrid">
<thead>
<tr>
<th>Firstname</th>
<th>Email</th>
<th>Amount</th>
<th>Status</th>
<th>Txnid</th>
<th>Productinfo</th>
<th>Date</th>


</tr>
</thead>
<tbody>
<?php 
$sql = "SELECT * FROM ".DTABLE_ORDER." ORDER BY id DESC";
$res = $db->selectData($sql);
while($row_rec = $db->getRow($res)){
?>
<tr>
<td><?php echo $row_rec['firstname']." ".$row_rec['lastname']; ?></td>
<td><?php echo $row_rec['email']; ?></td>
<td><?php echo $row_rec['amount']; ?></td>
<td><?php echo $row_rec['status']; ?></td>
<td><?php echo $row_rec['txnid']; ?></td>
<td><?php echo $row_rec['productinfo']; ?></td>
<td><?php echo $row_rec['date']; ?></td>

</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 