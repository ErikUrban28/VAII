
<div class="container">

    <?php
use App\Models\Article;
/** @var Article[] $data*/
/** @var \App\Core\IAuthenticator $auth */
?>
    <?php if($auth->isLogged()){ ?>
        <div class="row novinka text-center ">
            <a id ="insert_article" href="?c=articles&a=create" class="novinkyNadpisy h2" >Vytvor novy clanok </a>
        </div>
    <?php }
    ?>



<?php foreach ($data as $article) {?>
    <div class="row novinka">
        <div class="col-sm-12 col-lg-6">
            <img src="<?= $article->getImg()?>" class="img-fluid " alt="Obrazok <?= $article->getTitle()?>">
        </div>
        <div class="col ">
            <a href="#" class="novinkyNadpisy">
                <h1 class="display-6"><?= $article->getTitle()?></h1>
            </a>
            <p>
                <?= $article->getText()?>
            </p>

        </div>

        <?php
        if($auth->isLogged()){ ?>
        <div class="row m-0 p-0">
            <div class="col-xl-12  justify-content-between d-flex mt-2">
                <div>
                    <a href="?c=articles&a=edit&id=<?= $article->getId() ?>" class="btn btn-danger <?= $article->getTitle() . "-edit"?>"   id="<?= $article->getId()."-edit"?>">Upravit</a>
                </div>

                <div>
                <a href="?c=articles&a=delete&id=<?= $article->getId()?>" class="btn btn-light <?= $article->getTitle() . "-del"?>" id="<?= $article->getId()."-delete"?>">Zmazat</a>
                </div>



            </div>
        </div>
            <?php }?>
    </div>
<?php }
?>

</div>








