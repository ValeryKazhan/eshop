<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Blog Details</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.blade.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="index.blade.php">Home</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="category.blade.php">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-product.blade.php">Blog Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="checkout.blade.php">Product Checkout</a></li>
                  <li class="nav-item"><a class="nav-link" href="confirmation.blade.php">Confirmation</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.blade.php">Shopping Cart</a></li>
                </ul>
							</li>
              <li class="nav-item active submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.blade.php">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.blade.php">Blog Details</a></li>
                </ul>
							</li>
							<li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
				  <li class="nav-item"><a class="nav-link" href="user/login.blade.php">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="user/register.blade.php">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="tracking-order.blade.php">Tracking</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="single-blog.blade.php">Blog Details</a></li> -->
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.blade.php">Contact</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </li>
              <li class="nav-item"><a class="button button-header" href="#">Buy Now</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->


	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Blog Details</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->



  <!--================Blog Area =================-->
	<section class="blog_area single-post-area py-80px section-margin--small">
			<div class="container">
					<div class="row">
							<div class="col-lg-8 posts-list">
									<div class="single-post row">
											<div class="col-lg-12">
													<div class="feature-img">
															<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
													</div>
											</div>
											<div class="col-lg-3  col-md-3">
													<div class="blog_info text-right">
															<div class="post_tag">
																	<a href="#">Food,</a>
																	<a class="active" href="#">Technology,</a>
																	<a href="#">Politics,</a>
																	<a href="#">Lifestyle</a>
															</div>
															<ul class="blog_meta list">
																	<li>
																			<a href="#">Mark wiens
																					<i class="lnr lnr-user"></i>
																			</a>
																	</li>
																	<li>
																			<a href="#">12 Dec, 2017
																					<i class="lnr lnr-calendar-full"></i>
																			</a>
																	</li>
																	<li>
																			<a href="#">1.2M Views
																					<i class="lnr lnr-eye"></i>
																			</a>
																	</li>
																	<li>
																			<a href="#">06 Comments
																					<i class="lnr lnr-bubble"></i>
																			</a>
																	</li>
															</ul>
															<ul class="social-links">
																	<li>
																			<a href="#">
																					<i class="fab fa-facebook-f"></i>
																			</a>
																	</li>
																	<li>
																			<a href="#">
																				<i class="fab fa-twitter"></i>
																			</a>
																	</li>
																	<li>
																			<a href="#">
																				<i class="fab fa-github"></i>
																			</a>
																	</li>
																	<li>
																			<a href="#">
																				<i class="fab fa-behance"></i>
																			</a>
																	</li>
															</ul>
													</div>
											</div>
											<div class="col-lg-9 col-md-9 blog_details">
													<h2>Astronomy Binoculars A Great Alternative</h2>
													<p class="excert">
															MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
															on boot camp when you can get the MCSE study materials yourself at a fraction.
													</p>
													<p>
															Boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot
															camp when you can get the MCSE study materials yourself at a fraction of the camp price.
															However, who has the willpower to actually sit through a self-imposed MCSE training. who
															has the willpower to actually sit through a self-imposed
													</p>
													<p>
															Boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot
															camp when you can get the MCSE study materials yourself at a fraction of the camp price.
															However, who has the willpower to actually sit through a self-imposed MCSE training. who
															has the willpower to actually sit through a self-imposed
													</p>
											</div>
											<div class="col-lg-12">
													<div class="quotes">
															MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
															on boot camp when you can get the MCSE study materials yourself at a fraction of the camp
															price. However, who has the willpower to actually sit through a self-imposed MCSE training.
													</div>
													<div class="row">
															<div class="col-6">
																	<img class="img-fluid" src="img/blog/post-img1.jpg" alt="">
															</div>
															<div class="col-6">
																	<img class="img-fluid" src="img/blog/post-img2.jpg" alt="">
															</div>
															<div class="col-lg-12 mt-4">
																	<p>
																			MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
																			on boot camp when you can get the MCSE study materials yourself at a fraction of
																			the camp price. However, who has the willpower.
																	</p>
																	<p>
																			MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
																			on boot camp when you can get the MCSE study materials yourself at a fraction of
																			the camp price. However, who has the willpower.
																	</p>
															</div>
													</div>
											</div>
									</div>
									<div class="navigation-area">
											<div class="row">
													<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
															<div class="thumb">
																	<a href="#">
																			<img class="img-fluid" src="img/blog/prev.jpg" alt="">
																	</a>
															</div>
															<div class="arrow">
																	<a href="#">
																			<span class="lnr text-white lnr-arrow-left"></span>
																	</a>
															</div>
															<div class="detials">
																	<p>Prev Post</p>
																	<a href="#">
																			<h4>Space The Final Frontier</h4>
																	</a>
															</div>
													</div>
													<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
															<div class="detials">
																	<p>Next Post</p>
																	<a href="#">
																			<h4>Telescopes 101</h4>
																	</a>
															</div>
															<div class="arrow">
																	<a href="#">
																			<span class="lnr text-white lnr-arrow-right"></span>
																	</a>
															</div>
															<div class="thumb">
																	<a href="#">
																			<img class="img-fluid" src="img/blog/next.jpg" alt="">
																	</a>
															</div>
													</div>
											</div>
									</div>
									<div class="comments-area">
											<h4>05 Comments</h4>
											<div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	<div class="thumb">
																			<img src="img/blog/c1.jpg" alt="">
																	</div>
																	<div class="desc">
																			<h5>
																					<a href="#">Emilly Blunt</a>
																			</h5>
																			<p class="date">December 4, 2017 at 3:12 pm </p>
																			<p class="comment">
																					Never say goodbye till the end comes!
																			</p>
																	</div>
															</div>
															<div class="reply-btn">
																	<a href="#" class="btn-reply text-uppercase">reply</a>
															</div>
													</div>
											</div>
											<div class="comment-list left-padding">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	<div class="thumb">
																			<img src="img/blog/c2.jpg" alt="">
																	</div>
																	<div class="desc">
																			<h5>
																					<a href="#">Elsie Cunningham</a>
																			</h5>
																			<p class="date">December 4, 2017 at 3:12 pm </p>
																			<p class="comment">
																					Never say goodbye till the end comes!
																			</p>
																	</div>
															</div>
															<div class="reply-btn">
																	<a href="#" class="btn-reply text-uppercase">reply</a>
															</div>
													</div>
											</div>
											<div class="comment-list left-padding">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	<div class="thumb">
																			<img src="img/blog/c3.jpg" alt="">
																	</div>
																	<div class="desc">
																			<h5>
																					<a href="#">Annie Stephens</a>
																			</h5>
																			<p class="date">December 4, 2017 at 3:12 pm </p>
																			<p class="comment">
																					Never say goodbye till the end comes!
																			</p>
																	</div>
															</div>
															<div class="reply-btn">
																	<a href="#" class="btn-reply text-uppercase">reply</a>
															</div>
													</div>
											</div>
											<div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	<div class="thumb">
																			<img src="img/blog/c4.jpg" alt="">
																	</div>
																	<div class="desc">
																			<h5>
																					<a href="#">Maria Luna</a>
																			</h5>
																			<p class="date">December 4, 2017 at 3:12 pm </p>
																			<p class="comment">
																					Never say goodbye till the end comes!
																			</p>
																	</div>
															</div>
															<div class="reply-btn">
																	<a href="#" class="btn-reply text-uppercase">reply</a>
															</div>
													</div>
											</div>
											<div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	<div class="thumb">
																			<img src="img/blog/c5.jpg" alt="">
																	</div>
																	<div class="desc">
																			<h5>
																					<a href="#">Ina Hayes</a>
																			</h5>
																			<p class="date">December 4, 2017 at 3:12 pm </p>
																			<p class="comment">
																					Never say goodbye till the end comes!
																			</p>
																	</div>
															</div>
															<div class="reply-btn">
																	<a href="#" class="btn-reply text-uppercase">reply</a>
															</div>
													</div>
											</div>
									</div>
									<div class="comment-form">
											<h4>Leave a Reply</h4>
											<form>
													<div class="form-group form-inline">
															<div class="form-group col-lg-6 col-md-6 name">
																	<input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
															</div>
															<div class="form-group col-lg-6 col-md-6 email">
																	<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
															</div>
													</div>
													<div class="form-group">
															<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
													</div>
													<div class="form-group">
															<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
																	required=""></textarea>
													</div>
													<a href="#" class="button button-postComment button--active">Post Comment</a>
											</form>
									</div>
							</div>
							<div class="col-lg-4">
									<div class="blog_right_sidebar">
											<aside class="single_sidebar_widget search_widget">
													<div class="input-group">
															<input type="text" class="form-control" placeholder="Search Posts">
															<span class="input-group-btn">
																	<button class="btn btn-default" type="button">
																			<i class="lnr lnr-magnifier"></i>
																	</button>
															</span>
													</div>
													<!-- /input-group -->
													<div class="br"></div>
											</aside>
											<aside class="single_sidebar_widget author_widget">
													<img class="author_img rounded-circle" src="img/blog/author.png" alt="">
													<h4>Charlie Barber</h4>
													<p>Senior blog writer</p>
													<div class="social_icon">
                              <a href="#">
                                  <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#">
                                  <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#">
                                  <i class="fab fa-github"></i>
                              </a>
                              <a href="#">
                                <i class="fab fa-behance"></i>
                              </a>
                          </div>
													<p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
															have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
															detractors.
													</p>
													<div class="br"></div>
											</aside>
											<aside class="single_sidebar_widget popular_post_widget">
													<h3 class="widget_title">Popular Posts</h3>
													<div class="media post_item">
															<img src="img/blog/popular-post/post1.jpg" alt="post">
															<div class="media-body">
																	<a href="blog-details.html">
																			<h3>Space The Final Frontier</h3>
																	</a>
																	<p>02 Hours ago</p>
															</div>
													</div>
													<div class="media post_item">
															<img src="img/blog/popular-post/post2.jpg" alt="post">
															<div class="media-body">
																	<a href="blog-details.html">
																			<h3>The Amazing Hubble</h3>
																	</a>
																	<p>02 Hours ago</p>
															</div>
													</div>
													<div class="media post_item">
															<img src="img/blog/popular-post/post3.jpg" alt="post">
															<div class="media-body">
																	<a href="blog-details.html">
																			<h3>Astronomy Or Astrology</h3>
																	</a>
																	<p>03 Hours ago</p>
															</div>
													</div>
													<div class="media post_item">
															<img src="img/blog/popular-post/post4.jpg" alt="post">
															<div class="media-body">
																	<a href="blog-details.html">
																			<h3>Asteroids telescope</h3>
																	</a>
																	<p>01 Hours ago</p>
															</div>
													</div>
													<div class="br"></div>
											</aside>
											<aside class="single_sidebar_widget ads_widget">
													<a href="#">
															<img class="img-fluid" src="img/blog/add.jpg" alt="">
													</a>
													<div class="br"></div>
											</aside>
											<aside class="single_sidebar_widget post_category_widget">
													<h4 class="widget_title">Post Catgories</h4>
													<ul class="list cat-list">
															<li>
																	<a href="#" class="d-flex justify-content-between">
																			<p>Technology</p>
																			<p>37</p>
																	</a>
															</li>
															<li>
																	<a href="#" class="d-flex justify-content-between">
																			<p>Lifestyle</p>
																			<p>24</p>
																	</a>
															</li>
															<li>
																	<a href="#" class="d-flex justify-content-between">
																			<p>Fashion</p>
																			<p>59</p>
																	</a>
															</li>
															<li>
																	<a href="#" class="d-flex justify-content-between">
																			<p>Art</p>
																			<p>29</p>
																	</a>
															</li>
															<li>
																	<a href="#" class="d-flex justify-content-between">
																			<p>Food</p>
																			<p>15</p>
																	</a>
															</li>
															<li>
																	<a href="#" class="d-flex justify-content-between">
																			<p>Architecture</p>
																			<p>09</p>
																	</a>
															</li>
															<li>
																	<a href="#" class="d-flex justify-content-between">
																			<p>Adventure</p>
																			<p>44</p>
																	</a>
															</li>
													</ul>
													<div class="br"></div>
											</aside>
											<aside class="single-sidebar-widget newsletter_widget">
													<h4 class="widget_title">Newsletter</h4>
													<p>
															Here, I focus on a range of items and features that we use in life without giving them a second thought.
													</p>
													<div class="form-group d-flex flex-row">
															<div class="input-group">
																	<div class="input-group-prepend">
																			<div class="input-group-text">
																					<i class="fa fa-envelope" aria-hidden="true"></i>
																			</div>
																	</div>
																	<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email address" onfocus="this.placeholder = ''"
																			onblur="this.placeholder = 'Enter email'">
															</div>
															<a href="#" class="bbtns">Subcribe</a>
													</div>
													<p class="text-bottom">You can unsubscribe at any time</p>
													<div class="br"></div>
											</aside>
											<aside class="single-sidebar-widget tag_cloud_widget">
													<h4 class="widget_title">Tag Clouds</h4>
													<ul class="list">
															<li>
																	<a href="#">Technology</a>
															</li>
															<li>
																	<a href="#">Fashion</a>
															</li>
															<li>
																	<a href="#">Architecture</a>
															</li>
															<li>
																	<a href="#">Fashion</a>
															</li>
															<li>
																	<a href="#">Food</a>
															</li>
															<li>
																	<a href="#">Technology</a>
															</li>
															<li>
																	<a href="#">Lifestyle</a>
															</li>
															<li>
																	<a href="#">Art</a>
															</li>
															<li>
																	<a href="#">Adventure</a>
															</li>
															<li>
																	<a href="#">Food</a>
															</li>
															<li>
																	<a href="#">Lifestyle</a>
															</li>
															<li>
																	<a href="#">Adventure</a>
															</li>
													</ul>
											</aside>
									</div>
							</div>
					</div>
			</div>
	</section>
	<!--================Blog Area =================-->


  <!--================Instagram Area =================-->
  <section class="instagram_area">
    <div class="container box_1620">
      <div class="insta_btn">
        <a class="btn theme_btn" href="#">Follow us on instagram</a>
      </div>
      <div class="instagram_image row m0">
        <a href="#"><img src="img/instagram/ins-1.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-2.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-3.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-4.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-5.jpg" alt=""></a>
        <a href="#"><img src="img/instagram/ins-6.jpg" alt=""></a>
      </div>
    </div>
  </section>
  <!--================End Instagram Area =================-->


  <!--================ Start footer Area  =================-->
	<footer>
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="#">Home</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Brand</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Gallery</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><img src="img/gallery/r1.jpg" alt=""></li>
								<li><img src="img/gallery/r2.jpg" alt=""></li>
								<li><img src="img/gallery/r3.jpg" alt=""></li>
								<li><img src="img/gallery/r5.jpg" alt=""></li>
								<li><img src="img/gallery/r7.jpg" alt=""></li>
								<li><img src="img/gallery/r8.jpg" alt=""></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contact Us</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Head Office
								</p>
								<p>123, Main Street, Your City</p>

								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Phone Number
								</p>
								<p>
									+123 456 7890 <br>
									+123 456 7890
								</p>

								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									free@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
