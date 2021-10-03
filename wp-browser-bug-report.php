<?php

/*
 * Plugin name: Example plugin
*/

add_filter('the_title', function ($title) {
    return strrev($title);
});