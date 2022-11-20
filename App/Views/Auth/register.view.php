<div class="container  d-flex justify-content-center ">

    <div class="row justify-content-center  m-2">
        <div class="col align-self-center col-sm-9  col-xl-12  flex-wrap">
            <h1 class="display-1 mb-3 text-center">Registracia</h1>
            <form  method="post" action="?c=auth&a=store">
                <div class="form-outline mb-4">
                    <label class="d-block">
                        <input type="text" name="login" placeholder="Login" class="form-control">
                    </label>

                </div>


                <div class="form-outline mb-4">
                    <label class="d-block">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </label>
                </div>


                <div class="form-outline mb-4">
                    <label class="d-block">
                        <input type="password" name="password" placeholder="Heslo" class="form-control">
                    </label>
                </div>

                <div class="row">
                    <button type="submit"name="submit" class="btn btn-primary btn-block reg">Registrovat</button>
                </div>

            </form>
        </div>
    </div>
</div>


