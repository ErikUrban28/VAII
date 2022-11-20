<div class="container  d-flex justify-content-center ">

    <div class="row justify-content-center  m-2">
        <div class="col align-self-center col-sm-9  col-xl-12  flex-wrap">
            <h1 class="display-1 mb-3 text-center">Registracia</h1>
            <form  method="post" action=""?c=auth&a=register">

                <div class="form-outline mb-4">
                    <input type="text" name="login" placeholder="Login" class="form-control">
                    <label class="form-label" for="registerUsername"></label>
                </div>


                <div class="form-outline mb-4">
                    <input type="email" name="registerEmail" placeholder="Email" class="form-control">
                    <label class="form-label" for="registerEmail"></label>
                </div>


                <div class="form-outline mb-4">
                    <input type="password" name="registerPassword" placeholder="Heslo" class="form-control">
                    <label class="form-label" for="registerPassword"></label>
                </div>


                <div class="form-outline mb-4">
                    <input type="password" name="registerRepeatPassword" placeholder="Opatovne zadajte heslo"
                           class="form-control">
                    <label class="form-label" for="registerRepeatPassword"> </label>
                </div>


                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked>
                    <label class="form-check-label" for="registerCheck">
                        Prečítal som si podmienky a súhlasím s nimi
                    </label>
                </div>


                <div class="row">
                    <button type="submit"name="submit" class="btn btn-primary btn-block reg">Registrovat</button>
                </div>

            </form>
        </div>
    </div>
</div>