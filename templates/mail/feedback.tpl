<p>Добрый день!</p>
{if $user.name}<p>Меня зовут: <b>{$user.name|strip_tags|htmlspecialchars}</b>.</p>{/if}
<p>Сообщение: <br />{$user.message|strip_tags|htmlspecialchars}</p>
{if $user.uploaded_file_name ne ''}<p>Прикреплённый файл: <b>{$user.uploaded_file_name}</b></p>{/if}
{if $user.contact}<p>Связаться со мной можно: <b>{$user.contact|strip_tags|htmlspecialchars|nl2br}</b>.</p>{/if}