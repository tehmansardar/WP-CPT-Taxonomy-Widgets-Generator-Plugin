<?php

/**
 * @package SkPlugin  
 */
class SkPluginActivate
{
    public static function activate()
    {
        // Flush rewrtie rules
        flush_rewrite_rules();
    }
}
