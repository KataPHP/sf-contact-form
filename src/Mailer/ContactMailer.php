<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Mailer;

use App\Form\Model\Contact;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
class ContactMailer
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var \Twig\Environment
     */
    private $twig;
    /**
     * @var array
     */
    private $parameters;

    public function __construct(\Swift_Mailer $mailer, \Twig\Environment $twig, array $parameters = [])
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->parameters = $parameters;
    }

    public function send(Contact $contact): bool
    {
        //@TODO
    }
}
