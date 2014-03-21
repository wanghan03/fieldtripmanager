<?php
//$mysql->delete_trip($_GET['date'],$_GET['destination'],$_GET['start'],$_GET['end']);
$detail = '<h4>'.$_GET['date'].'</h4><p>'.$_GET['destination'].' ('.$_GET['start'].' - '.$_GET['end'].')<br>Class/Hour: '.$_GET['class'].'</p>';

?>
<center><h1><span>My Field Trips</span></h1></center>
<div id="list">
<h4 style="color:red">The following trip has been successfully deleted:<h4>
<?php echo $detail ?>
<br>
<form method=post action="?page=fieldtrip"><center><input type=submit value="Back to &quot;My Field Trips&quot;"></center></form>
</div>