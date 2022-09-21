<?php





// if(!$con){
//     die("Connection to this database failed due to" . mysqli_connect_error());
// }



function query($query)
{

    $server = "localhost";

$usn = "root";
$password = "";
    $con = mysqli_connect($server, $usn, $password, "published");
    $run = mysqli_query($con, $query);
    if ($run) {
        while ($row = $run->fetch_assoc()) {
            $data[] = $row;
        }
        if (!empty($data)) {
            return $data;
        } else {
            return "";
        }
    } else {
        return 0;
    }
}
function get_cat(){
    $query = "SELECT * FROM cat";
    $data=query($query);
    return $data;
}
function get_sem(){
    $id = $_GET['cat_id'];
    $query = "SELECT * FROM sem WHERE cat_id = $id ";
    $data=query($query);
    return $data;
}
?>