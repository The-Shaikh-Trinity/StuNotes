<?php
include "includes/head.php";
?>

<body>
    <?php
    include "includes/header.php"
    ?>

    <?php
    include "includes/sidebar.php";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <br>
                    <h2>Customer details</h2>
                    <br>
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <br>
                    <form class="d-flex" method="GET" action="customers.php">
                        <input class="form-control me-2 col" type="search" name="search_user_email" placeholder="Search for user (email)" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit" name="search_user" value="search">Search</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <br>
        <h2>Edit Customer Details</h2>
        <form action="customers.php" method="POST">
            <div class="form-group">
                <label>First name</label>
                <input pattern="[A-Za-z_]{1,15}" type="text" class="form-control" placeholder="user_fname" name="fname">
                <div class="form-text">please enter the first name in range(1-30) character/s , special character & numbers not allowed !</div>
            </div>
            <br>
            <div class="form-group">
                <label for="validationTooltip01">Last name</label>
                <input pattern="[A-Za-z_]{1,15}" id="validationTooltip01" type="text" class="form-control" placeholder="user_lname" name="lname">
                <div class="form-text">please enter the last name in range(1-30) character/s , special character & numbers not allowed !</div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email">
                <div class="form-text">please enter the email in format : example@gmail.com.</div>
            </div>
            <br>
            <div class="form-group">
                <label for="inputAddress2">Address</label>
                <input pattern="^[#.0-9a-zA-Z\s,-]+$" type="text" class="form-control" id="inputAddress2" placeholder="user_address" name="address">
            </div>
            <div class="form-text">please enter the email in format : #1, North Street, Chennai - 11.</div>
            <br>
            <button type="submit" class="btn btn-outline-success" value="update" name="update">Submit</button>
            <button type=" submit" class="btn btn-outline-danger" value="cancel" name="cancel">Cancel</button>
            <br> <br>
        </form>


        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>

                </thead>

                <tbody>

                    <tr>
                        <td>user_id</td>
                        <td>user_fname</td>
                        <td>user_lname</td>
                        <td>email</td>
                        <td>user_address</td>
                        <td>
                            <button type="button" class="btn pull-left btn-outline-warning"><a style="text-decoration: none; color:black;" href="customers.php?edit=user_id">Edit</a></button>
                        </td>
                        <td>
                            <button type="button" class="btn pull-left btn-outline-danger"><a style="text-decoration: none; color:black;" href="customers.php?delete=user_id">Delete</a></button>
                        </td>
                    </tr>

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