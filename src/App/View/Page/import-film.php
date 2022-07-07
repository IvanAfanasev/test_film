<h1>Импорт фильмов из текстового файла</h1>

<form enctype="multipart/form-data" action="/load_file_film" method="post">
    <div class="form-group">
        <label for="file_film">Выберите файл для импорта</label>
        <input name="file" type="file"  class="form-control-file" id="file_film" required>
    </div>
    <button type="submit" class="btn btn-success mt-2">импорт</button>
</form>