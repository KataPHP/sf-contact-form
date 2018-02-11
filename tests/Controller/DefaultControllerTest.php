<?php

/**
 * This file is part of the Oslab-Kata project.
 *
 * (c) OsLab-Kata <https://github.com/Oslab-Kata>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Florent DESPIERRES <florent@despierres.pro>
 */
final class DefaultControllerTest extends WebTestCase
{
    /**
     * @dataProvider getPublicUrls
     */
    public function testPublicUrls(string $url): void
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testSubmitContactForm(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');

        $form = $crawler->selectButton('submit')->form([
            'app_contact[fullName]' => 'Joe Doe',
            'app_contact[mail]' => 'joe.doe@domain.com',
            'app_contact[subject]' => 'Test',
            'app_contact[message]' => 'Test Text',
        ]);

        $client->submit($form);

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function getPublicUrls()
    {
        yield ['/'];
        yield ['/contact'];
    }
}
