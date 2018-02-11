<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Event;

use App\Event\ContactEvent;
use App\Form\Model\Contact;
use PHPUnit\Framework\TestCase;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
final class ContactEventTest extends TestCase
{
    public function testShouldReturnContact(): void
    {
        $contact = new Contact();
        $event = new ContactEvent($contact);

        $this->assertSame($event->getContact(), $contact);
    }
}
