A simple plugin to count post word
============

This plugin will count how many words in your post

Post word count will be shown below the post

Usage
=====


Word Count: User can add their own heading

Add this code into functions.php file in your theme

```php

function my_wordcount_heading($heading) {
	$heading = strtoupper($heading);
	// $heading = "Total Words";
	return $heading;
}
add_filter( 'wordcount_heading', 'my_wordcount_heading' );

```

Word Count: User can add their own tag

Add this code into functions.php file in your theme

```php

function my_wordcount_tag($tag) {
	$tag = "h4";
	return $tag;
}
add_filter( 'wordcount_tag', 'my_wordcount_tag' );

```

Reading Time Count: User can add their own heading

Add this code into functions.php file in your theme

```php

function my_wordcount_reading_time_heading($heading) {
	$heading = strtoupper($heading);
	// $heading = "Total Words";
	return $heading;
}
add_filter( 'wordcount_reading_time_heading', 'my_wordcount_reading_time_heading' );

```

Reading Time Count: User can add their own tag

Add this code into functions.php file in your theme

```php

function my_wordcount_reading_time_tag($tag) {
	$tag = "h4";
	return $tag;
}
add_filter( 'wordcount_reading_time_tag', 'my_wordcount_reading_time_tag' );

```