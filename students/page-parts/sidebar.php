    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://alvdeenservices.com" class="simple-text">
                    Mini Classroom<br/>By<br/>Team Dollar
                </a>
            </div>

            <ul class="nav">
                                
                <li <?php  if($page_title == "Dashboard") echo 'class="active"'; ?>>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li <?php  if($page_title == "Classes") echo 'class="active"'; ?>>
                    <a href="classes.php">
                        <i class="pe-7s-graph"></i>
                        <p>Classes</p>
                    </a>
                </li>

                <li <?php  if($page_title == "New Classes") echo 'class="active"'; ?>>
                    <a href="new-classes-view.php">
                        <i class="pe-7s-graph"></i>
                        <p>All Classes</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>