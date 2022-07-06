<h1><?=$data['film']['name']?></h1>

Актеры: <?= $data['film']['actors'] ?><br>
Год выпуска: <?= $data['film']['year'] ?><br>
Формат: <?= $data['film']['film_format'] ?>


<? if($data['remove_button']){ ?>
    <br><br>
    <a href="/remove-film/<?= $data['film']['id'] ?>" class="btn btn-danger">удалить фильм</a>
<?}?>


