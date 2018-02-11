<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Subscriber;

use App\Event\ContactEvent;
use App\Events;
use App\Mailer\ContactMailer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
class ContactSubscriber implements EventSubscriberInterface
{
    /**
     * @var ContactMailer
    */
    private $mailer;

    public function __construct(ContactMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function onContactFormSubmitted(ContactEvent $event)
    {
        $this->mailer->send($event->getContact());
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            Events::CONTACT_FORM_SUBMITTED => 'onContactFormSubmitted',
        ];
    }
}
