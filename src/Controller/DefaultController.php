<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\Handler\ContactFormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 *
 * @Route("/", name="app_")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('default/home.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, ContactFormHandler $contactFormHandler): Response
    {
        if (true === $contactFormHandler->process($request)) {
            $this->addFlash('notice', 'Contact form success...');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('default/contact_form.html.twig', [
            'form' => $contactFormHandler->getForm()->createView()
        ]);
    }
}
