<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="home.php" class="logo">Icon <span class="lite">College</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">

        </ul>
        <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">


            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                    <span class="username"><?php echo $this->session->userdata('userEmail')?> </span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="#"><i class="icon_profile"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon_chat_alt"></i> Change Password</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>Login/logout"><i class="icon_key_alt"></i> Log Out</a>
                    </li>

                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>