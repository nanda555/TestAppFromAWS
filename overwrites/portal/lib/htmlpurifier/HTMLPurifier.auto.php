<?php

/**
 * This is a stub include that automatically configures the include path.
 */
// OVERWRITE
// Ron Stewart 01/07/2011, HTMLPurifier.auto.php is not compatible with Symfony 1.4 so
// this overwrite allows symfony to handle loading everything.
ProjectConfiguration::registerHTMLPurifier();
// REPLACES
//set_include_path(dirname(__FILE__) . PATH_SEPARATOR . get_include_path() );
//require_once 'HTMLPurifier/Bootstrap.php';
//require_once 'HTMLPurifier.autoload.php';
// END OVERWRITE
// vim: et sw=4 sts=4
