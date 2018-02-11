<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Model;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
class Contact
{
    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     *
     * @return self
     */
    public function setFullName(string $fullName): Contact
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     *
     * @return self
     */
    public function setMail(string $mail): Contact
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return self
     */
    public function setSubject(string $subject): Contact
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): Contact
    {
        $this->message = $message;

        return $this;
    }
}
