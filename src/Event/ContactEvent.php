<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Event;

use App\Form\Model\Contact;
use Symfony\Component\EventDispatcher\Event;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
class ContactEvent extends Event
{
    /**
     * @var Contact
     */
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
