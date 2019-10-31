<?php
session_start();

define('ENVIRONMENT', 'development');
// define('ENVIRONMENT', 'production');

require_once('_functions/_cp_loader.php');
require_once('_functions/_cp_functions.php');
require_once('_functions/helpers.php');
require_once('_functions/default.php');
require_once('_functions/admin.php');
require_once('_functions/enqueue.php');
require_once('_functions/images.php');
require_once('_functions/acf.php');
require_once('_functions/yoast.php');
require_once('_functions/cpt.php');
