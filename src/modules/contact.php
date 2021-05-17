<?php

    if ( $action=='contact' ) {

        $smarty->assign('user', $session->getValueOrDefault('user'));

        if ( isset($_POST['send_feedback']) ) {
            $error = array();
            $validate = false;
            $income = null;
            $user = $_POST['user'];

            $session->setData('user', $user);

            // validation
            if ( isset($user['theme']) and ( strlen(trim($user['theme']))>0 )  ) {
                $user['purpose'] = null;
                foreach ($config['mailer']['themes'] as $theme) {
                    if ( $theme['value']==$user['theme'] )
                        $user['purpose'] = $theme['title'];
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
                    ->setFrom($config['mailer']['from'])
                    ->setTo($config['mailer']['to'])
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
