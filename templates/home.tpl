<script src="public/js/jquery.js"></script>
<script src="public/js/jquery.mask.js"></script>
<script>
    {*
    // Mask example
    $( document ).ready(function(){
          $('#login).mask('00000');
    }
    *}
</script>
<div class="row">
    <div class="col-md-3 offset-col-1">
        <form method="post" action="{$server}" enctype="multipart/form-data" name="authorization">
            <div class="mb-3">
                <label for="login" class="form-label">Логин:</label>
                <input type="number" step="any" name="login" id="login" class="form-control text-center" value="{if $login!=''}{$login}{/if}" placeholder="Логин" />
            </div>
            <div class="mb-3">
                <img src="captcha.php?time={$smarty.now}" alt="Captcha" title="Кликните, чтобы обновить код" width="170" height="60" id="captcha-image" class="captcha" onclick="this.src = this.src.replace(/time=\d+/g, 'time=' + new Date().getTime());" />
            </div>
            <div class="mb-3">
                <label for="captcha" class="form-label">Введите текст с картинки:</label>
                <input type="text" name="captcha" id="captcha" class="form-control text-center" value="" placeholder="Текст с картинки" />
            </div>
            <div class="mb-3">
                <input type="submit" id="submit" class="btn btn-primary" name="user_login" value="Войти" />
            </div>
        </form>
    </div>
</div>
