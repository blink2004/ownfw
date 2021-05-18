<p>Добрый день!</p>
<p>Меня зовут: <b>{$user.name|htmlspecialchars}</b>.</p>
<p>Тема сообщения: <b>{$user.purpose|htmlspecialchars}</b>.</p>
<p>Сообщение: <br />{$user.message|htmlspecialchars}</p>
{if $user.uploaded_file_name ne ''}<p>Прикреплённый файл: <b>{$user.uploaded_file_name}</b></p>{/if}
<p>Связаться со мной можно: <b>{$user.contact|htmlspecialchars|nl2br}</b>.</p>