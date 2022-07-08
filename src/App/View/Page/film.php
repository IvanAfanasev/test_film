<h1><?=\Core\Component\Http\Request::cleanTeg($data['film']['name'])?></h1>

Актеры: <?= \Core\Component\Http\Request::cleanTeg($data['film']['actors']) ?><br>
Год выпуска: <?= $data['film']['year'] ?><br>
Формат: <?= $data['film']['film_format'] ?>


<? if($data['remove_button']){ ?>
    <br><br>
    <a onclick="question()" class="btn btn-danger">удалить фильм</a>
<?}?>


<script>
    function question()
    {
        confirm("Вы уверены, что хотите удалить этот фильм?")?location.href="/remove-film/<?= $data['film']['id'] ?>":false;
    }
</script>

