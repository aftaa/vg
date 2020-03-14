<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 18.04.2018
 * Time: 0:31
 */

namespace mail;

use Exception;

class Mail
{
    /**
     * @var EmailAddress[]
     */
    private $to = [];
    /**
     * @var EmailAddress
     */
    private $from;
    /**
     * @var string
     */
    private $subject;
    /**
     * @var Message
     */
    private $message;

    /**
     * Mail constructor.
     * @param EmailAddress[] $to
     * @param EmailAddress $from
     * @param string $subject
     * @param Message $message
     */
    public function __construct(array $to, EmailAddress $from, $subject, Message $message)
    {
        $this->to = $to;
        $this->from = $from;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * @return EmailAddress[]
     * @throws Exception
     */
    public function getTo()
    {
        if (!is_array($this->to)) {
            throw new Exception("TO isn't an array");
        }
        return $this->to;
    }

    /**
     * @param $to
     * @return self
     * @throws WrongEmailAddressException
     */
    public function setTo($to)
    {
        if (is_array($to)) {
            foreach ($to as $address) {
                if (!$address instanceof EmailAddress) {
                    throw new WrongEmailAddressException("Wrong type of TO: $to");
                }
            }
            $this->to = $to;
        } else {
            if (!$to instanceof EmailAddress) {
                $to = new EmailAddress($to);
            }
            $this->addTo($to);
        }
        return $this;
    }

    /**
     * @param EmailAddress $to
     * @return self
     */
    private function addTo(EmailAddress $to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return EmailAddress
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param EmailAddress $from
     * @return self
     */
    public function setFrom(EmailAddress $from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param $subject
     * @return self     *
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     * @return self
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;
        return $this;
    }
}
