<?php /** @var \App\Core\IAuthenticator $auth */ ?>

<div class="container-fluid">
    <div class="row ">
        <div class="col justify-content-center text-center">
            <div>
                Vitaj,<h2><strong><?= $auth->getLoggedUserName() ?></strong>!</h2><br>
                Táto časť aplikácie je prístupná len po prihlásení.
            </div>
        </div>
    </div>
</div>