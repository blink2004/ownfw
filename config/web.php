<?php

    $config = [];
    $config['db'] = [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbname' => ''
    ];

    $config['mailer'] = [
        'host'     => 'smtp.example.org',
        'port'     => 25,
        'username' => 'your username',
        'password' => 'your password',
        'from'     => ['no-reply@no-reply.com' => 'John Doe'],
        'to'       => ['receiver@domain.org', 'other@domain.org' => 'A name'],
        'themes'   => [
            'question' => [
                'title' => 'Вопрос',
                'value' => 'q',
                'to'    => 'question@email.addr',
            ],
            'idea' => [
                'title' => 'Предложение',
                'value' => 'p',
                'to'    => 'proposal@email.addr',
            ],
            'technical_error' => [
                'title' => 'Техническая ошибка на сайте',
                'value' => 'e',
                'to'    => 'error@email.addr',
            ],
        ]
    ];