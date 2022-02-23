<?php
include('../connection.php');
include('../header.php');
?>
<br>
<!-- view users to admin -->
<div class="container" align=center>
     <div class="row" style="border-bottom:solid;">
          <h3>User Details</h3>
</div><br>
<table class="table table-dynamic">
     <thead>
          <th>
               User Id
          </th>     
          <th>
              Name
          </th> 
          <th>
              Email
          </th>
          <th>
              Phone
          </th> 
          <th>
              Country
          </th> 
          <th>
              Action
          </th> 
</thead>
<tbody>           
<?php
$query = "SELECT * FROM traveluserdetails";
$result=$conn->query($query);
 if($result->num_rows>0){
	 while($row=$result->fetch_assoc())
	 {
?>
<tr>
     <td>
          <?php echo $row['UID'];?>
      </td>
      <td>
      <?php echo $row['FirstName']; echo('  '); echo($row['LastName']);?>
              </td>
          <td>
          <?php echo $row['Email'];?>
              </td>
          <td>
          <?php echo $row['Phone'];?>
              </td>
          <td>
          <?php echo $row['Country'];?>
              </td>
          <td>
              <!-- pass data throught request -->
               <form action="../edit.php" method="post">
              <button class="btn-success" style="border-radius:5px;"> Edit</button>
              <input type="hidden" name="UID" value="<?php echo $row['UID'];?>">
              <input type="hidden" name="firstname" value="<?php echo $row['FirstName'];?>">
              <input type="hidden" name="lastname" value="<?php echo $row['LastName'];?>">
              <input type="hidden" name="address" value="<?php echo $row['Address'];?>">
              <input type="hidden" name="city" value="<?php echo $row['City'];?>">
              <input type="hidden" name="region" value="<?php echo $row['Region'];?>">
              <input type="hidden" name="country" value="<?php echo $row['Country'];?>">
              <input type="hidden" name="postal" value="<?php echo $row['Postal'];?>">
              <input type="hidden" name="phone" value="<?php echo $row['Phone'];?>">
         
      </form>
          </td>
</tr>   
     </div>
<?php
     }
}
?>
     </tbody>
</table>
<?php
include("../footer.php");
?>