<?php
namespace AngularBundle\Handler\Interfaces;

interface UserHandlerInterface 
{
    /**
     * 
     * @param \AngularBundle\Document\User $user
     */
    public function insert(\AngularBundle\Document\User $user);
    
    /**
     * 
     * @param \AngularBundle\Document\User $user
     */
    public function update(\AngularBundle\Document\User $user);


    /**
     * get all users 
     */
    public function cget();
    
    /**
     * 
     * @param string $id
     */
    public function get(string $id);
    
    /**
     * 
     * @param string $id
     */
    public function delete(string $id);
    
}
