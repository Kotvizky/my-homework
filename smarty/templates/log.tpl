<div class="form-container">
    <form class="form-horizontal" action="http://homeworks/homework3.php"   method="POST" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input type="text"  name = "login" class="form-control" id="inputEmail3" placeholder="Логин">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password"   name = "password"  class="form-control" id="inputPassword3" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-lg-offset-2 col-sm-10 col-lg-10">
                <button type="submit" class="btn btn-default">Войти</button>
                <br><br>
                Нет аккаунта? <a href="{$homepage}/?act={$linkAction.reg}">Зарегистрируйтесь</a>
            </div>
        </div>
    </form>
</div>
