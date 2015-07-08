<div id="top-navigation">
  <div class="container">
    
    <!-- Navigation -->
    <ul class="nav-menu pull-left">
      <li class="active"><a href="">Home</a></li>
      
      <li><a href="#">Blog</a>
      
    </li>
    <?php
    if(!user::logedin())
    echo'<li><a href="?view=login">Log in</a>';
    else
    echo'<li><a href="?view=profile">profile</a>
    <div class="nav-sub-menu">
      <ul class="container sub-menu">
        <li><a href="?view=profile">profile</a></li>
        <li><a href="?view=logout">Log out</a></li>
      </ul>
    </div></li>';
    
    
    if(!user::logedin())
    echo'<li><a href="?view=register">Sign up</a></li>';
    
    
    ?>
    <li><a href="?view=contact">Contact</a></li>
  </ul>
  
  <!-- Search Form -->
  <form name="form-search" method="post" action="http://dotstheme.com/demo/premium/enews_responsive_news_template/html/stretched/search.html" class="form-search pull-right">
    <input type="text" name="search" placeholder="Search...." class="input-icon input-icon-search" />
  </form>
  
  <!-- Social Media -->
  <ul class="social pull-right">
    <li><a href="#" data-placement="bottom" data-original-title="Find us on LinkedIn"><img src="template/web/images/social/infocus/linkedin-logo.png" alt="LinkedIn"></a></li>
    <li><a href="#" data-placement="bottom" data-original-title="Find us on Flickr"><img src="template/web/images/social/infocus/flickr.png" alt="Flickr"></a></li>
    <li><a href="#" data-placement="bottom" data-original-title="Like us on Facebook"><img src="template/web/images/social/infocus/facebook-logo.png" alt="Facebook"></a></li>
    <li><a href="#" data-placement="bottom" data-original-title="Follow on DeviantArt"><img src="template/web/images/social/infocus/deviantart.png" alt="DeviantArt"></a></li>
    <li><a href="#" data-placement="bottom" data-original-title="Follow on Twitter"><img src="template/web/images/social/infocus/twitter.png" alt="Twitter"></a></li>
    <li><a href="#" data-placement="bottom" data-original-title="Follow on Stumbleupon"><img src="template/web/images/social/infocus/stumbleupon.png" alt="Stumbleupon"></a></li>
    <li><a href="#" data-placement="bottom" data-original-title="Call us via Skype"><img src="template/web/images/social/infocus/skype.png" alt="Skype"></a></li>
  </ul>
  
  </div> <!-- End Container -->
  </div> <!-- End Top-Navigation -->
  
  <div class="container">
    <header id="header" class="clearfix">
      
      <!-- Logo -->
      <div class="logo pull-left">
        <a href=""><img src="template/web/images/logo.png" alt="Enews" /></a>
      </div>
      
      <!-- Ads -->
      <div class="ads pull-right">
        <img src="template/web/images/ads/480x80.png" alt="Ads" />
      </div>
      
      </header> <!-- End Header -->
      
      <nav id="main-navigation" class="clearfix margin-bottom40">
        <ul>
          <li><a href="blog_posts.html">Business</a></li>
          <li><a href="blog_posts.html">Technology <i class="arrow-main-nav"></i></a>
          <ul>
            <li><a href="blog_posts.html">Smartphone</a></li>
            <li><a href="blog_posts.html">Tablet</a></li>
            <li><a href="blog_posts.html">Internet</a></li>
            <li><a href="blog_posts.html">Software</a></li>
            <li><a href="blog_posts.html">Hardware</a></li>
            <li><a href="blog_posts.html">Laptop</a></li>
            <li><a href="blog_posts.html">Hot News <i class="arrow-main-nav"></i></a>
            <ul>
              <li><a href="blog_posts.html">Windows 8</a></li>
              <li><a href="blog_posts.html">Apple iPhone 5</a></li>
              <li><a href="blog_posts.html">Microsoft Surface</a></li>
              <li><a href="blog_posts.html">Nokia Lumia 920</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="blog_posts.html">Education</a></li>
      <li><a href="blog_posts.html">Entertainment</a></li>
      <li><a href="blog_photos.html">Photo <i class="arrow-main-nav"></i></a>
      <ul>
        <li><a href="single_photo.html">Single Photo</a></li>
      </ul>
    </li>
    <li><a href="blog_videos.html">Video <i class="arrow-main-nav"></i></a>
    <ul>
      <li><a href="single_video.html">Single Video</a></li>
    </ul>
  </li>
  <li><a href="blog_musics.html">Music <i class="arrow-main-nav"></i></a>
  <ul>
    <li><a href="single_music.html">Single Music</a></li>
  </ul>
</li>
<li><a href="blog_reviews.html">Review <i class="arrow-main-nav"></i></a>
<ul>
  <li><a href="single_review.html">Single Review</a></li>
</ul>
</li>
</ul>
</nav> <!-- End Main-Navigation -->