<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Subscriber;

use App\Event\ContactEvent;
use App\Events;
use App\Form\Model\Contact;
use App\Mailer\ContactMailer;
use App\Subscriber\ContactSubscriber;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
final class ContactSubscriberTest extends TestCase
{
    public function testGetSubscribedEvents(): void
    {
        $this->assertSame(
            [Events::CONTACT_FORM_SUBMITTED => 'onContactFormSubmitted'],
            ContactSubscriber::getSubscribedEvents()
        );
    }

    public function testOnContactFormSubmitted(): void
    {
        $mailerProphecy = $this->prophesize(ContactMailer::class);
        $subscriber = new ContactSubscriber($mailerProphecy->reveal());

        $mailerProphecy->send(Argument::type(Contact::class))
            ->shouldBeCalled()
            ->willReturn(true);

        $subscriber->onContactFormSubmitted(new ContactEvent(new Contact()));
    }
}
