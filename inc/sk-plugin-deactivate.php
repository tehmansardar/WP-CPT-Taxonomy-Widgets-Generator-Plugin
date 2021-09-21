<?php

/**
 * @package SkPlugin  
 */

class SkPluginDeactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
