<?php
include 'layout/head.php';



$member_id = $_GET['member_id'];

$remover= delete("DELETE  FROM membership_tb WHERE member_id='$member_id' ");

  if($remover){
    echo "<script>alert('Member Has Been Removed')
                window.location.href='manage_member.php'</script>";

  }

?>


<?php
include 'layout/foot.php';
?>
