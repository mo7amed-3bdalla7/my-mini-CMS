
<?php 
if(isset($_GET['view'])){
	if($_GET['view']==''||$_GET['view']=='index')
		require_once WEB_TEMPLATE_PATH .'slider.tpl';
}else{
	require_once WEB_TEMPLATE_PATH .'slider.tpl';
}

?>

<div class="headlines clearfix">
   <span class="base">30<i>Tue</i></span>
   <div class="text-rotator">
    <div><a href="single_post.html" title="View permalink Small Market and St. Sebastian's Square in Opole">Small Market and St. Sebastian's Square in Opole</a></div>
    <div><a href="single_post.html" title="View permalink Mosaic Pool is Amazing And Beautiful Place">Mosaic Pool is Amazing And Beautiful Place</a></div>
    <div><a href="single_post.html" title="View permalink Glass House Below The Dark of Moon Light">Glass House Below The Dark of Moon Light</a></div>
    <div><a href="single_post.html" title="View permalink Platform House with Minimal Design">Platform House with Minimal Design</a></div>
    <div><a href="single_post.html" title="View permalink Winter Kitchen with Silver Panorama">Winter Kitchen with Silver Panorama</a></div>
   </div>
  </div> <!-- End Headlines -->
  
  <div class="row-fluid">
  
   <?php  $this->render_view(); 
   if($_GET['view']!='contact')
   	require_once WEB_TEMPLATE_PATH .'sidebar.tpl'

   ?>
   