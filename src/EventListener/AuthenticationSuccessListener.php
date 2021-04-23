<?php


namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Symfony\Component\HttpFoundation\Cookie;

class AuthenticationSuccessListener
{
    /**
     * @param AuthenticationSuccessEvent $event
     * @return JWTAuthenticationSuccessResponse
     */
    public function onAuthenticationSuccess(AuthenticationSuccessEvent $event)
    {
        $response = $event->getResponse();
        $data = $event->getData();

        # $data = $event->getData();
        /** @var User $user */
        $user = $event->getUser();

        if (!$user instanceof User) {
            return;
        }
        # }

        $data['id'] = $user->getId();

        $event->setData($data);



        $token = $data['token'];
        # unset($data['token']);
        # $event->setData($data);

        date_default_timezone_set("Europe/Brussels");

        $response->headers->setCookie(
            Cookie::create('BEARER', // Cookie name, should be the same as in config/packages/lexik_jwt_authentication.yaml.
                $token, // cookie value
                time() + 10800, // expiration
                '/', // path
                null, // domain, null means that Symfony will generate it on its own.
                true, // secure
                true, // httpOnly
                false, // raw
                'lax' // same-site parameter, can be 'lax' or 'strict'.
            )
        );
    }
}