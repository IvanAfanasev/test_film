<h1>Добавление фильма</h1>


<form action="/add-film" method="post">

    <div class="form-group">
        <label for="Name">Название фильма</label>
        <input type="text" name="Name" placeholder="Название фильма" id="Name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="Year">Год выпуска</label>
        <select class="form-select" name="Year" required>
            <? for ($i = 2022; $i >= 1895; $i--) {?>
                <option value="<?=$i?>"><?=$i?></option>
            <?} ?>
        </select>
    </div>

    <div class="form-group">
        <label for="Format">Формат </label>
        <select class="form-select" name="Format" required>
            <? foreach ($data['film-format'] as $val) {?>
                <option value="<?=$val['id']?>"><?=$val['name']?></option>
            <?} ?>
        </select>
    </div>

    <div class="form-group">
        <label for="Actors">Список актеров</label>
        <textarea name="Actors" id="Actors" class="form-control" placeholder="Audrey Hepburn, Cary Grant, Walter Matthau" required></textarea>
    </div>

    <button type="submit" class="btn btn-success mt-2">добавить</button>
</form>