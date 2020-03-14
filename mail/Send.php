<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 18.04.2018
 * Time: 23:16
 */

namespace mail;

require_once __DIR__ . '/../include/cont.phpmailer.php';

use InvalidArgumentException;
use PHPMailer;
use phpmailerException;

class Send
{
    /**
     * Mailer constructor.
     */
    public function __construct(Mail $mail)
    {
        $this->send($mail);
    }

    /**
     * @param Mail $mail
     * @return bool
     * @throws phpmailerException
     */
    private function send(Mail $mail)
    {
        $phpMailer = new PHPMailer(true);
        foreach ($mail->getTo() as $emailAddress) {
            $phpMailer->AddAddress($emailAddress->getEmail(), $emailAddress->getName());
        }
        $phpMailer->SetFrom($mail->getFrom()->getEmail(), $mail->getFrom()->getName());
        $phpMailer->Subject = $mail->getSubject();
        $message = $mail->getMessage();
        if ($message instanceof MessageHtml) {
            $phpMailer->IsHTML(true);
            $phpMailer->Body = $message->getHtml();
            $phpMailer->AltBody = $message->getText();
        } elseif ($message instanceof Message) {
            $phpMailer->IsHTML(false);
            $phpMailer->Body = $message->getText();
        } else {
            throw new InvalidArgumentException('Invalid type of message body');
        }
        return $phpMailer->Send();
    }
}