<?php
//nevigation

add_action('init', 'test_nav');

function test_nav(){

	 /*
	 it is best to use register_nav_menus() even for single nav manu 
	 because register_nav_menu() function takes two parameters and not in array format, so it might get confused
    */
   register_nav_menus(array('primary' => __('Main Menu')));

}