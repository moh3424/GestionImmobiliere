<?php
namespace App\Form;

use App\Entity\Option;
use App\Entity\PropertySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType::class, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'placeholder'=> 'Prix maximal'
                ]
            ])
            ->add('minSurface', IntegerType::class, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'placeholder'=> 'Surface minimal'
                ]
            ])  
            ->add('department', TextType::class, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'placeholder'=> 'Departement'
                ]
            ])
            ->add('options', EntityType::class, [
                'required'     => false,
                'label'        => false,
                'class'        => Option::class,
                'choice_label' => 'name',
                'multiple'     =>true,
                'attr'      => [
                    'placeholder'=> 'Options'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method'     => 'get',
            'csrf_protection'=> false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
