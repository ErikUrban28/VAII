
<div class="container">
<?php
use App\Models\Article;
/** @var Article[] $data*/
foreach ($data as $article) {?>
    <div class="row novinka">
        <div class="col-sm-12 col-lg-6">
            <img src="<?= $article->getImg()?>" class="img-fluid " alt="Autor">
        </div>
        <div class="col ">
            <a href="#" class="novinkyNadpisy">
                <h1 class="display-6"><?= $article->getTitle()?></h1>
            </a>
            <p>
                <?= $article->getText()?>
            </p>
        </div>
    </div>
<?php }
?>
</div>








