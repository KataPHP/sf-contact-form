Kata contact form
============
> Learn how to create a simple contact form with handler.


# Story
We want a simple contact form that must be able to send an email. We have to use good practices, such as very little code in the controller, use a handler for the job of the form, create a service for sending the email.

# Goal

* Use best practices
* Create a FormType
* Create a Subscriber
* Dispatch an Event
* Use a Mailer

Instructions
------------
* Complete App\Form\Type\ContactFormType
* Complete App\Mailer\ContactMailer
* Complete App\Subscriber\ContactSubscriber

# Help
* https://symfony.com/doc/current/forms.html
* https://symfony.com/doc/current/email.html
* https://symfony.com/doc/current/event_dispatcher.html
* https://symfony.com/doc/current/form/csrf_protection.html


# Code source

Use the following basis to perform this exercise

1) Clone this repository and execution the commands

```bash
$ composer install
```

2) Run this project

```bash
$ php -S localhost:8000 -t public
```

3) It's up to you to code!

Have fun :)

# Tests

We provide some tests. You can run phpunit.

```bash
$ ./vendor/bin/phpunit --coverage-text
```
