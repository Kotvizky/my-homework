<div class="form-container">
    <form class="form-horizontal"  method="POST" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" name = "password1" class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
            <div class="col-sm-10">
                <input type="password" name = "password2" class="form-control" id="inputPassword4" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                <br><br>
                Зарегистрированы? <a href={$homepage}>Авторизируйтесь</a>
            </div>
        </div>
    </form>
</div>
