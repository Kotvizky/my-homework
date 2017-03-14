<h1>Запретная зона, доступ только авторизированному пользователю</h1>
<h2>Информация выводится из списка файлов</h2>
<table class="table table-bordered">
    <tr>
        <th>Название файла</th>
        <th>Фотография</th>
        <th>Действия</th>
    </tr>
    {foreach from=$fileTable item=v}
    <tr>
        <td>{$v.name}</td>
        <td><img width="200" height="200" src="{$photos}/{$v.name}" alt=""></td>
        <td>
            <a href="{$homepage}/?act=delphoto&id={$v.name}">Удалить аватарку пользователя</a>
        </td>
    </tr>
    {/foreach}
</table>
