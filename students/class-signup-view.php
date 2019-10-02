<?php
    require "page-parts/session.php";
    $page_title = "Class-SignUp-View";
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
                    <div class="col-md-12">
                        <div class="card card-user">


                        <?php
                            require "api/get-class.php";
                        ?>

                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-0.jpg" alt="..."/>

                                      <h4 class="title"> <?php echo $class["name"] ?><br />
                                         <small> CL0<?php echo $class["cid"] ?> </small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> 
                                    <?php echo $class["description"] ?>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>

                <?php
                if(isset($_GET["s"])) {
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <h4>You are signed up for this class.</h4>
                    </div>

                </div>

                <?php
                    } else {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <form action="api/class-signup.php" method="post">
                            <input type="hidden" name="cid" value="<?php echo $_GET['cid'] ?>" />
                            <input type="submit" class="btn btn-info btn-fill" value="Sign Up" />
                        </form>
                    </div>

                </div>
                <?php
                    }
                ?>


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
