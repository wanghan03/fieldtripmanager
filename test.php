<!--form action="https://mistar.oakland.k12.mi.us/novi/StudentPortal/Home/Login" method="post">
<input type=text name=Pin>
<input type=password name=Password>
<input type=submit id=LoginButton>
</form-->
<?php
require_once 'classes/mysql.php';
$mysql = new mysql();
$result = $mysql->get_specifictrip(2);
echo $result[destination];
?>