<?php
require('auth.php');
require('db.php');

?>
<form method="post">
 <input type="text" name="name" placeholder="Enter Your name" required> <br><br>
 <input type="text" name="password" placeholder="Enter Your password" required> <br><br>
 <input type="text" name="ic" placeholder="Enter Your ic" required><br><br>
 <input type="text" name="address" placeholder="Enter Your address" required><br><br>
 <input type="text" name="phone" placeholder="Enter Your phone" required><br><br>
 <input type="text" name="email" placeholder="Enter Your email" required><br><br>
 <select name="gender"><br><br>
    <option value="Male">Male</option>
    <option value="Woman">Woman</option>
        
    
 </select><br><br>
  
<select name="marital_status"><br><br>
    <option value="single">single</option>
    <option value="married">married</option>
        
    
 </select><br><br>
 <input type="submit" name="submit" value="Regsiter">

</form>

<?php
 if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $password=$_POST['password'];
     $ic=$_POST['ic'];
     $address=$_POST['address'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];
     $gender=$_POST['gender'];
     $marital_status=$_POST['marital_status'];
     
     $query="Insert into login(username,password,status) values('$name','$password','1')";
     $result=mysqli_query($db,$query)or die(mysqli_error($db));
     $lastid=mysqli_insert_id($db);
     
      $query1="Insert into member(name,ic,address,phone,email,gender,marital_status,login_id)values('$name','$ic','$address','$phone','$email','$gender','$marital_status','$lastid')";
     $result1=mysqli_query($db,$query1) or die(mysqli_error($db));
     echo"<script>alert('Insert success')
     window.location='dashboard.php'
     </script>";
     
 }

?>

