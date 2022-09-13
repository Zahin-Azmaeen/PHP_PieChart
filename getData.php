<?php
// MySQL database connection code
$connection = mysqli_connect("localhost", "root", "", "mydb") or die("Error " . mysqli_error($connection));
//Fetch sports data
$sql = "SELECT * FROM sports";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $orgname = $row['sports'];
    $count = $row['participants'];
    $array['cols'][] = array('type' => 'string');
    $array['rows'][] = array('c' => array(array('v' => $orgname), array('v' => (int)$count)));
}
$data = json_encode($array);
echo $data;
