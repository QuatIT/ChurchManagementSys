<?php
include 'assets/core/connection.php';

$type = $_GET['it'];

//$V12ext3gtwse = select("SELECT * FROM account_tb WHERE account_id='$V1ghrtyc0rr3'");

if($type == 'file'){
    echo '<div class="form-group"><input type="file" accept=".pdf, .txt, .doc, .docx" class="form-control" name="file" required /></div>';

}

if($type == 'text'){
    echo '<div class="form-group"><textarea class="form-control" placeholder="Counselling Notes" name="notes" rows="5" required></textarea></div>';
}


if($type == 'both'){
    echo '<div class="form-group">
            <input type="file" accept=".pdf, .txt, .doc, .docx" class="form-control" name="file" required />
        </div>                            
        <div class="form-group">
              <textarea class="form-control" placeholder="Counselling Notes" name="notes" rows="5" required></textarea>
        </div>';
}


?>

