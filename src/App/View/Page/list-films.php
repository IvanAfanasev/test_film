<h2>Фильмы</h2>


<div class="row">
    <div class="col-10">
        <? foreach ($data['films'] as $val) { ?>
            <h3><a href="/film/<?=$val['id']?>"><?= \Core\Component\Http\Request::cleanTeg($val['name']) ?></a></h3>
            Актеры: <?= \Core\Component\Http\Request::cleanTeg($val['actors']) ?><br>
            Год выпуска: <?= $val['year'] ?><br>
            Формат: <?= $val['film_format'] ?>
            <hr>
        <? } ?>
    </div>
    <div class="col-2">
        <h3>поиск</h3>
        <form action="/" method="post">
            <div class="form-group">
                <input type="text" name="find_film_name" placeholder="Название фильма" id="Email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-2">поиск по названию</button>
        </form>

        <form action="/" method="post">
            <div class="form-group">
                <input type="text" name="find_film_actor" placeholder="Актер" id="Email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-2">поиск по актеру</button>
        </form>
    </div>
</div>

