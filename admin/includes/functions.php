<!-- query to add the values into the sub table $sql="INSERT INTO `sub` (`id`, `sem-id`, `sub-name`, `sub-code`) VALUES (NULL, '90', 'Automata Theory', '18cs43'); -->


<?php
function connection($sql)
{
    $server = "localhost";
    $usn = "root";
    $password = "";
    $con = mysqli_connect($server, $usn, $password, "published");
    $result = mysqli_query($con, $sql);
    if ($result) {
    } else {
        "not connected";
    }
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
function get_by_id($id)
{
    $query = "SELECT * FROM cat where id='$id'";
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
        $add = connection($sql);
        if ($add) {
            get_redirect("products.php");
        } else {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Successfully Addedd the data</strong> 
              </div>";
        }
    }
}


function delete()
{
    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
        $sql = "DELETE FROM `cat` WHERE `id` = $sno";
    }
}




function delete_item()
{
    if (isset($_GET['delete'])) {
        $page = 'products.php';
        $itemID = $_GET['delete'];
        $delete = "DELETE FROM cat WHERE  id ='$itemID'";
        $result = connection($delete);
        if ($result) {
            echo "succes";
        } else {
            get_redirect("products.php");
        }
    }
}
// if(isset($_GET['delete'])){
// $page = 'products.php';

// if($_GET['delete'])
//    {
//     deletebooking($orderID,$page);

//    }  

// function deletebooking($orderID,$page){
//       $orderID=$_GET['delete'];
//     $sql="DELETE FROM cat WHERE id='".$orderID."'";
//     $result=connection($sql) or die("oopsy, error when tryin to delete events 2");
//     get_redirect($page);
//  }
// }

function edit($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['edit'])) {
            $title = $_POST["cat_name"];
            $description = $_POST["cat_desc"];
            $sql = "UPDATE `cat` SET `cat_name` = '$title' , `cat_desc` = '$description' WHERE `cat`.`id` = $id";
            $result = connection($sql);
            if ($result) {
                "success";
            } else {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Successfully Edites the data</strong> 
              </div>";
            }
        }
    }
}

//from this semester details table  is start

function sem_add()
{
    if (isset($_POST['add_sem'])) {

        $sem_num = $_POST['sem_num'];
        $cat_id = $_POST['cat_id'];
        $sql = "INSERT INTO `sem` (`sem-num`, `cat_id`) VALUES (' $sem_num', ' $cat_id')  ";
        echo $sql;
        $add = connection($sql);
        if ($add) {
        } else {
            get_redirect("semester.php");
        }
    }
}

// function add_sem(){
//     if (isset($_POST['add_sem'])) {
//         $sem_nuum = $_POST['sem_num'];
//           $cat_id = $_POST['cat_id'];
//        $sql= "INSERT INTO `sem` (`sem-num`, `cat_id`) VALUES ('$sem_nuum', '$cat_id')";
//          $add = connection($sql);
//         if ($add) {
//             get_redirect("semester.php");
//         } else {
//             echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//                 <strong>Successfully Addedd the data</strong> 
//               </div>";
//         }
//     }

// }

// for displaying all the values
function sem_display()
{
    $query = "SELECT * FROM `sem`";
    $data = query($query);
    return $data;
}

// sem-edit function start from here

function sem_edit($id)
{
    if (isset($_POST['edit'])) {
        $sem_nuum = $_POST["doc_ds"];
        $cat_id = $_POST["cat_id"];
        $sql = "UPDATE `sem` SET `id` = '85', `sem-num` = '$sem_nuum', `cat_id` = '$cat_id' WHERE `sem`.`id` = $id";
        echo $sql;
        $result = connection($sql);
        if ($result) {
            "success";
        } else {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Successfully Edites the data</strong> 
              </div>";
        }
    }
}

// getting the cat_name and id from cat table function start from here

function cat_name_id()
{
    $sql = "SELECT id,cat_name from cat   ";
    // echo $sql;

    $semdata = query($sql);
    return $semdata;
}
// getting the data  form sem table
function sem_get_by_id($id)
{
    $query = "SELECT * FROM sem where id='$id'";
    $data = query($query);
    return $data;
}

//new

function get_cat_by_id($id){
    $sql="select  cat_name from cat  where id='$id'";
    $data = query($sql);
    return $data;
}


function delete_sem()
{
    if (isset($_GET['delete'])) {
        // $page = 'semester.php';
        $itemID = $_GET['delete'];
        $delete = "DELETE FROM sem WHERE  id ='$itemID'";
        $result = connection($delete);
        if ($result) {
            echo "succes";
        } else {
            get_redirect("semester.php");
        }
    }
}

function search_sem()
{
    $search = $_GET['search'];
    // $search='civil';
    // echo $search;
    // $sql = "SELECT * FROM `cat` where match(cat_name,cat_desc)against('%$search%')";
    $sql = "SELECT * FROM `sem` WHERE  `sem-num` = $search";
    // echo $sql;
    $data = query($sql);
    return $data;
}


//from below doc.php logic is started 

function doc_display()
{
    $query = "SELECT * FROM `doc`";
    $data = query($query);
    return $data;
}
//adding the document in the database
function doc_add()
{
    if (isset($_POST['add_doc'])) {

        $doc_desc = $_POST['doc_desc'];
        $sub_id = $_POST['sub_id'];
        if (isset($_FILES['pdf_file']['name'])) {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            print_r($file_name);
            move_uploaded_file($file_tmp, "./pdf/" . $file_name);

            $sql = "INSERT INTO `doc` (`id`, `sub-id`, `doc-name`, `doc-desc`) VALUES (NULL, '$sub_id', '$file_name', '$doc_desc')";
            echo $sql;
            $iquery = connection($sql);
        } else {
?>
            <div class="alert alert-danger alert-dismissible
        fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Failed!</strong>
                File must be uploaded in PDF format!
            </div>
<?php
        }
    }
}

