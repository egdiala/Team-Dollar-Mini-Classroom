<?php
    require "page-parts/session.php";
    $page_title = "Create A Class";
    require "page-parts/html_header.php";
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
                                <h4 class="title">Create A Class</h4>
                            </div>
                            <div class="content">
                                <form action="api/create-class.php" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Class Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Give your class a name" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" name="description" class="form-control" placeholder="Say a little about your class">
                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" class="btn btn-info btn-fill pull-right" value="Create Class" />
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
