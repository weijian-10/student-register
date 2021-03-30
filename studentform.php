<?php

require('db.php');


session_start();

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

 </tr>

    
    <?php
     $count=1;
    if(!isset($_GET['search']) || empty($_GET['search'])){
        $query="Select * from member inner join login on member.login_id=login.id where member.login_id='".$_SESSION['id']."'";
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
            
     </tr>
    
    <?php
     $count++;   }
    }
    
    ?>
    
  

</table>