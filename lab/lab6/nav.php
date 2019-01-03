<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Personal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>    	
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
		<link rel="profile" href="http://gmpg.org/xfn/11">
		     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<style>
			header {
			    padding-bottom: 0px;
				margin: 0px;
			}
			.back-g {
				style="padding-bottom:25px; padding-top:25px; background-image: url("https://montereychineseassociation.org/wp-content/uploads/2018/12/header-background.jpg");
				background-repeat: no-repeat; /* Do not repeat the image */
				background-size: cover; /* Resize the background image to cover the entire container */
			}
			
			h1 {
				padding-top: 35px;
				padding-bottom:5px;
				margin-top: 0px;
				text-align: center;
				font-family: 'Pacifico', cursive;
				font-size: 3em;
				margin-bottom: 0px;
				text-shadow: 3px 3px 15px #F5F5DC;

			}
			h2{
				text-align: center;
				
				font-size: 3em;
				text-shadow: 3px 3px 15px #F5F5DC;

		</style>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blog-personal' ); ?></a>

			<?php $blog_personal_header_layout = blog_personal_get_option( 'header_layout' );	
			$header_image = get_header_image(); 
			$enable_media = blog_personal_get_option( 'enable_media' );
			$enable_search = blog_personal_get_option( 'enable_search' );?>
			<header id="masthead" class="site-header site-<?php echo esc_attr( $blog_personal_header_layout);?>" >
				<div class="hgroup-wrap"  style="background-image:url( <?php echo esc_url( $header_image );?> )">

					<div class="container">
					<div>
						<div style="float:left; width:25%; margin-left:45px;">
						<img src="https://montereychineseassociation.org/wp-content/uploads/2018/07/logo-1-e1533762461749.jpg" alt="logo" style="height: 120px;"><br /> <br />
						
						
						</div>
						<div style="padding-left:15px; ">
						<h1>蒙特雷湾华人协会</h1>
       					 <h2>MONTEREY BAY CHINESE ASSOCIATION</h2>
																			
						</div>
						</div>
						<div id="navbar" class="navbar">  <!-- navbar starting from here -->

							<nav id="site-navigation" class="navigation main-navigation">
								<?php if ( true == $enable_media ): 
									if ( has_nav_menu( 'social-media' ) ) { ?>
										<div class="thumb-icon">
											<a href="#" target="_self"><i class="fa fa-thumbs-o-up"></i></a>
											<?php wp_nav_menu( array(
												'theme_location'  => 'social-media',
												'container_class' => 'block-social-icons social-links',					
												'depth'           => 1,
												'fallback_cb'     => false,

												) ); 
											?>
										</div>
									<?php } 
								endif; ?>

								<div class="menu-content-wrapper">									
					        		<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',				
												'container_class' => 'menu-top-menu-container',
					            				'items_wrap' => '<ul>%3$s</ul>',
												'fallback_cb'    => 'wp_page_menu',
												)
											);
									?>									
								</div>

							</nav>

							<?php if ( true == $enable_search ):  ?>
								<div class="search-icon">
									<a href="javascript:void(0)" title="Search">
										<i class="fa fa-search"></i>
									</a>
								</div>
							<?php endif; ?>

	</div> <!-- navbar ends here -->				

					
				</div>

				<div class="search-section">
					<div class="search-container">
						<div class="close-icon">
							<span><?php esc_html_e( 'X', 'blog-personal' ); ?></span>
						</div>
						<form role="search" method="get" class="search-header" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'blog-personal' ); ?>" value="<?php echo get_search_query(); ?>" name="s" type="search" autocomplete="off">
							</label>
							<div class="search-divider"></div>
							<h5 classs="text-filed"><?php esc_html_e( 'Type to search', 'blog-personal' ); ?></h5>
						</form><!-- .search-form -->					
					</div>
				</div>
	
				<?php
				/**
				 * Hook - blog_personal_action_header.
				 *
				 * @hooked blog_personal_slider - 10
				 * 
				 */
				do_action( 'blog_personal_action_header' );
				?>

	
			</header><!-- #masthead -->

			<div id="content" class="site-content">
				<div class="container">
					<div class="row">
