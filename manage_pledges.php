<?php
include 'layout/head.php';
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h4>MANAGE PLEDGES</h4><hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Pledge ID</th>
                        <th>Member Name</th>
                        <th> Amount</th>
                        <th> Status</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $m_pledge= select("SELECT * FROM pledge_tb");

                    foreach($m_pledge as $m_pledges){

                        if($m_pledges['pledge_status'] == 'Pledged'){
                            $btnstate = 'btn-warning';
                        }else{
                            $btnstate = 'btn-primary';
                        }

                       echo "<tr>
                        <td>".$m_pledges['pledge_id']."</td>

                        <td>".$m_pledges['member_name']."</td>
                        <td>".$m_pledges['amount']."</td>
                        <td><span class='btn $btnstate btn-sm btn-round disabled'>".$m_pledges['pledge_status']."</span></td>
                        <td>
                            <a href='edit_pledge.php?pid=".$m_pledges['pledge_id']."' class='btn btn-primary' title='Update Ministry'>
                                <i class='fa fa-edit'></i>
                            </a>
                        </td>
                    </tr>";
                }   ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
