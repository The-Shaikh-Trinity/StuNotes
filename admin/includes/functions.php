<?php
  $server = "localhost";
  $usn = "root";
  $password = "";
  $con = mysqli_connect($server, $usn, $password, "published");
  $sql= "DELETE FROM `cat` WHERE `cat`.`id` = 46";
  $result = mysqli_query($con, $sql);
  if($result){
    echo "succes";

  }else{
    echo "somting is wrong";
  }


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

// this function is used  for the display the data in the admin table

function display()
{
    $query = "SELECT * FROM cat";
    $data = query($query);
    return $data;
}

// this function is used  for the searching
function search()
{
    $search = $_GET['search'];
    // $search='civil';
    $sql = "SELECT * FROM `cat` where match(cat_name,cat_desc)against('%$search%')";
    $data = query($sql);
    return $data;
}

function post_redirect($url)
{
    ob_start();
    header('Location: ' . $url);
    ob_end_flush();
    die();
}
function get_redirect($url)
{
    echo " <script> 
    window.location.href = '$url'; 
    </script>";
}
function add()
{
    if (isset($_POST['add_item'])) {
        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];
        $sql = "INSERT INTO `cat` ( `cat_name`, `cat_desc`) VALUES ('$cat_name', '$cat_desc')";

        $server = "localhost";
        $usn = "root";
        $password = "";
        $con = mysqli_connect($server, $usn, $password, "published");
        $result = mysqli_query($con, $sql);
 
        get_redirect("products.php");
    }

}


function delete(){
  
    $sno=$_GET['delete'];

}
