<div class="container">
<form action="?c=articles&a=store" method="post" enctype="multipart/form-data">
    <?php
    /** @var \App\Models\Article $data */
    if ($data->getId()){ ?>
    <input type="hidden" name="id" value="<?= $data->getId()?>"
    <?php }?>
    <label>
    <input type="text" name="title" placeholder="Nazov" value="<?= $data->getTitle()?>">
    </label>
    <br><br>
    <label>
        <textarea rows="5" cols="60" name="text" placeholder="Zadaj text" >
            <?= $data->getText()?>
        </textarea>
    </label>
    <br><br>
    <label>Vyber obrazok na ulozenie:
    <input type="file" name="img">
    <input type="submit" value="Odoslat" name="submit">
    </label>
</form>
</div>