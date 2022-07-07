<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mb-md-0" style="float: right">
                <li><a href="/" class="nav-link px-2 text-white">Фильмы</a></li>
                <?if(!\Core\Component\User\Authentication::isLogin()){?>
                    <li><a href="/login" class="nav-link px-2 text-white">Авторизация</a></li>
                <?}else{ ?>
                    <li><a href="/new-film" class="nav-link px-2 text-white">Добавить фильм</a>
                    <li><a href="/import" class="nav-link px-2 text-white">Импортировать фильмы</a></li>
                    <li><a href="/logout" class="nav-link px-2 text-white ">Выйти</a></li>
                <?}?>
            </ul>
        </div>
    </div>
</header>

<div class="container mt-5">
    <? if(is_array($messages) and isset($messages['error'])){ ?>
    <div class="alert alert-danger">
        <ul>
            <? foreach ($messages['error'] as $error){
                    echo "<li>$error</li>";
                } ?>
        </ul>
    </div>
    <? } ?>
    <?php
    include('src/App/View/Page/' . $page . '.php');
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
