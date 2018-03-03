<?php ob_start(); ?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand " href="index.php">Dashboard</a>
    </div>
    <!-- /.navbar-header -->


    <div class="navbar-default sidebar top-fix" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="listCategory.php"><i class="sub_icon glyphicon glyphicon-tags"></i> Category
                    </a>

                    <!-- /.nav-second-level -->
                </li>

                <!--slider-->
                <li>
                    <a href="listSlide.php"><i class="sub_icon glyphicon glyphicon-picture"></i> Slide
                    </a>

                </li>
                <!--endslider-->

                <!--videos-->
                <li>
                    <a href="listVideos.php"><i class="sub_icon glyphicon glyphicon-hd-video"></i> Videos

                    </a>
                </li>
             
                <!--User-->
                <li>
                    <a href="listUser.php"><i class="sub_icon glyphicon glyphicon-user"></i> Users
                    </a>
                </li>
                <!--endUser-->


                <!--UserVisitor-->
                <li>
                    <a href="logolist.php" title=""><i class="fa fa-eercast" aria-hidden="true"></i>  Logo</a>
                </li>

                <!--UserVisitor-->

                <li>
                    <a href="listfooter.php"><i class="glyphicon glyphicon-edit"></i> Footer</a>
                </li>


                <li>
                    <a href="login.php?action=logout"><i class="glyphicon glyphicon-log-out"></i> Log out  

                    </li>
                    <!--endUserVisitor-->
                </a>
            </ul>

        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>