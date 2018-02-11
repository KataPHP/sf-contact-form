<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Mailer;

use App\Form\Model\Contact;
use App\Mailer\ContactMailer;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
final class ContactMailerTest extends TestCase
{
    public function testShouldSendMail(): void
    {
        $twigProphecy = $this->prophesize(\Twig_Environment::class);
        $mailerProphecy = $this->prophesize(\Swift_Mailer::class);
        $params = [
            'subject' => 'Contact Form',
            'from' => 'contact_form@domain.com',
            'to' => 'hello@domain.com',
        ];

        $contactMailer = new ContactMailer(
            $mailerProphecy->reveal(),
            $twigProphecy->reveal(),
            $params
        );

        $mailerProphecy->send(Argument::any())->shouldBeCalled()->willReturn(true);
        $twigProphecy->render(Argument::any(), Argument::any())->shouldBeCalled()->willReturn('Mail Content');

        $contactMailer->send(new Contact());
    }
}
