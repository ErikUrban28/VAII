<div class="container-fluid">

    <div class="row m-2 d-flex justify-content-center">
        <div class="col-sm-8 col-md-5">
            <h1 class="display-1 text-center">Editacia</h1>

            <form method="post" action="?c=auth&a=register">
                <?php
                /** @var User $data */

                use App\Models\User;

                if ($data->getId()) { ?>
                    <input type="hidden" name="id" value="<?= $data->getId() ?>"
                <?php } ?>

                <div class="form-outline m-4">
                    <label class="d-block mt-3">
                        <input type="text" name="login" placeholder="Login" class="form-control"
                               value="<?= $data->getLogin() ?>">
                    </label>
                    <label class="d-block mt-3">
                        <input type="email" name="email" placeholder="Email" class="form-control"  value="<?= $data->getEmail() ?>">
                    </label>
                    <label class="d-block mt-3" >
                        <input type="password" name="password" placeholder="Heslo" class="form-control">
                    </label>
                    <button type="submit" name="submit" class="btn btn-primary btn-block reg mt-3">Editovat</button>
                </div>



            </form>
        </div>
    </div>
</div>


