
<?php

/** @var Array $data */
?>
<div class="container  d-flex justify-content-center ">

    <div class="row justify-content-center  m-2">
        <div class="col align-self-center col-sm-9  col-xl-12  flex-wrap">
            <h1 class="display-1 mb-5 text-center">Prihlasenie</h1>

            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>

            <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                <div class="form-outline mb-4">
                    <input type="text" id="login-login" placeholder="Login" name="login" class="form-control" onkeyup="validateLoginLogin()">
                    <span id="login-login-error" class="lr"></span>
                    <label class="form-label" for="login"></label>
                </div>
                <div class="form-outline ">
                    <input name="password" type="password" id="login-password" class="form-control"  onkeyup="validatePasswordLogin()"
                           placeholder="Heslo" >
                    <span id="login-password-error" class="lr"></span>
                    <label class="form-label" for="password"></label>

                </div>

                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked>
                            <label class="form-check-label" for="form2Example31"> Zapamataj heslo </label>
                        </div>
                    </div>

                    <div class="col">
                        <a class="link" href="#">Zabudnute Heslo?</a>
                    </div>
                </div>

                <div class="row  ">

                    <button onclick="return validateLoginSubmit()" type="submit" name ="submit" class="btn btn-primary  mb-4 me-6 sign-in">Prihlasiť </button>
                    <span id="login-submit-error" class="lr"></span>
                </div>

                <div class="text-center text-nowrap">
                    <p>Nie si clenom? &emsp;<a class="link" href="?c=auth&a=register">Registracia</a></p>

                </div>

            </form>
        </div>
    </div>
</div>
