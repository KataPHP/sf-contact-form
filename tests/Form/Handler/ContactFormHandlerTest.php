<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Form\Handler;

use App\Form\Handler\ContactFormHandler;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
final class ContactFormHandlerTest extends TestCase
{
    private $requestProphecy;
    private $formProphecy;
    private $formFactoryProphecy;
    private $eventDispatcherProphecy;
    private $contactFormHandler;

    public function setUp(): void
    {
        $this->requestProphecy = $this->prophesize(Request::class);
        $this->formProphecy = $this->prophesize(FormInterface::class);
        $this->formFactoryProphecy = $this->prophesize(FormFactoryInterface::class);
        $this->eventDispatcherProphecy = $this->prophesize(EventDispatcherInterface::class);

        $this->formFactoryProphecy->create(Argument::any())->willReturn($this->formProphecy->reveal());
        $this->formProphecy->isSubmitted()->willReturn(true);

        $this->contactFormHandler = new ContactFormHandler(
            $this->formFactoryProphecy->reveal(),
            $this->eventDispatcherProphecy->reveal()
        );
    }

    public function testShouldReturnForm(): void
    {
        $this->assertInstanceOf(FormInterface::class, $this->contactFormHandler->getForm());
    }

    public function testShouldDispatchEventIfValid(): void
    {
        $this->formProphecy->isValid()->willReturn(true);
        $this->formProphecy->setData(Argument::any())->shouldBeCalled();
        $this->formProphecy->handleRequest(Argument::type(Request::class))->shouldBeCalled();
        $this->eventDispatcherProphecy->dispatch(Argument::any(), Argument::any())->shouldBeCalled();

        $this->assertTrue($this->contactFormHandler->process($this->requestProphecy->reveal()));
    }

    public function testShouldReturnFalseIfNotValid(): void
    {
        $this->formProphecy->isValid()->willReturn(false);
        $this->formProphecy->setData(Argument::any())->shouldBeCalled();
        $this->formProphecy->handleRequest(Argument::type(Request::class))->shouldBeCalled();

        $this->assertFalse($this->contactFormHandler->process($this->requestProphecy->reveal()));
    }
}
