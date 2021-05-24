<?php

    if ( $action=='contact' ) {

        $smarty->assign('user', $session->getValueOrDefault('user'));

        if ( isset($_POST['send_feedback']) ) {
            $error = array();
            $validate = false;
            $income = null;
            $user = $_POST['user'];
            $mail = null;

            $session->setData('user', $user);

            // validation
            if ( isset($user['theme']) and ( strlen(trim($user['theme']))>0 )  ) {
                $user['purpose'] = null;
                foreach ($config['mailer']['themes'] as $theme) {
                    if ( $theme['value']==$user['theme'] ) {
                        $user['purpose'] = $theme['title'];
                        $mail['to'] = $theme['to'];
                    }
                }

                if ( !is_null($user['purpose']) ) {
                    // if OK
                    $validate = true;
                } else {
                    array_push($error, 'Не корректно выбрана тема сообщения.');
                }

            } else {
                array_push($error, 'Не выбрана тема сообщения.');
            }

            // check message
            if ( !isset($user['message']) or ( strlen(trim($user['message']))<1 ) ) {
                array_push($error, 'Не добавлено сообщение.');
            }

            // check captcha code
            if ( $_POST['captcha']!=$session->getValue('captcha') ) {
                $validate = false;
                array_push($error, 'Текст с картинки указан не правильно.');
            }

            // change email from param if user send valid email as contact
            $mail['from'] = $config['mailer']['from'];
            if ( filter_var($user['contact'], FILTER_VALIDATE_EMAIL) ) {
                $mail['from'] = [$user['contact'] => strip_tags(htmlspecialchars($user['name']))];
            }

            // upload file
            if ( $validate && (!empty($_FILES['user']['name']['file'])) ) {
                try {
                    $uploadDir = './upload_files/';
                    do {
                        $uploadFile = $uploadDir . sha1(basename($_FILES['user']['name']['file'] . time())) . '.' . pathinfo($_FILES['user']['name']['file'], PATHINFO_EXTENSION);
                    ;
                    } while ( file_exists($uploadFile) );
                    move_uploaded_file($_FILES['user']['tmp_name']['file'], $uploadFile);
                    $user['uploaded_file_name'] = basename($uploadFile);
                } catch (Exception $e) {
                    $validate = false;
                    array_push($error, 'Не удаётся загрузить файл на сервер.');
                }
            }

            // Main action
            if ( $validate ) {
                $smarty->assign('user', $user);
                $mailBody = $smarty->fetch('mail/feedback.tpl');
                $smarty->clearAllAssign();

                // send mail
                /*$transport = (new Swift_SmtpTransport($config['mailer']['host'], $config['mailer']['port']))
                    ->setUsername($config['mailer']['username'])
                    ->setPassword($config['mailer']['password'])
                ;*/
                $transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');
                $mailer = new Swift_Mailer($transport);

                // Create a message
                $message = (new Swift_Message('Wonderful Subject'))
                    ->setContentType('text/html; charset=utf-8')
                    ->setFrom($mail['from'])
//                    ->setTo($config['mailer']['to'])
                    ->setTo($mail['to'])
                    ->setSubject($user['purpose'])
                    ->setBody($mailBody)
                ;

                // Send the message
                if ( !$mailer->send($message) ) {
                    array_push($error, 'Ошибка при отправке сообщения');
                }
            }

            if ( ( $validate ) && ( count($error)==0 ) ) {
                $session->setData('alert', [
                    'type'    => 'success',
                    'title'   => 'Отлично!',
                    'message' => 'Ваше сообщение отправлено!'
                ]);
                $session->deleteValue('user');
            } else {
                $session->setData('alert', [
                    'type'    => 'danger',
                    'title'   => 'Ошибка!',
                    'message' => array_shift($error)
                ]);
            }

            exit( header('Location: ' . $_SERVER['HTTP_REFERER']) );
        }

        // Set Smarty template
        $content = 'contact';
        $smarty->assign('themes', $config['mailer']['themes']);
    }
