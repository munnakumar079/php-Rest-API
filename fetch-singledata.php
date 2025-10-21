<?php 

header('Content_Type:application/json');
header('Acess-Control-Allow-Origin: *');

$sdata=json_decode(file_get_contents('php://input'), true);

$std_id = $sdata['sid'];

include('db-connection.php');

$data = "SELECT * FROM student WHERE id = {$std_id}";

$result =mysqli_query($con, $data) or die('query faild');

if(mysqli_num_rows($result)>0)
{
    $output = mysqli_fetch_all($result , MYSQLI_ASSOC);

    echo json_encode($output);
}
else
{
    echo json_encode(['message'=> 'Data Not found']);
}

?>