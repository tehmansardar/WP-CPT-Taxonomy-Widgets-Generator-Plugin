<?php

/**
 * @package SkPlugin  
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        // Flush rewrtie rules
        flush_rewrite_rules();
    }
}
