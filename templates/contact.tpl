<script src="public/js/jquery.js"></script>
<script src="public/js/jquery.mask.js"></script>
<script>
    // Mask example
    $( document ).ready(function(){
          $('#captcha').mask("ZZZZZ", {
              translation: {
                  'Z': {
                      pattern: /[\w]/,
                      optional: false
                  }
              }
          });
    });
</script>
<div>
    <h1>Contact page</h1>
    <div class="row">
        <div class="col-md-5 offset-col-1">
            <form method="post" action="{$server}?act=contact" enctype="multipart/form-data" name="feedback" id="feedback">
                <div class="mb-3">
                    <label for="user[theme]" class="form-label">Тема сообщения <span class="text-danger">*</span>:</label>
                    <select name="user[theme]" id="user[theme]" class="form-control" required>
                        <option value="">Выберите тему сообщения</option>
                        {foreach from=$themes key=$k item=$i}
                            <option value="{$i.value}" {if $user ne ''}{if $user.theme eq $i.value}selected="selected"{/if}{/if}>{$i.title}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user[name]" class="form-label">Ваше имя:</label>
                    <input type="text" name="user[name]" id="user[name]" class="form-control" value="{if $user ne ''}{$user.name}{/if}" placeholder="Ваше имя" />
                </div>
                <div class="mb-3">
                    <label for="user[contact]" class="form-label">Связаться с вами можно через:</label>
                    <input type="text" name="user[contact]" id="user[contact]" class="form-control" value="{if $user ne ''}{$user.contact}{/if}" placeholder="Контакты" />
                </div>
                <div class="mb-3">
                    <label for="user[message]" class="form-label">Текст сообщения <span class="text-danger">*</span>:</label>
                    <textarea name="user[message]" id="user[message]" class="form-control" placeholder="Текст сообщения" required minlength="10">{if $user ne ''}{$user.message}{/if}</textarea>
                </div>
                <div class="mb-3">
                    <label for="user[file]" class="form-label">Файл:</label>
                    <input type="file" name="user[file]" id="user[file]" class="form-control" placeholder="Путь к файлу" />{if $user ne ''}{$user.uploaded_file_name}{/if}
                </div>
                <div class="mb-3">
                    <img src="captcha.php?time={$smarty.now}" alt="Captcha" title="Кликните, чтобы обновить код" width="170" height="60" id="captcha-image" class="captcha" onclick="this.src = this.src.replace(/time=\d+/g, 'time=' + new Date().getTime());" />
                </div>
                <div class="mb-3">
                    <label for="captcha" class="form-label">Введите текст с картинки <span class="text-danger">*</span>:</label>
                    <input type="text" name="captcha" id="captcha" class="form-control text-center" value="" placeholder="Текст с картинки" required minlength="1" />
                </div>
                <div class="mb-3">
                    <input type="submit" id="submit" class="btn btn-primary" name="send_feedback" value="Отправить" />
                </div>
                <div class="mb-3">
                    Поля, отмеченные <span class="text-danger">*</span> - обязательны для заполнения.
                </div>
            </form>
        </div>
    </div>
</div>