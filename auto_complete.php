 <?php
include('assets/core/connection.php');

$term=$_GET["term"];

//$query= new Complete;
$result = query("SELECT * FROM membership_tb WHERE full_name like '%".$term."%' OR word='$term' Limit 5");
$json=array();

foreach($result as $complete){
     $json[]=array(
                'value'=> $complete["word"],
    );
}

echo json_encode($json);
?>
