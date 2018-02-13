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
    //@TODO
}
