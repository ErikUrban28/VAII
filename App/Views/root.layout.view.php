<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>

    <title><?= \App\Config\Configuration::APP_NAME ?></title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">

    <title><?= \App\Config\Configuration::APP_NAME ?></title>
</head>
<body>
<div class="container-fluid  ">
    <div class="row ">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#n_bar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="n_bar">

                <div class="col d-flex justify-content-around">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="?c=home">Domov</a></li>
                    <li class="nav-item"><a class="nav-link" href="?c=home&a=about">Autor</a></li>
                    <li class="nav-item"><a class="nav-link" href="?c=articles&a=articles">Clanky</a></li>
                    <li class="nav-item"><a class="nav-link registracia"
                                            href="?c=auth&a=register">Registracia</a></li>
                    <?php if ($auth->isLogged()) { ?>
                        <li class="nav-item"><a class="nav-link odhlasenie"href="?c=auth&a=logout">Odhlásenie</a></li>
                        <li class="nav-item"><a class="nav-link odhlasenie"href="?c=auth&a=users">Pouzivatelia</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link prihlasenie" href="?c=auth">Prihlasenie</a></li>
                    <?php } ?>
                </ul>
        </nav>
        </div>
    </div>
</div>
<?= $contentHTML ?>
</body>
</html>
