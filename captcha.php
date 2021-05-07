<?php

    // Открывает сессию
    session_start();

    require_once 'src/classes/session.class.php';

    $session = new Session();

    //присваивает PHP переменной captchastring строку символов
//    $captchastring = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    $captchastring = '1234567890abcdefghijklmnopqrstuvwxyz';
    //получает первые 6 символов после их перемешивания с помощью функции str_shuffle
 /*   $captchastring = substr(str_shuffle($captchastring), 0, 6);
    //инициализация переменной сессии с помощью сгенерированной подстроки captchastring,
    //содержащей 6 символов
    $_SESSION["code"] = $captchastring;

    //Генерирует CAPTCHA

    //создает новое изображение из файла background.png
    $image = imagecreatefrompng('background.png');
    //устанавливает цвет (R-200, G-240, B-240) изображению, хранящемуся в $image
    $colour = imagecolorallocate($image, 200, 240, 240);
    //присваивает переменной font название шрифта
    $font = 'oswald.ttf';
    //устанавливает случайное число между -10 и 10 градусов для поворота текста
    $rotate = rand(-10, 10);
    //рисует текст на изображении шрифтом TrueType (1 параметр - изображение ($image),
    //2 - размер шрифта (18), 3 - угол поворота текста ($rotate),
    //4, 5 - начальные координаты x и y для текста (18,30), 6 - индекс цвета ($colour),
    //7 - путь к файлу шрифта ($font), 8 - текст ($captchastring)
    imagettftext($image, 18, $rotate, 28, 32, $colour, $font, $captchastring);
    //будет передавать изображение в формате png
    header('Content-type: image/png');
    //выводит изображение
    imagepng($image);*/



    $captcha = "";
    for ($i = 0; $i < 5; $i++)
        $captcha .= $captchastring[rand(0, strlen($captchastring)-1)]; // Генерация случайных символов
    $session->setData('captcha', $captcha); // Записываем код в сессию
    $dir = "public/"; // Путь к папке со шрифтом
    $image = imagecreatetruecolor(170, 60); // Создаём полотно
    $color = imagecolorallocate($image, 180, 85, 85); // Задаём цвет текста
    $white = imagecolorallocate($image, 255, 255, 255); // Создаём цвет заднего фона
    imagefilledrectangle($image, 0, 0, 170, 60, $white); // Закрашиваем изображение
    // Создаём текст на картинке
    imagettftext ($image, 30, rand(0, 20)-10, 10, 40, $color, '/var/www/html/ownfw/public/fonts/f.ttf', $_SESSION['captcha']);
    header("Content-type: image/png"); // Отправляем заголовок с типом содержимого
    imagepng($image); // Выводим изображение капчи
