<?php
require "page-parts/session.php";
if (!$name) header("Refresh: 5; URL=../index.html");
$page_title = "Create An Item";
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
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Create An Item</h4>
                                    </div>
                                    <div class="content">
                                        <form action="api/create-item.php" method="post">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Item Name</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Give your item a name" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea rows="5" name="description" class="form-control" placeholder="Say a little about your item">

                                                </textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <input type="hidden" size="50" name="cid" value="<?php echo $_GET['cid'] ?>">
                                            <input type="submit" name="submit" class="btn btn-info btn-fill pull-right" value="Create Item" />
                                            <div class="clearfix"></div>

                                        </form>
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