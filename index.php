<?php 
require_once("includes/header.php");
include_once("includes/notice.php");


$containers = new CategoryContainers($con);
echo $containers->showAllCategories();

include("includes/footer.php");
?>



