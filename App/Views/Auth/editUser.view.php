<div class="container-fluid">

    <div class="row m-2 d-flex justify-content-center">
        <div class="col-sm-8 col-md-5">
            <h1 class="display-1 text-center">Editacia</h1>

            <form method="post" action="?c=auth&a=store">
                <?php
                /** @var User $data */

                use App\Models\User;

                if ($data->getId()) { ?>
                    <input type="hidden" name="id" value="<?= $data->getId() ?>"
                <?php } ?>

                <div class="form-outline m-4">
                    <input type="text" name="login" placeholder="Login" class="form-control"
                           value="<?= $data->getLogin() ?>">
                    <label class="form-label" for="login"></label>
                    <input type="email" name="email" placeholder="Email" class="form-control"
                           value="<?= $data->getEmail() ?>">
                    <label class="form-label" for="email"></label>
                    <input type="password" name="password" placeholder="Heslo" class="form-control">
                    <label class="form-label" for="password"></label>
                    <input type="password" name="pepeatPassword" placeholder="Opatovne zadajte heslo"
                           class="form-control">

                </div>
                <div class="row justify-content-end ">
                    <div class="col-sm-8 col-md-5 justify-content-end">
                        <label class="form-label " for="RepeatPassword"> </label>
                        <button type="submit" name="submit" class="btn btn-primary btn-block reg m-4 ">Editovat</button>
                    </div>

                </div>



            </form>
        </div>
    </div>
</div>


