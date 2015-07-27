<?php
/**
 * Password Reser module template file
 *
 * Copy this file to your templates folder.
 */

// You just need to add the controller on the template page...
$content = $modules->get('PasswordReset')->controller();
// or echo it based on your needs echo $modules->get('Pass...

// ... and load the scripts using $modules->get('PasswordReset')->getScripts();