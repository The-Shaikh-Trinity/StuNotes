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
                    <h2><Strong>Category Details</Strong></h2>
                    <br>
                </div>

                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="products.php">
                        <input class="form-control me-2 col" type="search" name="search" placeholder="Search for product" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="searching" value="search">Search</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <!-- this section is for the adding the details -->
        <?php


        edit($_SESSION['id']);
        $edited = false;

        if (isset($_GET['edit'])) {
            // The isset function in PHP is used to determine whether 
            // a variable is set or not. A variable is considered as a
            //  set variable if it has a value other than NULL

            $_SESSION['id'] = $_GET['edit'];
            $data = get_by_id($_GET['edit']);//passing the id which edit table has
            $edited = true;

        ?>

            <h2>Edit category Details</h2>
            <form action="products.php" method="POST">
                <div class=" form-group mb-3">
                    <label>category name</label>
                    <input id="cat_name" type="text" class="form-control" value="<?php echo $data['0']['cat_name'] ?>" placeholder="product name" name="cat_name">
                    <div class="form-text"></div>
                </div>
                <div class="form-group">
                    <label>cateory description</label>
                    <input id="cat_desc" type="" class="form-control" value="<?php echo $data['0']['cat_desc'] ?>" placeholder="product brand" name="cat_desc">
                    <div class="form-text"></div>
                </div>
                <button type="submit" id="edit" class="btn btn-outline-primary" value="update" name="edit">Submit</button>
                <button type=" submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
                <br> <br>
            </form>
            <br>
        <?php
        }

        ?>


        <!-- this section is for the adding the details -->

        <?php
        add();
        if (isset($_GET['add'])) {
        ?>


            <h2>Add Product</h2>
            <form action="products.php" method="POST">
                <div class=" form-group mb-3">
                    <label>category name</label>
                    <input id="cat_name" type="text" class="form-control" placeholder="product name" name="cat_name">
                    <div class="form-text">please enter the product name in range(1-25) character/s , special character not allowed !</div>
                </div>
                <div class="form-group">
                    <label>cateory description</label>
                    <input id="cat_desc" type="" class="form-control" placeholder="product brand" name="cat_desc">
                    <div class="form-text">please enter the brand name in range(1-25) character/s , special character not allowed !</div>
                </div>
                <button type="submit" class="btn btn-outline-primary" value="update" name="add_item">Submit</button>
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
                        <th scope="col">Name</th>
                        <th scope="col">Desc</th>

                        <th>
                        <th>
                            <button type="button" class="btn btn-outline-primary"><a style="text-decoration: none; color:black;" href="products.php?add=1"> &nbsp;&nbsp;Add&nbsp;&nbsp;</a></button>
                        </th>
                        </th>

                </thead>


                <tbody>
                    <?php
                    $data = display();
                      delete_item();

                    if (isset($_GET['search'])) {
                        $search = search();
                        if (empty($search)) {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Result not found</strong> 
                          </div>";
                        } else {
                            $data = $search;
                        }
                    }
                    $num = sizeof($data);
                    for ($i = 0; $i < $num; $i++) {
                    ?>
                        <tr>
                            <td><?php echo $i + 1 ?></td>
                            <td><?php echo $data[$i]['id'] ?> </td>
                            <td><?php echo $data[$i]['cat_name'] ?></td>
                            <td><?php echo $data[$i]['cat_desc'] ?> </td>
                            <td>
                                <button type="button" class="btn pull-left btn-outline-primary"><a style="text-decoration: none; color:black;" href="products.php?edit=<?php echo $data[$i]['id'] ?>">Edit</a></button>
                            </td>

                            <td>
                                <button type="button" class="btn pull-left btn-outline-danger"><a style="text-decoration: none; color:black;" href="products.php?delete=<?php echo $data[$i]['id'] ?>">Delete</a></button>
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