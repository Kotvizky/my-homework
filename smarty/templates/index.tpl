<!doctype html>
<html>
    {include file = 'head.tpl'}
<body>
    {include file = 'nav.tpl'}
    {if $warning != ""} {include file = "warn.tpl" }{/if}
    <div class="container">
        {if $indexAction =='reg'}
            {include file = 'reg.tpl'}
        {elseif $indexAction =='users'}
            {include file = 'users.tpl'}
        {elseif $indexAction =='prof'}
            {include file = 'prof.tpl'}
        {elseif $indexAction =='file'}
            {include file = 'file.tpl'}
        {else }
            {include file = 'log.tpl'}
        {/if}
    </div><!-- /.container -->
    {include 'js.tpl'}
</body>
</html>
