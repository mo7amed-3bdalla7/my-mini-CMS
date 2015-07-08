
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            
            <p class="centered"><a href="profile.html"><img src="template/cpanel/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?=user::current_user()->username?></h5>
            
            <li class="mt">
              <a <?php $this->highlight_menu(); ?> href="cpanel">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="sub-menu">
              <a  <?php $this->highlight_menu('users'); ?> href="javascript:;" >
                <i class="fa fa-user"></i>
                <span>Users</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('users'); ?>><a  href="cpanel?view=users">Users</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a  <?php $this->highlight_menu('categories'); ?> href="javascript:;" >
                <i class="fa fa-desktop"></i>
                <span>Categories</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('categories'); ?>><a  href="cpanel?view=categories">Categories</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a <?php $this->highlight_menu('pages'); ?> href="javascript:;" >
                <i class="fa fa-book"></i>
                <span>Pages</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('pages'); ?>><a  href="cpanel?view=pages">Pages</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a <?php $this->highlight_menu('news'); ?> href="javascript:;" >
                <i class="fa fa-paper-plane"></i>
                <span>News</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('news'); ?> ><a   href="cpanel?view=news">News</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a <?php $this->highlight_menu('comments'); ?> href="javascript:;" >
                <i class="fa fa-tasks"></i>
                <span>Comments</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('comments'); ?> ><a  href="cpanel?view=comments">Comments</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a <?php $this->highlight_menu('slideshow'); ?> href="javascript:;" >
                <i class="fa fa-th"></i>
                <span>Slide Show</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('slideshow'); ?> ><a  href="cpanel?view=slideshow">Slide Show</a></li>
                
              </ul>
            </li>
            <li class="sub-menu">
              <a <?php $this->highlight_menu('general'); ?> href="javascript:;" >
                <i class=" fa fa-building-o"></i>
                <span>General</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('general'); ?> ><a  href="cpanel?view=general">General</a></li>
                
              </ul>
            </li>
            <li class="sub-menu">
              <a <?php $this->highlight_menu('settings'); ?> href="javascript:;" >
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
              </a>
              <ul class="sub">
                <li <?php $this->highlight_menu('settings'); ?> ><a  href="cpanel?view=settings">Settings</a></li>
              
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->

      <section id="main-content">
        <section class="wrapper">
        <div class="row">
        
      