<?php
include 'layout/head.php';


$group_id = $_GET['group_id'];

  $ministry_delete = delete("DELETE FROM ministry_tb WHERE group_id='$group_id' ");


  if($ministry_delete){
    echo "<script>alert('Ministry Has Been Deleted')
                    window.location.href='manage_ministry.php'</script>";

  }



?>


<?php
include 'layout/foot.php';
?>
