<?php
if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != "")){
$get_admin_inbox_unread_mail = mysql_query("SELECT * FROM ".DTABLE_MAIL." WHERE mail_to='ADMIN' AND is_read=0") or die(mysql_error());
$get_admin_inbox_unread_mail_count = mysql_num_rows($get_admin_inbox_unread_mail);
?>
<div class="box box-solid">
<div class="box-header with-border">
<h3 class="box-title">Folders</h3>
<div class="box-tools">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
</div>
<div class="box-body no-padding">
<ul class="nav nav-pills nav-stacked">
<li><a href="list_message.php"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"><?php echo $get_admin_inbox_unread_mail_count; ?></span></a></li>
<li><a href="list_message_sent_admin.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
</ul>
</div><!-- /.box-body -->
</div>
<?php
}else{
$get_channel_inbox_unread_mail = mysql_query("SELECT * FROM ".DTABLE_MAIL." WHERE mail_to = '".$_SESSION['CLIENTS']['id']."' AND is_read=0") or die(mysql_error());
$get_channel_inbox_unread_mail_count = mysql_num_rows($get_channel_inbox_unread_mail);
?>
<div class="box box-solid">
<div class="box-header with-border">
<h3 class="box-title">Folders</h3>
<div class="box-tools">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
</div>
<div class="box-body no-padding">
<ul class="nav nav-pills nav-stacked">
<li><a href="list_message_channel.php"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"><?php echo $get_channel_inbox_unread_mail_count; ?></span></a></li>
<li><a href="list_message_sent_channel.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
</ul>
</div><!-- /.box-body -->
</div>
<?php	
}
?>