<?php
/*
 * Plugin Name:       Word Count
 * Plugin URI:        https://hasan4web.com/plugins/word-count/
 * Description:       Count post word
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hasan Ali
 * Author URI:        https://hasan4web.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       word-count
 * Domain Path:       /languages
 */

/**
 * Activation Hook
 */
function wordcount_activation_hook() {

}
register_activation_hook( __FILE__, 'wordcount_activation_hoo' );

/**
 * Deactivation Hook
 */
function wordcount_deactivation_hook() {

}
register_deactivation_hook( __FILE__, 'wordcount_deactivation_hook' );

/**
 * Load Text Domain
 */
function wordcount_load_textdomain() {
    load_plugin_textdomain( 'word-count', false, dirname(__FILE__) . '/languages' );
}
add_action( 'plugins_loaded', 'wordcount_load_textdomain' );

/**
 * Word Count
 */
function wordcount_count_words( $content ) {
    $stripped_content = strip_tags( $content );
    $word_count = str_word_count( $stripped_content );
    $label = __( 'Total Number of Words', 'word-count' );

    $label = apply_filters( 'wordcount_heading', $label );
    $tag = apply_filters( 'wordcount_tag', 'h2' );
    $content .= sprintf( '<%s>%s: %s</%s>', $tag, $label, $word_count, $tag );

    return $content;
}
add_filter( 'the_content', 'wordcount_count_words' );

/**
 * Count Reading Time
 */
function wordcount_reading_time( $content ) {
    $stripped_content   = strip_tags( $content );
    $word_count         = str_word_count( $stripped_content );
    $reading_minutes    = floor( $word_count / 200 );
    $reading_seconds    = floor( $word_count % 200 / ( 200 / 60 ) );
    $is_visible = apply_filters( 'wordcount_display_reading_time', 1 );
    if($is_visible) {
        $label = __( 'Total Reading Time', 'word-count' );
        $label = apply_filters( 'wordcount_reading_time_heading', $label );
        $tag = apply_filters( 'wordcount_reading_time_tag', 'h2' );
        $content .= sprintf( '<%s>%s: %s minutes %s seconds</%s>', $tag, $label, $reading_minutes, $reading_seconds, $tag );
    }
    return $content;
}
add_filter( 'the_content', 'wordcount_reading_time' );