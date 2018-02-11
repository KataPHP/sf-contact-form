<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Handler;

use App\Event\ContactEvent;
use App\Events;
use App\Form\Model\Contact;
use App\Form\Type\ContactFormType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
class ContactFormHandler
{
    /**
     * @var FormInterface
     */
    private $form;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(FormFactoryInterface $factory, EventDispatcherInterface $eventDispatcher)
    {
        $this->form = $factory->create(ContactFormType::class);
        $this->eventDispatcher = $eventDispatcher;
    }

    public function getForm(): FormInterface
    {
        return $this->form;
    }

    public function process(Request $request): bool
    {
        $contact = new Contact();

        $this->form->setData($contact);
        $this->form->handleRequest($request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->eventDispatcher->dispatch(Events::CONTACT_FORM_SUBMITTED, new ContactEvent($contact));

            return true;
        }

        return false;
    }
}
