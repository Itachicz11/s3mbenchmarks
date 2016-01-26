<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse"> 
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <!-- BEGIN NAVIGATION HEADER -->
        <div class="header-seperation"> 
            <!-- BEGIN MOBILE HEADER -->
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">    
                <li class="dropdown">
                    <a id="main-menu-toggle" href="#main-menu" class="">
                        <div class="iconset top-menu-toggle-white"></div>
                    </a>
                </li>        
            </ul>
            <!-- END MOBILE HEADER -->
            <!-- BEGIN LOGO --> 
            <a href="/" class="logo-text">S3 Media</a>
            <!-- END LOGO --> 
            <!-- BEGIN LOGO NAV BUTTONS -->
            <ul class="nav pull-right notifcation-center">  
                <li class="dropdown" id="header_task_bar">
                    <a href="#" class="dropdown-toggle active" data-toggle="">
                        <div class="iconset top-home"></div>
                    </a>
                </li>
                <li class="dropdown" id="header_inbox_bar">
                    <a href="#" class="dropdown-toggle">
                        <div class="iconset top-messages"></div>
                        <span class="badge" id="msgs-badge">2</span>
                        </a>
                </li>
            </ul>
            <!-- END LOGO NAV BUTTONS -->
        </div>
        <!-- END NAVIGATION HEADER -->
        <!-- BEGIN CONTENT HEADER -->
        <div class="header-quick-nav"> 
            <!-- BEGIN HEADER LEFT SIDE SECTION -->
            <div class="pull-left"> 
                <!-- BEGIN SLIM NAVIGATION TOGGLE -->
                <ul class="nav quick-section">
                    <li class="quicklinks">
                        <a href="#" class="" id="layout-condensed-toggle">
                            <div class="iconset top-menu-toggle-dark"></div>
                        </a>
                    </li>
                </ul>
                <!-- END SLIM NAVIGATION TOGGLE -->             
                <!-- BEGIN HEADER QUICK LINKS -->
                <ul class="nav quick-section">
                    <!-- BEGIN SEARCH BOX -->
                    <li class="m-r-10 input-prepend inside search-form no-boarder">
                        <span class="add-on"><span class="iconset top-search"></span></span>
                        <input name="" type="text" class="no-boarder" placeholder="Search Dashboard" style="width:250px;">
                    </li>
                    <!-- END SEARCH BOX -->
                </ul>
                <!-- BEGIN HEADER QUICK LINKS -->               
            </div>
            <!-- END HEADER LEFT SIDE SECTION -->
            <!-- BEGIN HEADER RIGHT SIDE SECTION -->
            <div class="pull-right"> 
                <div class="chat-toggler">  
                    <!-- BEGIN NOTIFICATION CENTER -->
                    <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom" data-content="" data-toggle="dropdown" data-original-title="Notifications">
                        <div class="user-details"> 
                            <div class="username">
                                {!! Auth::user()->full_name !!}
                            </div>                      
                        </div> 
                        <div class="iconset top-down-arrow"></div>
                    </a>    
                    <div id="notification-list" style="display:none">
                        <div style="width:300px">
                            <!-- BEGIN NOTIFICATION MESSAGE -->
                            <div class="notification-messages info">
                                <div class="user-profile">
                                    {!! Html::image('/admin-skin/img/profiles/d.jpg', 'logo',
                                        [
                                        'data-src' => '/admin-skin/img/profiles/d.jpg',
                                        'data-src-retina' => '/admin-skin/img/profiles/d2x.jpg.png'
                                        ]); !!}
                                </div>
                                <div class="message-wrapper">
                                    <div class="heading">Title of Notification</div>
                                    <div class="description">Description...</div>
                                    <div class="date pull-left">A min ago</div>                                     
                                </div>
                                <div class="clearfix"></div>                                    
                            </div>
                            <!-- END NOTIFICATION MESSAGE -->   
                        </div>              
                    </div>
                    <!-- END NOTIFICATION CENTER -->
                    <!-- BEGIN PROFILE PICTURE -->
                    <div class="profile-pic"> 
                        {!! Html::image('/admin-skin/img/profiles/ba.jpg', 'logo',
                            [
                            'data-src' => '/admin-skin/img/profiles/ba.jpg'
                            ]); !!}
                    </div>  
                    <!-- END PROFILE PICTURE -->                
                </div>
                <!-- BEGIN HEADER NAV BUTTONS -->
                <ul class="nav quick-section">
                    <!-- BEGIN SETTINGS -->
                    <li class="quicklinks"> 
                        <a data-toggle="dropdown" class="dropdown-toggle pull-right" href="#" id="user-options">                        
                            <div class="iconset top-settings-dark"></div>   
                        </a>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="user-options">
                            <li><a href="#">Normal Link</a></li>
                            <li><a href="#">Badge Link&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a></li>
                            <li class="divider"></li>                
                            <li><a href="{!! url('/auth/logout') !!}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log out</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- END HEADER NAV BUTTONS -->
            </div>
            <!-- END HEADER RIGHT SIDE SECTION -->
        </div> 
        <!-- END CONTENT HEADER --> 
    </div>
    <!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->