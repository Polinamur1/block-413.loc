<?
// карта маршрутов
// $routes = [
//     '' => 'index.php',
//     'index.php' => 'index.php',
//     'index' => 'index.php',
//     'contacts' => 'contacts.php',
//     'posts' => 'show.php',
//     'create' => 'create.php',
//     'store' => 'create.php',
// ];



// POSTS
// $router->get("posts", "/posts/index.php");
$router->get("", "/posts/index.php"); // главная

$router->get("posts", "/posts/show.php"); // 1 из ресурсов
$router->get("posts/create", "/posts/create.php"); // форма создания нового ресурса
$router->post("posts", "/posts/store.php");
$router->get("posts/edit", "/posts/edit.php");
$router->delete("posts", "/posts/destroy.php");


$router->get("contacts", "/contacts.php");
// USERS
$router->get('register', 'users/register.php');
// $router->post('register', 'users/register.php');

// Verb   URI                  Action          Route Name
// GET  /photos                 index          photos.index
// GET  /photos/create          create         photos.create
// POST /photos                   store          photos.store
// GET  /photos/{photo}         show           photos.show
// GET  /photos/{photo}/edit    edit            photos.edit
 
// PUT/PATCH    /photos/{photo} update          photos.update
// DELETE   /photos/{photo}                     destroy photos.destroy