<?php
require_once '../config/config.php'; // Подключаем конфигурацию
require_once DB_CONFIG; // Подключаем базу данных
require_once COMPONENTS . '/header.php'; // Подключаем заголовок с использованием константы

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = htmlspecialchars(trim($_POST['login']));
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $email = htmlspecialchars(trim($_POST['email']));

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ? OR email = ?");
        $stmt->execute([$login, $email]);

        if ($stmt === false) {
            echo "Ошибка выполнения запроса: " . implode(", ", $pdo->errorInfo());
            exit();
        }

        if ($stmt->rowCount() > 0) {
            echo "Логин или email уже заняты.";
        } else {
            $insertStmt = $pdo->prepare("INSERT INTO users (login, password, email) VALUES (?, ?, ?)");
            $result = $insertStmt->execute([$login, $password, $email]);

            if ($result === false) {
                echo "Ошибка при регистрации пользователя: " . implode(", ", $insertStmt->errorInfo());
            } else {
                echo "Регистрация прошла успешно!";
            }
        }

    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}

require_once VIEWS . '/users/register.tmpl.php';
require_once COMPONENTS . '/footer.php'; // Подключаем подвал с использованием константы
?>