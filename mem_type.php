<?php
include 'assets/core/connection.php';

$mtp = $_GET['mtp'];
//echo "<script>alert('{$q}')</script>";
//exit;

if($mtp === 'Member'){

    echo '<label>Member Name</label>';
            echo '<select class="form-control" name="member_name" >';
                echo '<option> -- Select Member -- </option>';
                        $me_sql = select("SELECT * FROM membership_tb");
                        foreach($me_sql as $me_row){
                     echo '<option value="'.$me_row['full_name'].'"> '.$me_row['full_name'].'</option>';
                       }
            echo '</select>';

}elseif($mtp === 'Visitor'){

        echo '<label>Visitor Name</label>
        <input type="text" name="member_name" class="form-control" placeholder="Enter Full Name" required>';

}else{

        echo '<div class="alert alert-dismissible alert-secondary">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Sorry!</strong> Select Member Type.
                </div>';
}

?>
