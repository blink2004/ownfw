<!DOCTYPE html>
<html>
    <head>
        <title>Own Framework - Базовый шаблон</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <style type="text/css">
            {literal}
            body {margin: 0 50px;}
            footer p {height: 100px; margin-top: 30px;}
            .captcha {cursor: pointer;}
            form[name=profit] {margin-top: 30px;}
            {/literal}
        </style>
    </head>
    <body>
        <header>
            <h1>Index page</h1>
            <div>Hello World and <b>{$name}</b> with Smarty!</div>
            <a href="?">Home</a> |
            <a href="?act=about">About</a> |
            <a href="?act=contact">Contact</a>
        </header>

        <main>
            <noscript>
                <p>Ваш браузер не поддерживает JavaScript!</p>
            </noscript>
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
