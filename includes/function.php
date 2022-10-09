<?php
$con = mysqli_connect("localhost", "root", "", "published");
function query($query)
{


    global $con;
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
function get_cat()
{
    $query = "SELECT * FROM cat";
    $data = query($query);
    return $data;
}
function get_sem()
{
    $id = $_GET['cat_id'];
    $query = "SELECT * FROM sem WHERE cat_id = $id ";
    $data = query($query);
    return $data;
}
function get_sub($id)
{
    $query = "SELECT * FROM sub WHERE sem_id = $id";
    $res = query($query);
    return $res;
}
function get_doc($id)
{
    $query = "SELECT * FROM doc WHERE sub_id = $id";
    $res = query($query);
    return $res;
}
