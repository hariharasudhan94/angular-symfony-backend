<?php

namespace AngularBundle\Services;
use Symfony\Component\Security\Guard\GuardAuthenticatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\ODM\MongoDB\DocumentManager;

class TokenAuthenticator implements GuardAuthenticatorInterface
{
    /**
     *
     * @var type 
     */
    private $dm; 
    
    /**
     * 
     * @param DocumentManager $dm
     */
    public function __construct(DocumentManager $dm) {
        $this->dm = $dm;
    }
    
    /**
     * Called on every request. Return whatever credentials you want to
     * be passed to getUser(). Returning null will cause this authenticator
     * to be skipped.
     */
    public function getCredentials(Request $request){
        
        if(!$token = $request->headers->get('X-AUTH_TOKEN'))
        {
            return NULL;
        }
        
        return [
            "token" => $token
        ];
    }
    
    /**
     * 
     * @param array $credentials
     * @param UserProviderInterface $userProvider
     */
    public function getUser(array $credentials, UserProviderInterface $userProvider) {
        $token = $credentials['token'];
        
        
    }
}
