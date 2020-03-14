<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 01.04.2018
 * Time: 20:30
 */

namespace mail;

use Exception;

class EmailAddress
{
    /**
     * @var Email
     */
    private $email;
    /**
     * @var string
     */
    private $name;

    /**
     * EmailAddress constructor.
     * @param $email
     * @param string $name
     * @throws WrongEmailAddressException
     */
    public function __construct($email, $name = '')
    {
        if (!$email instanceof Email) {
            $email = new Email($email);
        }
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $s = "$this->name <$this->email>";
        return $s;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}
