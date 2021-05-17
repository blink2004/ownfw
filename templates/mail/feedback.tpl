<p>Добрый день!</p>
<p>Меня зовут: <b>{$user.name|htmlspecialchars}</b>.</p>
<p>У меня к вам: <b>{$user.purpose|htmlspecialchars}</b>.</p>
<p>Сообщение: <br />{$user.message|htmlspecialchars}</p>
<p>Связаться со мной можно: <b>{$user.contact|htmlspecialchars|nl2br}</b>.</p>