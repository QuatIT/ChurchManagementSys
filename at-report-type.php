<?php
session_start();
include 'assets/core/connection.php';
$churchID = $_SESSION['branch'];

$V2legy0yeeoo = $_GET['rt'];

if($V2legy0yeeoo === 'service'){

//echo '<label>Member Name</label>';
        echo '<select class="form-control select2" data-placeholder="Select Service" name="service_name" required>';
//                echo '<option></option>';
                    $Vrtw3ai0kyg3 = select("SELECT * FROM service_tb WHERE branch_id='$churchID'");
                    foreach($Vrtw3ai0kyg3 as $Vuqd2vrgwbtg){
                 echo '<option value="'.$Vuqd2vrgwbtg['service_id'].'"> '.$Vuqd2vrgwbtg['service_name'].'</option>';
                   }
        echo '</select>';

}elseif($V2legy0yeeoo === 'date'){

        echo '<input type="date" name="date" class="form-control" placeholder="Select Date" required>';

}elseif($V2legy0yeeoo === 'daterange'){
    
       echo'<div class="row">
            <div class="col-md-6"><input type="date" name="datefrom" class="form-control" placeholder="Select Date" required></div>
            <div class="col-md-6"><input type="date" name="dateto" class="form-control" placeholder="Select Date" required></div>
            </div>';
}

?>