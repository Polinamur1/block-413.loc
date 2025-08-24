<?
global $db;

$title = 'Blog Home';
$header = 'Recent posts';

$sql = "SELECT * FROM `posts` ORDER BY `post_id` DESC";
$posts = $db->query($sql)->findAll();

$most_popular_posts = $posts;


require_once POSTS_VIEWS.'\index.tmpl.php';
?>