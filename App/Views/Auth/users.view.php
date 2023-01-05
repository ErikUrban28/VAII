
<div class="container">
<?php
use App\Models\User;
/** @var User[] $data*/
/** @var \App\Core\IAuthenticator $auth */

foreach ($data as $user ){?>
    <div class="row novinka">
        <div class="col ">
            <h5>Login : <?= $user->getLogin()?></h5>
            <h5>Email : <?= $user->getEmail()?></h5>
        </div>
        <?php
        if($auth->isLogged()){ ?>
        <div class="row m-0 p-0">
            <div class="col-xl-12  justify-content-between d-flex mt-2">
                <div>
                    <a href="?c=auth&a=edit&id=<?= $user->getId() ?>" class="btn btn-danger " id="<?= $user->getLogin()."-edit"?>">Upravit</a>
                </div>

                <div>
                <a href="?c=auth&a=delete&id=<?= $user->getId()?>" class="btn btn-light " id="<?= $user->getLogin()."-delete"?>">Zmazat</a>
                </div>
            </div>
        </div>
            <?php }?>
    </div>
<?php }
?>