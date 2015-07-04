<?php
/**
 * Plugin Name: Recent Posts Shortcode
 * Plugin URI: http://www.phil-hudson.com/recent-posts-shortcode-wordpress-plugin/
 * Version: 0.1
 * Author: Phil Hudson
 * Author URI: http://www.phil-hudson.com
 * License: GPL12
 */



function recentPosts($atts){

    $params = shortcode_atts( array(
        'amountOfPosts' => 1,
    ), $atts );

    $getpost = get_posts( array('number' => $params['amountOfPosts']) );

    $return = '';

    foreach ($getpost as $post) {

        $return .= "<div id=\"". $post->ID ."\"><h1 class=\"entry-title\">" . $post->post_title . "</h1><div class=\"entry-content\">" . $post->post_excerpt . "</div>";

        $return .= "<br /><a href='" . get_permalink($post->ID) . "'><em>read more →</em></a></div></br>";

    }

    return $return;

}
add_shortcode('recentPosts', 'recentPosts');