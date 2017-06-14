<?php

namespace AngularBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Routing\ClassResourceInterface;
use AngularBundle\Forms\Types\UserType;
use AngularBundle\Document\User;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use AngularBundle\Handler\UserHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UserController extends FOSRestController implements ClassResourceInterface
{
    /**
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function postAction(Request $request): JsonResponse{
        
        $params = $request->request->all();
        $form = $this->createForm(new UserType(), new User());
        $form->submit($params);
        if($form->isValid()){
            try{
                $this->get('angular.user_handler')->insert($form->getData());
                $response = new JsonResponse();
                $response->setStatusCode(201);
                
                return $response;
            }
            catch(\Exception $e){
                error_log($e->getMessage());
            }   
        }
        
        $data = [ "code" => 400, "message" => "validation error", "errors" => "working" ];
        return new JsonResponse($data, 400);
    }
    
    
    /**
     * 
     * @param string $id
     * @param Request $request
     * @ParamConverter("user", class="AngularBundle\Document\User")
     */
    public function updateAction($user, Request $request){
        dump($user);die;
    }


    
    
    /**
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function cgetAction(Request $request): JsonResponse{
        $serializedData = $this->get('angular.user_handler')->cget();
        
        return new JsonResponse($serializedData, 200);
    }
    
    /**
     * 
     * @param type $id
     * @return JsonResponse
     */
    public function getAction(string $id): JsonResponse{
        $serializedData = $this->get('angular.user_handler')->get($id);
        
        return new JsonResponse($serializedData);
    }
    
    /**
     * 
     * @param string $id
     * @return void
     */
    public function deleteAction(string $id): JsonResponse{
        $this->get('angular.user_handler')->delete($id);
        $response = new JsonResponse();
        $response->setStatusCode(204);
        
        return $response;
    }
    
}
