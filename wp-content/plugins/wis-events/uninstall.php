<?php
// If uninstall not called from WordPress exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

// We can extend removal of plugin function however we want such as remove all posts etc etc