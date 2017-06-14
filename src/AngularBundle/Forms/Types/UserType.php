<?php
namespace AngularBundle\Forms\Types;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AngularBundle\Document\User;
class UserType extends AbstractType
{
    /**
     * 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        //parent::buildForm($builder, $options);
        $builder->add("name", TextType::class)
                ->add("email", EmailType::class)
                ->add("phone", TextType::class)
                ->add("gender", ChoiceType::class, ['choices' => [
                    'male' => 'male',
                    'female' => 'female',
                    'others' => 'others'
                ]])
                ;
    }
    
    /**
     * 
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        //parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_type' => User::class,
            'csrf_protection' => FALSE,
        ]);
    }
}
