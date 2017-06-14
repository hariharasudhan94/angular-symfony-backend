<?php
namespace AngularBundle\Handler;
use AngularBundle\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use AngularBundle\Handler\Interfaces\UserHandlerInterface;
use AngularBundle\Services\BaseInjectorService;
use JMS\Serializer\SerializationContext;


class UserHandler extends BaseInjectorService implements UserHandlerInterface
{
    
    const userClass = 'AngularBundle:User';


    /**
     * 
     * @param User $user
     */
    public function insert(User $user):void {
        
        $this->dm->persist($user);
        $this->dm->flush();
        
        return ;
    }
    
    /**
     * 
     * @param User $user
     * @return type
     * 
     */
    public function update(User $user) {
        
        $this->dm->persist($user);
        $this->dm->flush();
        
        return ;
    }


    
    /**
     * 
     * @return type
     */
    public function cget() {
        $users = $this->fetchReposiroty(self::userClass)->findBy([
            'isActive' => true
        ]);
        
        return $this->serializer->serialize($users, 'json', SerializationContext::create()->setGroups('list'));
    }
    
    /**
     * 
     * @param int $id
     * @return type
     */
    public function get(string $id) {
        $user = $this->fetchReposiroty(self::userClass)->find($id);
        
        return $this->serializer->serialize($user, 'json', SerializationContext::create()->setGroups('details'));
    }
    
    /**
     * 
     * @param string $id
     * @return type
     */
    public function delete(string $id){
        $user = $this->fetchReposiroty(self::userClass)->find($id);
        $user->setIsActive(FALSE);
        $this->dm->persist($user);
        $this->dm->flush();
        
        return ;
    }
    
}
