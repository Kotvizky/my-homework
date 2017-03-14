<h1>Запретная зона, доступ только авторизированному пользователю</h1>
<h2>Информация выводится из базы данных</h2>
<table class="table table-bordered">
    <tr>
        <th>Пользователь(логин)</th>
        <th>Имя</th>
        <th>возраст</th>
        <th>описание</th>
        <th>Фотография</th>
        <th>Действия</th>
    </tr>
    {foreach from=$userTable item=v}
        <tr>
            <td>{$v.login}</td>
            <td>{$v.name}</td>
            <td>{$v.age}</td>
            <td>{$v.description}</td>
            <td> {if $v.photo!=""}
                    <div class="form-group">
                        <img  width="200" height="200" src="{$photos}/{$v.photo}" alt="">
                    </div>
                {/if}
            <td>
                <a href="{$homepage}/?act=deluser&id={$v.id}">Удалить пользователя</a>
            </td>
        </tr>
    {/foreach}
</table>
