<!DOCTYPE html>
<html lang="{$lang}" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Own Framework - Базовый шаблон</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <style>
            {literal}
            body {margin: 0 50px;}
            main {display: none;}
            footer p {height: 100px; margin-top: 30px;}
            .captcha {cursor: pointer;}
            form[name=profit] {margin-top: 30px;}
            .top-menu {background-color: black; padding: 5px 10px;}
            .top-menu a {color: chartreuse;}
            {/literal}
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                document.getElementsByTagName('main')[0].style.display = 'block';
            });
        </script>
    </head>
    <body>
        <header>
            <div class="top-menu">
                <a href="?">Home</a> |
                <a href="?act=about">About</a> |
                <a href="?act=contact">Contact</a>
            </div>
            <h1>Index page</h1>
            <div>Hello Smarty!</div> World and <b>{$name}</b> with
            <noscript>
                <p>Ваш браузер не поддерживает JavaScript! Для корректной работы рекомендуем включить JavaScript в настройках или скачать один из популярных браузеров или:</p>
                <ul>
                    <li>Chrome</li>
                    <li>Firefox</li>
                    <li>Opera</li>
                    <li>Safari</li>
                    <li>MicroSoft Edge</li>
                </ul>
            </noscript>
        </header>

        <main>
            <div>
                {if $sms_sent_result!=''}
                    <div>Your SMS was sent: <b>{$sms_sent_result}.</b></div>
                {/if}
            </div>

            {if $alert!=''}
            <div class="alert alert-{$alert.type} alert-dismissible fade show" role="alert">
                <strong>{$alert.title}</strong> {$alert.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            {/if}

            <div class="container">
                {include file="$content.tpl"}
            </div>
            <div>
                <h2>About us</h2>
                <div>Мы не являемся государственной или комерческой организацией. Мы - группа интузиастов, изобретателей и аматоров.</div>
            </div>
        </main>

        <footer class="text-center">
            <p>&copy; {'Y'|date}, <a href="http://www.site.com">Company Name</a>, All rights reserved.</p>
        </footer>
    </body>
</html>
