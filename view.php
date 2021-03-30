<?php
require('db.php');
require('auth.php');
?>

<style>

    a{
        text-decoration: none;
    }
    td{
        text-align: center;
    }
</style>
<a href="logout.php" style="float:right">Logout</a><br>
<form method="get">
  <input type="text" name="search" placeholder="Enter Your name">
   <input type="submit" name="btnsearch" value="Search">
</form>

<table border="1" style="width:100%;border-collapse:collapse">

 <tr>
    <th>ID</th>
    <th>Name</th>
    <th>IC</th>
    <th>address</th>
    <th>phone</th>
    <th>email</th>
    <th>gender</th>
    <th>Marital_status</th>
    <th>Edit</th>
    <th>Delete</th>
 </tr>

    
    <?php
     $count=1;
    if(!isset($_GET['search']) || empty($_GET['search'])){
        $query="Select * from member order by id desc";
        $result=mysqli_query($db,$query) or die(mysqli_error($db));
        while($row=mysqli_fetch_array($result)){
    ?>
     <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['name']; ?></td> 
            <td><?php echo $row['ic'] ;?></td> 
            <td><?php echo $row['address'] ;?></td> 
            <td><?php echo $row['phone'] ;?></td> 
            <td><?php echo $row['email'] ;?></td> 
            <td><?php echo $row['gender'] ;?></td> 
            <td><?php echo $row['marital_status'] ;?></td> 
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>">delete</a></td>
    
     </tr>
    
    <?php
     $count++;   }
    }
    
    ?>
    
    <?php
             $count=1;
             if(isset($_GET['btnsearch'])){
                 $textbox=$_GET['search'];
                 if(strlen($textbox)>1){
                     $query1="select * from member where name like '%".$textbox."%' or ic like '%".$textbox."%'" ;
                     $result1=mysqli_query($db,$query1) or die(mysqli_error($db));
                     
                     if(mysqli_num_rows($result1)==1){
                         while($rows=mysqli_fetch_array($result1)){
     ?>
    <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $rows['name']; ?></td> 
            <td><?php echo $rows['ic'] ;?></td> 
            <td><?php echo $rows['address'] ;?></td> 
            <td><?php echo $rows['phone'] ;?></td> 
            <td><?php echo $rows['email'] ;?></td> 
            <td><?php echo $rows['gender'] ;?></td> 
            <td><?php echo $rows['marital_status'] ;?></td> 
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>">delete</a></td>
    
     </tr>
    
    <?php
               $count++; }
            }
            else{
                echo "No result";
            }
        }
    }
    ?>

</table>