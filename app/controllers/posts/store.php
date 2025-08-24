<?

global $db;

require_once CLASSES ."\Validator.php";
$title = $header = "New post";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $title = $_POST['title'];
    // $descr = $_POST['descr'];
    // $content = $_POST['content'];


    $fillable = ['title', 'descr', 'content']; //массив имен полей, которые могут заполняться
    // $errors = []; //ошибки валидации
    $data = loadRequestData($fillable);
    $rules = [
        'title' => [
            'required' => true,
            'min' => 3, 
            'max' => 50,
        ],
        'descr' => [
            'required' => true, 
            'min' => 5, 
            'max' => 50,
        ],
        'content' => [
            'required' => true, 
            'min' => 5,
        ],
        'email' => [
            'email' => true,
        ],
        'password' => [
            'required' => true,
            'min' => 6,
        ],
        'password_confirm' => [
            'match' => 'password',
        ],
    ];
    $test = [
        'title' => 'Adffdd fdfdfdsf fdfd',
        'excerpt' => 'yjjujhgvvvvvvvvvvvvfd',
        'content' => 'Adffdd fdfdfdsf fdfdAdffdd fdfdfdsf fdfd',
        'email' => 'mail@mail.com',
        'password' => '123456',
        'password_confirm' => '123456',
    ];
    $validator = new Validator();
    // $validator->validate($data, $rules);
    $validator->validate($test, $rules);


    // if($validator->hasErrors()) { 
    //      $errors = $validator->getErrors();
    // }



    if(!$validator->hasErrors()) {
        $sql = "INSERT INTO `posts`(`title`, `slug`, `descr`, `content`) VALUES (?,?,?,?)";
        $data['slug'] = str_replace(" ", "-",$data['title']);
        
        if($db->query($sql, [$data['title'], $data['slug'], $data['descr'], $data['content']])){
            $_SESSION['success'] = "Post created";
            redirect(PATH);
        }
        else {
            $_SESSION['warning'] = "Server Error";
            redirect();
        }
    }
}