function sub_name_id()
{


    $sql = "SELECT `id`,`sub-name` from sub";
    // echo $sql;
    $docdata = query($sql);
    return $docdata;
}

// search bar for the document 

function search_doc(){
    $search = $_GET['search'];
    // $search='civil';
    // echo $search;
    // $sql = "SELECT * FROM `cat` where match(cat_name,cat_desc)against('%$search%')";
    $sql = "SELECT * FROM `doc` WHERE `doc-name`='$search'";
    // echo $sql;
    $data = query($sql);
    return $data;
}

// this function is for deleting the document

// DELETE FROM `doc` WHERE `doc`.`id` = 11;

function delete_doc()
{
    if (isset($_GET['delete'])) {
        $page = 'doc.php';
        $itemID = $_GET['delete'];
        $delete = " DELETE FROM `doc` WHERE `doc`.`id` = $itemID;";
        $result = connection($delete);
        if ($result) {
           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Successfully Edites the data</strong> 
          </div>";
        } else {
            get_redirect("doc.php");
        }
    }
}


//this is for the editing  section for the doc.php
function doc_edit($id)
{
    if (isset($_POST['edit'])) {

        $doc_desc = $_POST['doc_desc'];
        $sub_id = $_POST['sub_id'];
        if (isset($_FILES['pdf_file']['name'])) {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            print_r($file_name);
            move_uploaded_file($file_tmp, "./pdf/" . $file_name);

            $sql = "UPDATE `doc` SET `sub-id` = '$sub_id', `doc-name` = '$file_name', `doc-desc` = '$doc_desc WHERE `doc`.`id` = $id";
            echo $sql;
            $iquery = connection($sql);
        } else {
?>
            <div class="alert alert-danger alert-dismissible
        fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Failed!</strong>
                File must be uploaded in PDF format!
            </div>
<?php
        }
    }
}
function doc_get_by_id($id)
{
    $query = "SELECT * FROM doc where id='$id'";
    $data = query($query);
    return $data;
}
// function doc_edit($id)
// {
//     if (isset($_POST['edit'])) {
//         $sem_nuum = $_POST["sem_num"];
//         $cat_id = $_POST["cat_id"];
//         $sql = "UPDATE `sem` SET `id` = '85', `sem-num` = '$sem_nuum', `cat_id` = '$cat_id' WHERE `sem`.`id` = $id";
//         echo $sql;
//         $result = connection($sql);
//         if ($result) {
//             "success";
//         } else {
//             echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
//                 <strong>Successfully Edites the data</strong> 
//               </div>";
//         }
//     }
// }





//this  section for the subject 
// 1 show or display the data
function sub_display()
{
    $query = "SELECT * FROM `sub`";
    $data = query($query);
    return $data;
}

//selecting sem-id and sem number from the semester tabale

function sem_name_id()
{

    $sql = "SELECT `id`,`sem-num`,`cat_id` from sem";
    // echo $sql;
    $docdata = query($sql);
    return $docdata;
}
//adding the subject details into the table

function sub_add()
{
    if (isset($_POST['add_sub'])) {

        $sem_id = $_POST['sem-id'];
         $sub_name = $_POST['sub-name'];
        $sub_code = $_POST['sub-code'];
        $sql = "INSERT INTO `sub` (`sem-id`, `sub-name`, `sub-code`) VALUES ('$sem_id', '$sub_name', '$sub_code')";
        echo $sql;
        $add = connection($sql);
        if ($add) {
            echo "not inserted";
        } else {
            get_redirect("sub.php");
        }
    }
}

// below is the deleting functionality of sub.php
function delete_sub()
{
    if (isset($_GET['delete'])) {
        $page = 'sub.php';
        $itemID = $_GET['delete'];
        $delete = " DELETE FROM `sub` WHERE `sub`.`id` = $itemID;";
        $result = connection($delete);
        if ($result) {
           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Successfully Edites the data</strong> 
          </div>";
        } else {
            get_redirect("sub.php");
        }
    }
}

// below is the search bar functionality
function search_sub()
{
    $search = $_GET['search'];
    // $sql = "SELECT * FROM `cat` where match(cat_name,cat_desc)against('%$search%')";
    $sql = "SELECT * FROM `sub` WHERE `sub-name` = '$search' ";
    $data = query($sql);
    return $data;
}
// below is the editing section for the sub functionality

function sub_edit($id)
{
    if (isset($_POST['edit_sub'])) {
        if (isset($_POST['edit_sub'])) {
            $sem_id = $_POST['sem-id'];
         $sub_name = $_POST['sub-name'];
        $sub_code = $_POST['sub-code'];
            $sql = "UPDATE `sub` SET `sem-id` = '$sem_id', `sub-name` = '$sub_name', `sub-code` = '$sub_code' WHERE `sub`.`id` = $id";
            $result = connection($sql);
            if ($result) {
                "success";
            } else {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Successfully Edites the data</strong> 
              </div>";
            }
        }
    }
}
// get the id of the sub table
function sub_get_by_id($id)
{
    $query = "SELECT * FROM sub where id='$id'";
    $data = query($query);
    return $data;
}
// login functionality for admin
