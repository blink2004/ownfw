<?php

    /**
     * Сохранение введённого дохода от пользователя
     */

    if ( isset($_POST['authorization']) ) {
        $error = array();
        $validate = false;
        $income = null;

        // validation
        if ( isset($_POST['authorization']) and ( strlen(trim($_POST['login']))>0 ) and (!is_nan($_POST['login']))  ) {
            $income = $_POST['login'];
            $session->setData('login', $login);

            // if OK
            $validate = true;
        } else {
            array_push($error, 'Не указан логин.');
        }

        // check captcha code
        if ( $_POST['captcha']!=$session->getValue('captcha') ) {
            $validate = false;
            array_push($error, 'Текст с картинки указан не правильно.');
        }

        // Main action
        if ( $validate ) {
            $session->setData('some_var', $smarty->fetch('some_template.tpl'));
            $smarty->clearAllAssign();

            // etc...
            $session->setData('some_result', $some_result);
        }

        if ( ($validate) && (count($error)==0) ) {
            $session->setData('alert', [
                'type' => 'success',
                'title' => 'Отлично!',
                'message' => 'Всё хорошо!'
            ]);
        } else {
            $session->setData('alert', [
                'type' => 'danger',
                'title' => 'Ошибка!',
                'message' => array_shift($error)
            ]);
        }

        exit( header('Location: ' . $_SERVER['HTTP_REFERER']) );
    }
