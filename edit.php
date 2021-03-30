<?php
require('db.php');
require('auth.php');
$id=$_REQUEST['id'];
$query="Select * from member where id=$id";
$result=mysqli_query($db,$query) or die(mysqli_error($db));;
$row=mysqli_fetch_array($result);

?>

<?php
 if(isset($_POST['submit'])){
     $id=$_GET['id'];
     $name=$_POST['name'];
     $ic=$_POST['ic'];
     $address=$_POST['address'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];
     $gender=$_POST['gender'];
     $marital_status=$_POST['marital_status'];
     
     $query_upt="UPDATE `member` SET `name` = '$name', `ic` = '$ic', `address` = '$address', `phone` = '$phone', `email` = '$email', `gender` = '$gender', `marital_status` = '$marital_status' WHERE `id` = $id";
     
     $result_upt=mysqli_query($db,$query_upt) or die(mysqli_error($db));
     
     
      
     
     
     echo"<script>alert('update success');
     window.location='view.php'
     </script>";
     
 }

?>

<form method="post">
 name<input type="text" name="name" placeholder="Enter Your name" required value="<?php echo $row['name']; ?>" > <br><br>
ic <input type="text" name="ic" placeholder="Enter Your ic" required value="<?php echo $row['ic']; ?>" > <br><br>
 address<input type="text" name="address" placeholder="Enter Your address" required value="<?php echo $row['address']; ?>" > <br><br>
 phone<input type="text" name="phone" placeholder="Enter Your phone" required value="<?php echo $row['phone']; ?>" > <br><br>
 email<input type="text" name="email" placeholder="Enter Your email" required value="<?php echo $row['email']; ?>" >  <br><br>
 gender<select name="gender"><br><br>
      
    <?php
    
                         
        echo '<option  value="'.$row['id'].'">  '.$row['gender'].'</option>'; 
        echo '<option value="female">female</option>';
        echo '<option value="male">male</option>';
    
 
    
    
    ?>

        
    
 </select><br><br>
  
marital_status<select name="marital_status"><br><br>
    <option value="single">single</option>
    <option value="married">married</option>
        
    
 </select><br><br>
 <input type="submit" name="submit" value="Edit">

</form>