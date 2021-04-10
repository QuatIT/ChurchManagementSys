<?php
session_start();
include 'assets/core/connection.php';
$churchID = $_SESSION['branch'];

$V2legy0yeeoo = $_GET['mtp'];

if($V2legy0yeeoo === 'Member'){

echo '<label>Member Name</label>';
        echo '<select class="form-control select2" data-placeholder="Select Member" name="member_name" required>';
//                echo '<option></option>';
                    $Vrtw3ai0kyg3 = select("SELECT * FROM membership_tb WHERE branch_id='$churchID'");
                    foreach($Vrtw3ai0kyg3 as $Vuqd2vrgwbtg){
                 echo '<option value="'.$Vuqd2vrgwbtg['full_name'].'"> '.$Vuqd2vrgwbtg['full_name'].'</option>';
                   }
        echo '</select>';

}elseif($V2legy0yeeoo === 'Visitor'){

    echo '<label>Visitor Name</label>
    <input type="text" name="member_name" class="form-control" placeholder="Enter Full Name" required>';

}else{

    echo '<div class="alert alert-dismissible alert-secondary">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Sorry!</strong> Select Member Type.
            </div>';
}

?>