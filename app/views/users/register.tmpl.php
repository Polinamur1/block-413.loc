<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Регистрация</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Регистрация</h2>
    <form action="../../controllers/users/register.php" method="post" class="mt-4"> 
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
    </form>

</div>
</body>
</html>