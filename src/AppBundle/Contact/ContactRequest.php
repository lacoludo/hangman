<?php

namespace AppBundle\Contact;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactRequest
{
    /**
     * @NotBlank
     * @Length(min=5, max=50)
     */
    private $fullName;

    /**
     * @NotBlank
     * @Email
     */
    private $emailAddress;

    /**
     * @NotBlank
     * @Length(max=100)
     */
    private $subject;

    /**
     * @NotBlank
     */
    private $message;

    public function __construct($fullName, $emailAddress, $subject, $message)
    {
        $this->fullName = $fullName;
        $this->emailAddress = $emailAddress;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function toSwiftMessage($recipient)
    {
        $email = \Swift_Message::newInstance()
            ->setFrom($this->emailAddress, $this->fullName)
            ->setTo($recipient)
            ->setCc('cc@mywebsite.com')
            ->setSubject($this->subject)
            ->setBody($this->message)
        ;

        return $email;
    }
}
