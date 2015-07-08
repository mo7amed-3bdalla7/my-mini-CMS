
<div id="main" class="span8 page contact-page image-preloader">

	<div class="row-fluid">

		<?php
		$allnews = news::read ( 'SELECT * FROM news ', PDO::FETCH_CLASS, 'news' );
		
		if (is_object ( $allnews )) {
			echo '<!-- One --><div class="span6 post no-margin-left">	
			<figure>
				<img src="template/web/images/content/600/1.jpg" alt="Thumbnail 1" />
				<div class="cat-name">
					<span class="base">' . $allnews->cat . '</span> <span class="arrow"></span>
				</div>
			</figure>
			<div class="text">
				<h2>
					<a href="single_post.html"
						title="View permalink Camerette - Your Time to Dream">' . $allnews->title . '</a>
				</h2>
				<p>' . $allnews->content . '.</p>
				<div class="meta">
					By <a href="?view=author&id=' . $allnewss->user_id . '">' . user::read ( 'SELECT *FROM users where id=' . $allnews->user_id, PDO::FETCH_CLASS, __class__ )->username . '</a>&nbsp;&nbsp;|&nbsp;&nbsp;
							Jan.14, 2013&nbsp;&nbsp;|&nbsp;&nbsp;<a href="single_post.html">15
						comments</a>
				</div>
			</div>
		</div>';
		} else {
			$i = 1;
			$clear = '';
			foreach ( $allnews as $news ) {
				$date = strtotime($news->created);
				$s_news = '
			<figure>
				<img src="template/web/images/content/600/1.jpg" alt="Thumbnail 1" />
				<div class="cat-name">
					<span class="base">' . $news->cat . '</span> <span class="arrow"></span>
				</div>
			</figure>
			<div class="text">
				<h2>
					<a href="single_post.html"
						title="View permalink Camerette - Your Time to Dream">' . $news->title . '</a>
				</h2>
				<p>' . substr ( $news->content, 0, 100 ) . '...</p>
				<div class="meta">
					By <a href="?view=author&id=' . $news->user_id . '">' . user::read ( 'SELECT *FROM users where id=' . $news->user_id, PDO::FETCH_CLASS, __class__ )->username . '</a>&nbsp;&nbsp;|&nbsp;&nbsp;
							'.
							
							
						date("M.j, Y", $date)
							
							.'&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?view=single_post&id=' . $news->id . '">15
						comments</a>
				</div>
			</div>
		</div>';
				if ($i % 2 != 0) {
					if ($i == 3) {
						echo '<div class="span6 post no-margin-left">' . $s_news . '<!-- Review Posts -->
		<div class="span6 home-reviews">

			<!-- Header -->
			<div class="header">
				<div class="base">
					<h4>Reviews</h4>
					<a href="blog_reviews.html" title="View all reviews">more
						reviews....</a>
				</div>
				<div class="arrow arrow-left"></div>
				<div class="arrow arrow-right"></div>
			</div>

			<!-- One -->
			<div class="item">
				<a href="single_review.html">
					<figure class="figure-hover">
						<img src="template/web/images/content/300/7.jpg" alt="Thumbnail 1" />
						<div class="base-val">70%</div>
						<div class="figure-hover-masked">
							<p class="icon-plus-small"></p>
						</div>
					</figure>
				</a>
				<div class="content">
					<p>
						<a href="single_review.html"
							title="View permalink Small Market and St. Sebastian\'s Square in Opole">Small
							Market and St. Sebastian\'s Square in Opole</a> <i>by mdkiwol</i>
					</p>
					<div class="base-rate">
						<div class="rate-val" style="width: 70%;"></div>
					</div>
				</div>
			</div>

			<!-- Two -->
			<div class="item">
				<a href="single_review.html">
					<figure class="figure-hover">
						<img src="template/web/images/content/300/8.jpg" alt="Thumbnail 2" />
						<div class="base-val">5.5</div>
						<div class="figure-hover-masked">
							<p class="icon-plus-small"></p>
						</div>
					</figure>
				</a>
				<div class="content">
					<p>
						<a href="single_review.html"
							title="View permalink Living Room in Italy">Living Room in Italy</a>
						<i>by john</i>
					</p>
					<div class="base-rate">
						<div class="rate-val" style="width: 55%;"></div>
					</div>
				</div>
			</div>

			<!-- Three -->
			<div class="item">
				<a href="single_review.html">
					<figure class="figure-hover">
						<img src="template/web/images/content/300/9.jpg" alt="Thumbnail 3" />
						<div class="base-val">100</div>
						<div class="figure-hover-masked">
							<p class="icon-plus-small"></p>
						</div>
					</figure>
				</a>
				<div class="content">
					<p>
						<a href="single_review.html"
							title="View permalink Platform House With Minimal Design">Platform
							House With Minimal Design</a> <i>by jagerjack</i>
					</p>
					<div class="base-rate">
						<div class="rate-val" style="width: 100%;"></div>
					</div>
				</div>
			</div>

		</div><div class="clearfix ie-sep"></div>';
						$i --;
					} else
						echo '<!-- One --><div class="span6 post no-margin-left">' . $s_news;
				} else {
					echo '<!-- One --><div class="span6 post">' . $s_news . '<div class="clearfix ie-sep"></div>';
				}
				
				$i ++;
			}
		}
		
		?>
		<div class="clearfix ie-sep"></div>
		<!-- Clearfix -->

		<!-- Gallery Posts -->
		<div class="home-galleries no-margin-left">

			<!-- Header -->
			<div class="header">
				<div class="base">
					<h4>Galleries</h4>
					<div class="nav-control">
						<span class="previous"></span><span class="next"></span>
					</div>
				</div>
				<div class="arrow arrow-left"></div>
				<div class="arrow arrow-right"></div>
			</div>

			<!-- One -->
			<div class="item">
				<figure class="figure-overlay figure-overlay-icon">
					<a href="single_photo.html"> <img
						src="template/web/images/content/300/3.jpg" alt="Thumbnail 1" />
						<div>
							<p class="icon-plus"></p>
						</div>
					</a>
				</figure>
				<p>Small Market and St. Sebastian's Square in Opole</p>
			</div>

			<!-- Two -->
			<div class="item">
				<figure class="figure-overlay figure-overlay-icon">
					<a href="single_photo.html"> <img
						src="template/web/images/content/300/10.jpg" alt="Thumbnail 2" />
						<div>
							<p class="icon-plus"></p>
						</div>
					</a>
				</figure>
				<p>Living Room in Italy</p>
			</div>

			<div class="clearfix"></div>
			<!-- Clearfix -->

			<!-- Three -->
			<div class="item">
				<figure class="figure-overlay figure-overlay-icon">
					<a href="single_photo.html"> <img
						src="template/web/images/content/300/11.jpg" alt="Thumbnail 3" />
						<div>
							<p class="icon-plus"></p>
						</div>
					</a>
				</figure>
				<p>Platform House with Minimal Design</p>
			</div>

			<!-- Four -->
			<div class="item">
				<figure class="figure-overlay figure-overlay-icon">
					<a href="single_photo.html"> <img
						src="template/web/images/content/300/12.jpg" alt="Thumbnail 4" />
						<div>
							<p class="icon-plus"></p>
						</div>
					</a>
				</figure>
				<p>Mosaic Pool is Very Amazing And Beautiful</p>
			</div>

		</div>
		<!-- End Galleries -->

		<div class="clearfix ie-sep"></div>
		<!-- Clearfix -->

		<nav class="nav-pagination">
			<ul>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li><a href="#">10</a></li>
				<li class="empty-space">....</li>
				<li><a href="#">17</a></li>
			</ul>
			<p>Page 1 of 17</p>
		</nav>
		<!-- End Nav-Pagination -->
	</div>
</div>