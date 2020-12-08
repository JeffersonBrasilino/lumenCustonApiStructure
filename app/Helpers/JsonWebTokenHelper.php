<?php


namespace App\Helpers;


use Lcobucci\Clock\FrozenClock;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Validation\Constraint;

class JsonWebTokenHelper
{
    private static function getConfigurationToken()
    {
        $now = new \DateTimeImmutable();
        return array(
            'issuedBy' => url(),
            'issuedAt' => $now,
            'expiresAt' => ($now->modify('+9 hours'))
        );
    }

    private static function initToken()
    {
        $now = new \DateTimeImmutable();
        $config = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::base64Encoded(env('APP_KEY'))
        );
        $config->setValidationConstraints(
            new Constraint\IssuedBy(url()),
            new Constraint\ValidAt(new FrozenClock($now))
        );
        return $config;
    }

    static function generateToken(array $params = [])
    {
        $tkInstance = self::initToken();
        $configToken = self::getConfigurationToken();

        $tokenGenerated = $tkInstance->builder();
        if (!empty($params)){
            foreach ($params as $key=>$val){
                $tokenGenerated->withClaim($key,$val);
            }
        }

        foreach ($configToken as $key => $val) {
            $tokenGenerated->$key($val);
        }

        return $tokenGenerated->getToken($tkInstance->signer(), $tkInstance->signingKey())->toString();
    }

    static function validateToken(string $token)
    {
        $tkInstance = self::initToken();
        $constraints = $tkInstance->validationConstraints();
        $token = $tkInstance->parser()->parse($token);
        return $tkInstance->validator()->validate($token,...$constraints);


    }

    static function getDataToken(string $token)
    {
        $tkInstance = self::initToken();
        $parsedToken = $tkInstance->parser()->parse($token)->claims();
        return $parsedToken->all();
    }
}
