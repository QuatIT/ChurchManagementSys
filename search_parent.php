 <?php
//include('assets/core/connection.php');
$con = mysqli_connect('localhost','root','','church_sys');
  $term=$_GET["term"];

 $query=mysqli_query($con,"SELECT * FROM membership_tb WHERE full_name like '%".$term."%' ");
 $json=array();

   foreach($query as $proj){
         $json[]=array(
                    'value'=> $proj["full_name"],

                        );
    }

 echo json_encode($json);

?>
