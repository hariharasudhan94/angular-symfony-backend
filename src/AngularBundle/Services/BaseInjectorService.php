<?php
namespace AngularBundle\Services;
use Doctrine\ODM\MongoDB\DocumentManager;
use JMS\Serializer\Serializer;
abstract class BaseInjectorService 
{
    
    protected $dm;
    
    protected $serializer;
    
    
    //doctrine.odm.mongodb.document_manager
    /**
     * 
     * @param DocumentManager $dm
     * @param Serializer $serializer
     */
    public function __construct(DocumentManager $dm,Serializer $serializer )
    {
        $this->dm = $dm;
        $this->serializer = $serializer;
    }
    
    /**
     * 
     * @param type $repoClass
     * @return type
     */
    public function fetchReposiroty($repoClass)
    {
        return $this->dm->getRepository($repoClass);
    }
    
    
}
