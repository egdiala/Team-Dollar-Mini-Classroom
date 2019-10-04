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