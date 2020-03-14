<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 01.04.2018
 * Time: 20:14
 */

namespace mail;

class Email
{
    /**
     * @var string
     */
    private $email;

    /**
     * Email constructor.
     * @param $email
     * @throws WrongEmailAddressException
     */
    public function __construct($email)
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (false === $email) {
            throw new WrongEmailAddressException("Wrong email address: $email");
        }
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getEmail();
    }
}
