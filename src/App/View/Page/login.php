<div class="row">
    <div class="col-4 offset-4">
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Войти</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Регистрация</button>
            </div>
        </nav>
        <br>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <form action="/user_login" method="post">
                    <div class="form-group">
                        <label for="Email"> Email</label>
                        <input type="text" name="Email" placeholder="Email" id="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Password"> Пароль</label>
                        <input type="password" name="Password" placeholder="Пароль" id="Password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Войти</button>
                </form>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <form action="/user_registration" method="post">
                        <div class="form-group">
                            <label for="Name">Имя</label>
                            <input type="text" name="Name" placeholder="Имя" id="Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Email"> Email</label>
                            <input type="text" name="Email" placeholder="Email" id="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Password"> Пароль</label>
                            <input type="password" name="Password" placeholder="Пароль" id="Password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>