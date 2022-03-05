<?php
include('includes/dbconnection.php');
$id = $_GET['deleteid'];
$query=mysqli_query($con, "delete from tblmedicine where ID='$id'");
    if ($query) {
    $msg="Company has been updated.";
    header("Location:http://localhost/pms/admin/manage-medicine.php");
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
?>