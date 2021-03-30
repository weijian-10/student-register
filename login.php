<?php
require('db.php');
session_start();
?>
<form method="post">


<input type="text" name="username" placeholder="username">
<input type="text" name="password" placeholder="password">
<input type="submit" name="submit" value="Login">

</form>
<!--     -->

<?php

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="Select * from login where username='$username' and password='$password'";
    $result=mysqli_query($db,$query) or die(mysqli_error($db));
    $row=mysqli_num_rows($result);
    $status=mysqli_fetch_array($result);
    $_SESSION['status']=$status['status'];
    $_SESSION['id']=$status['id'];
    
    if($row==1){
        if($_SESSION['status']==0){
        $_SESSION['username']=$username;
        echo"<script>alert('login success');
        window.location='dashboard.php'
        </script>";
    }
      elseif($_SESSION['status']==1){
        $_SESSION['username']=$username;
        echo"<script>alert('login success');
        window.location='studentform.php'
        </script>";
    }
        
        
        
        
    else{
        echo "<script>alert('Input wrong passwod or username')
        window.location='login.php'
        </script>";
    }
}
}

?>