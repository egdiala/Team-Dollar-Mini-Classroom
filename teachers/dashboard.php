<?php
require "page-parts/session.php";
if (!$name) header("Refresh: 5; URL=../index.html");
$page_title = "Dashboard";
require "page-parts/html_header.php";

if (empty($name)) {
    echo "<h2>YOU NEED TO LOGIN!</h2>";
} else {
    ?>

    <body>

        <div class="wrapper">
            <?php
                require "page-parts/sidebar.php";
                ?>

            <div class="main-panel">
                <?php
                    require "page-parts/navbar.php";
                    ?>
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Your Classes</h4>
                                        <p class="category">The following is the list of classes you have created.</p>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <?php
                                            require "api/get-classes.php"
                                            ?>

                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>S/N</th>
                                                <th>Class Code</th>
                                                <th>Name</th>
                                                <th>Students</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    for ($i = 0; $i < count($feedback); $i++) {
                                                        $row = $feedback[$i];
                                                        ?>
                                                    <tr>
                                                        <td><?php echo ($i + 1); ?></td>
                                                        <td>CL0<?php echo $row["cid"]; ?></td>
                                                        <td><?php echo $row["name"] ?></td>
                                                        <td><?php echo $row["members"] ?></td>
                                                        <td><a href="class-view.php?cid=<?php echo $row["cid"]; ?>">View</a></td>
                                                    </tr>
                                                <?php
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>

                                        <a href="create-class-view.php" class="btn btn-info btn-fill pull-right">Create Class</a>

                                    </div>
                                </div>
                            </div>




                        </div>



                    </div>
                </div>

                <?php
                    require "page-parts/html_footer.php";
                    ?>

            </div>
        </div>


    </body>
    <?php
        require "page-parts/scripts.php";
        ?>

    </html>
<?php
} ?>