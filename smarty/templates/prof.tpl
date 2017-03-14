<div class="form-container">
    <form class="form-horizontal" name="profile" enctype="multipart/form-data"  method="POST" >
        <div class="form-group">
            <label class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <h3>{$userProf.login}<h3>
            </div>
        </div>
        {if $userProf.photo!=""}
        <div class="form-group">
            <img src="{$photos}/{$userProf.photo}" alt="">
        </div>
        {/if}
        <div class="form-group">
            <label for="userName" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" name = "userName" class="form-control" id="userName" value="{$userProf.name}" placeholder="Имя">
            </div>
        </div>
        <div class="form-group">
            <label for="bdate" class="col-sm-2 control-label">Дата рождения</label>
            <div class="col-sm-10">
                <input type="date" name = "age" class="form-control" id="bdate" value="{$userProf.age}" placeholder="Дата рождения">
            </div>
        </div>
        <div class="form-group">
            <label for="descr" class="col-sm-2 control-label">Описание</label>
            <div class="col-sm-10">
                <textarea rows="3" cols="45" name = "description" class="form-control" id="descr" >{$userProf.description}</textarea>
            </div>
        </div>
        <div class="form-group">
            {*<label class="btn btn-default btn-file">*}
            {*</label>*}
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
            <input type="file" name = "userFile" hidden>

            {*<label for="descr" class="col-sm-2 control-label">Описание</label>*}
            {*<div class="col-sm-12  control-label">*}
                {*<input  type="file" name = "userFile" class="form-control" id="userFile" >*}
            {*</div>*}
        <div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Записать</button>
            </div>
        </div>
    </form>
</div>