
    <!-- BEGIN SIDEBAR -->
    <!-- BEGIN MENU -->
    <div class="page-sidebar" id="main-menu"> 
          <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <!-- BEGIN MINI-PROFILE -->
        <div class="user-info-wrapper"> 
            <div class="profile-wrapper">
                {!! html::image("admin-skin/img/profiles/ba.jpg") !!}
            </div>
            <div class="user-info">
                <div class="greeting">Welcome</div>
                <div class="username">{!! Auth::user()->full_name !!}</div>
            </div>
        </div>
        <!-- END MINI-PROFILE -->
        <!-- BEGIN SIDEBAR MENU --> 
        <p class="menu-title">BROWSE<span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
        <ul>    

            <!-- BEGIN SELECTED LINK -->
            <li {!! classActiveSegment(1, 'companies') !!}>
                <a href="#">
                    <i class="icon-custom-home"></i>
                    <span class="title">Company</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li {!! classActivePath( "companies" ) !!}> {!! link_to_route('companies.index', 'All companies') !!} </li>
                    <li {!! classActivePath( "companies/create" ) !!}> {!! link_to_route('companies.create', 'Add new') !!} </li>
                </ul>
            </li>
            <!-- END SELECTED LINK -->
            <!-- BEGIN BADGE LINK -->
            <li class="">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Link 2</span>
                    <span class="badge badge-disable pull-right">203</span>
                </a>
            </li>
            <!-- END BADGE LINK -->     
            <!-- BEGIN SINGLE LINK -->
            <li class="">
                <a href="#">
                    <i class="fa fa-flag"></i>
                    <span class="title">Link 3</span>
                </a>
            </li>
            <!-- END SINGLE LINK -->    
            <!-- BEGIN ONE LEVEL MENU -->
            <li class="">
                <a href="javascript:;">
                    <i class="icon-custom-ui"></i>
                    <span class="title">Link 4</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Sub Link 1</a></li>
                </ul>
            </li>
            <!-- END ONE LEVEL MENU -->
            <!-- BEGIN TWO LEVEL MENU -->
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-folder-open"></i>
                    <span class="title">Link 5</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="javascript:;">Sub Link 1</a></li>
                    <li>
                        <a href="javascript:;"><span class="title">Sub Link 2</span><span class="arrow "></span></a>
                        <ul class="sub-menu">
                            <li><a href="javascript:;">Sub Link 1</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- END TWO LEVEL MENU -->         
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- BEGIN SIDEBAR WIDGETS -->
        <div class="side-bar-widgets">
            <!-- BEGIN FOLDER WIDGET -->
            <p class="menu-title">FOLDER<span class="pull-right"><a href="#" class="create-folder"><i class="icon-plus"></i></a></span></p>
            <ul class="folders">
                <li><a href="{!! url('auth/logout') !!}"><div class="status-icon red"></div>Log out</a></li>
                <!-- BEGIN HIDDEN INPUT BOX (FOR ADD FOLDER LINK) -->
                <li class="folder-input" style="display:none">
                    <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" id="folder-name">
                </li>
                <!-- END HIDDEN INPUT BOX (FOR ADD FOLDER LINK) -->
            </ul>
            <!-- END FOLDER WIDGET -->
        </div>
        <div class="clearfix"></div>
        <!-- END SIDEBAR WIDGETS --> 
    </div>
    </div>
    <!-- BEGIN SCROLL UP HOVER -->
    <a href="#" class="scrollup">Scroll</a>
    <!-- END SCROLL UP HOVER -->
    <!-- END MENU -->
    <!-- BEGIN SIDEBAR FOOTER WIDGET -->
    <div class="footer-widget">     
        <div class="progress transparent progress-small no-radius no-margin">
            <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar"></div>        
        </div>
        <div class="pull-right">
            <div class="details-status">
                <span data-animation-duration="560" data-value="86" class="animate-number"></span>%
            </div>  
            <a href="#"><i class="fa fa-power-off"></i></a>
        </div>
    </div>
    <!-- END SIDEBAR FOOTER WIDGET -->
    <!-- END SIDEBAR --> 