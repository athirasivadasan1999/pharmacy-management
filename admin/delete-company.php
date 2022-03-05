<?php
include('includes/dbconnection.php');
$id = $_GET['delid'];
$query=mysqli_query($con, "delete from tblcompany where ID='$id'");
    if ($query) {
    $msg="Company has been updated.";
    header("Location:http://localhost/pms/admin/manage-company.php");
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
?>