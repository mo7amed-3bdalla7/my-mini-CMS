
<div id="main" class="span8 search-page image-preloader">

	<div class="row-fluid">
		<!-- Search Results -->
		<h2>
			Search Results for “<i><?=$_GET['view']?></i>”
		</h2>
		<form name="form-search" method="post" action="#">
			<input type="text" name="search" value="<?=$_GET['view']?>"> <input
				type="submit" name="submit" value="Search">
		</form>
		<p class="search-info">
			Displaying results 0 of <i>0</i>
		</p>

		<div class="sep-border margin-bottom20"></div>
		<!-- Separator -->

		<h4>
			Page Not Found for "<span class="font-required"><?=$_GET['view']?></span>"
		</h4>
		<p class="label label-important">Please try again with some different
			keywords.</p>
		<br> <br>
		<p>You might want to consider some of our suggestions to get better
			results:</p>
		<ul>
			<li>Check your spelling.</li>
			<li>Try a similar keyword, for example: tablet instead of laptop.</li>
			<li>Try using more than one keyword.</li>
		</ul>
	</div>
</div>