<?php
    if (defined('WP_DEBUG') && false === WP_DEBUG && !is_user_logged_in()) {
        ob_start("minifier");
    }
    function minifier($code) {
        $search = array(
            
            // Remove whitespaces after tags
            '/\>[^\S ]+/s',
            
            // Remove whitespaces before tags
            '/[^\S ]+\</s',
            
            // Remove multiple whitespace sequences
            '/(\s)+/s',
            
            // Removes comments
            '/<!--(.|\s)*?-->/'
        );
        $replace = array('>', '<', '\\1');
        $code = preg_replace($search, $replace, $code);
        return $code;
    }
