<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{$homepage}">{$brand}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" data-action = "{if $menuAction!=""}{$homepage}/?act={$menuAction}{else}{$homepage}{/if}">
            <ul id="main-menu" class="nav navbar-nav">
                <li ><a href="{$homepage}">Авторизация</a></li>
                <li><a href="{$homepage}/?act={$linkAction.reg}">Регистрация</a></li>
                {if $login!=""}
                    <li><a href="{$homepage}/?act={$linkAction.prof}">Профиль</a></li>
                    <li><a href="{$homepage}/?act={$linkAction.user}">Пользователи</a></li>
                    <li><a href="{$homepage}/?act={$linkAction.file}">Файлы</a></li>
                    <li><a href="{$homepage}/?act={$linkAction.logoff}">Выход</a></li>
                {/if}
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
