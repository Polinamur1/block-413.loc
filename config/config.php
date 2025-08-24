<?
define('ROOT', dirname(__DIR__));
define("PATH", "https://block-413.loc");

define("APP", ROOT . '/app');
define("VIEWS", APP . '/views');
define("CONTROLLERS", APP . '/controllers');
define("COMPONENTS", VIEWS . '/components');
define("POSTS_VIEWS", VIEWS . '/posts');

define("CONFIG", ROOT . '/config');

define("CORE", ROOT . '/core');
define("CLASSES", CORE . '/classes');

define("PUBLIC", ROOT . '/public');


define("DB_CONFIG", CONFIG . '/db.php');
define("VALIDATOR_CLASS", CLASSES . '/Validator.php');
define("HEADER_VIEW", COMPONENTS . '/header.php');
define("FOOTER_VIEW", COMPONENTS . '/footer.php');
