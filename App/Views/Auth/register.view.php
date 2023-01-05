<div class="container  d-flex justify-content-center ">
<?php /** @var Array $data */?>
    <div class="row justify-content-center  m-2">
        <div class="col align-self-center col-sm-9  col-xl-12  flex-wrap">
            <h1 class="display-1 mb-3 text-center">Registracia</h1>
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <form  method="post" action="?c=auth&a=register">
                <div class="form-outline mb-4">
                    <label class="d-block">
                        <input type="text" name="login" placeholder="Login" class="form-control" id="register-login" onkeyup="validateRegisterLogin()">
                        <span id="register-login-error" class="lr"></span>
                    </label>

                </div>


                <div class="form-outline mb-4">
                    <label class="d-block">
                        <input type="email" name="email" placeholder="Email" class="form-control" id="register-email" onkeyup="validateEmail()">
                        <span id="register-email-error" class="lr"></span>
                    </label>
                </div>


                <div class="form-outline mb-4">
                    <label class="d-block">
                        <input type="password" name="password" placeholder="Heslo" class="form-control" id="register-password" onkeyup="validatePasswordRegister()">
                        <span id="register-password-error" class="lr"></span>
                    </label>
                </div>

                <div class="row">
                    <button onclick="return validateRegisterSubmit()" type="submit" name="submit" class="btn btn-primary btn-block reg">Registrovat</button>
                    <span id="register-submit-error" class="lr"></span>
                </div>

            </form>
        </div>
    </div>
</div>


