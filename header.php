<!DOCTYPE html>
<html >
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; <?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
/*
* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;
 

 wp_title( '|', true, 'right' );
// Add the blog name.
bloginfo( 'name' );
 
// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
echo " | $site_description";
 
// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
echo ' | ' . sprintf( __( 'Page %s', 'testwordpress' ), max( $paged, $page ) );
 
?></title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<p><?php bloginfo('description'); ?></p>
			</div>
		</div>
	</div>
	
	<!-- end #header -->
	
		<?php
             wp_nav_menu(array(
                'menu' => 'Main Menu',
                'location' => 'primary',
                'container' => 'div',
                'container_id' =>'menu',


             	));

		 ?>

	
	<!-- end #menu -->