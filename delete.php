<?php
require('db.php');
$id=$_REQUEST['id'];
$query="DELETE from member where id='$id'";
$result=mysqli_query($db,$query)or die(mysqli_error($db));


 echo"<script>alert('delete success');
     window.location='view.php'
     </script>";
     

?>



<!--$query="delete member,login from member inner join login on member.login_id=login.id where member.login_id=ji hao " -->
