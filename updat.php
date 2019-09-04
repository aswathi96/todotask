<?php
include("connection.php");
$id=$_GET["id"];
echo $id;
$sql = "UPDATE todo SET checked=0,date=CURRENT_TIME WHERE id=$id";
mysqli_query($connect,$sql);

?>
<script type="text/javascript" >
window.location.href="task2.php";
</script>
