<?php
include "includes/head.php";
?>

<body>
    <?php
    include "includes/header.php";
    include "includes/functions.php";
    ?>


    <?php
    include "includes/sidebar.php";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <br>
                    <?php
                    $edited = false;
                    if ($edited) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Result not found</strong> 
                      </div>";
                    }
                    ?>
                    <h2><Strong>Semester Details</Strong></h2>
                    <br>
                </div>

                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="semester.php">
                        <input class="form-control me-2 col" type="search" name="search" placeholder="Enter Semester Number" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="searching" value="search">Search</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <!-- this section is for the adding the details -->
        <?php
        sem_edit($_SESSION['id']);
        // Each update button sends the id as a GET request (it is requesting information,
        //  not changing information, so use GET), in the form of an ordinary link, 
        //  which the php script uses to populate the edit form.
        if (isset($_GET['edit'])) {
            $_SESSION['id']=$_GET['edit'];
            $data_sem=sem_get_by_id($_GET['edit'])

        ?>
            <h2>Edit Semester Details</h2>
            <form action="semester.php" method="POST">
                <div class=" form-group mb-3">
                    <label>Semester Number</label>
                    <input id="sem_num" type="text" class="form-control" value=" <?php echo $data_sem['0']['sem-num'] ?>"   name="sem_num">
                    <div class="form-text"> </div>
                </div>
                <?php
                $data = cat_name_id();
                $num = sizeof($data);
                ?>
                <select name="cat_id" id="cat_id">
                    <?php

                    for ($i = 0; $i < $num; $i++) {
                    ?>
                        <option value="<?php echo $data[$i]['id'] ?>"><?php echo $data[$i]['id'] ?><?php echo $data[$i]['cat_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <button type="submit" id="edit" class="btn btn-outline-primary" value="update" name="edit">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                <br> <br>
            </form>
            <br>
        <?php
        }

        ?>

        <?php
        // <!-- this section is for the adding the details -->
        sem_add();
        // $data = cat_name_id($_SESSION['id']);
        if (isset($_GET['add'])) {
            // $data = cat_name_id();
            // $num = sizeof($data);
            // for ($i = 0; $i < $num; $i++) {
        ?>
            <h2>Add Product</h2>
            <form action="semester.php" method="POST">
                <div class=" form-group mb-3">
                    <label>Semester number</label>
                    <input id="sem_num" type="text" class="form-control" placeholder="product name" name="sem_num">
                    <div class="form-text">please enter the product name in range(1-25) character/s , special character not allowed !</div>
                </div>
                <!-- in the below we have dropdown -->
                <?php
                $data = cat_name_id();
                $num = sizeof($data);
                ?>
                <select name="cat_id" id="cat_id">
                    <?php

                    for ($i = 0; $i < $num; $i++) {
                    ?>
                        <option value="<?php echo $data[$i]['id'] ?>"><?php echo $data[$i]['id'] ?><?php echo $data[$i]['cat_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>


                <!-- til here  -->
                <button type="submit" class="btn btn-outline-primary" value="update" name="add_sem">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                <br> <br>
            </form>
        <?php
        }

        ?>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">sno</th>

                        <th scope="col">Id</th>
                        <th scope="col">Semester Number</th>
                        <th scope="col">cat_id</th>

                        <th>
                        <th>
                            <button type="button" class="btn btn-outline-primary"><a style="text-decoration: none; color:black;" href="semester.php?add=1"> &nbsp;&nbsp;Add&nbsp;&nbsp;</a></button>
                        </th>
                        </th>

                </thead>


                <tbody>
                    <?php
                    $data = sem_display();
                    delete_sem();
                  if (isset($_GET['search'])) {
                    $search_sem=  search_sem();
                    if (empty($search_sem)) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Result not found</strong> 
                      </div>";
                    } else {
                        $data = $search_sem;
                    }
                }

                     $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {

                    ?>
                        <tr>
                            <td><?php echo $i + 1 ?> </td>
                            <td><?php echo $data[$i]['id'] ?> </td>
                            <td><?php echo $data[$i]['sem-num'] ?> </td>
                            <td><?php echo $data[$i]['cat_id'] ?> </td>
                            <td>
                                <button type="button" class="btn pull-left btn-outline-primary"><a style="text-decoration: none; color:black;" href="semester.php?edit=<?php echo $data[$i]['id'] ?>">Edit</a></button>
                            </td>

                            <td>
                            <button type="button" class="btn pull-left btn-outline-danger"><a style="text-decoration: none; color:black;" href="semester.php?delete=<?php echo $data[$i]['id'] ?>">Delete</a></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </main>
    </div>
    </div>
    <?php
    include "includes/footer.php"
    ?>


</body>








<!-- <br /><b>Warning</b>:  Undefined variable $data in <b>C:\xampp\htdocs\StuNotes\admin\semester.php</b> on line <b>57</b><br /><br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:\xampp\htdocs\StuNotes\admin\semester.php</b> on line <b>57</b><br /><br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:\xampp\htdocs\StuNotes\admin\semester.php</b> on line <b>57</b><br /> -->