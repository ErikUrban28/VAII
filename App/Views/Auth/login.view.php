<?php
//$layout = 'auth';
/** @var Array $data */
?>
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">-->
<!--            <div class="card card-signin my-5">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title text-center">Prihlásenie</h5>-->
<!--                    <div class="text-center text-danger mb-3">-->
<!--                        --><?//= @$data['message'] ?>
<!--                    </div>-->
<!--                    <form class="form-signin" method="post" action="--><?//= \App\Config\Configuration::LOGIN_URL ?><!--">-->
<!--                        <div class="form-label-group mb-3">-->
<!--                            <input name="login" type="text" id="login" class="form-control" placeholder="Login"-->
<!--                                   required autofocus>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-label-group mb-3">-->
<!--                            <input name="password" type="password" id="password" class="form-control"-->
<!--                                   placeholder="Password" required>-->
<!--                        </div>-->
<!--                        <div class="text-center">-->
<!--                            <button class="btn btn-primary" type="submit" name="submit">Prihlásiť-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="container  d-flex justify-content-center ">

    <div class="row justify-content-center  m-2">
        <div class="col align-self-center col-sm-9  col-xl-12  flex-wrap">
            <h1 class="display-1 mb-5 text-center">Prihlasenie</h1>



            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>



            <form>

                <div class="form-outline mb-4">
                    <input type="text" id="login" placeholder="Login" name="login" class="form-control"required autofocus>
                    <label class="form-label" for="login"></label>

                </div>





                <div class="form-outline ">
                    <input name="password" type="password" id="password" class="form-control"
                           placeholder="Heslo" required>
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

                    <button type="submit" name ="submit" class="btn btn-primary  mb-4 me-6 sign-in">Prihlasenie </button>
                </div>

                <div class="text-center text-nowrap">
                    <p>Nie si clenom? &emsp;<a class="link" href="register.html">Registracia</a></p>

                </div>

            </form>
        </div>
    </div>
</div>