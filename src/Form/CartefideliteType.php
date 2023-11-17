<?php

namespace App\Form;

use App\Entity\Cartefidelite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver; 
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Date;

use Doctrine\ORM\EntityRepository;



class CartefideliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('ptsfidelite', null, [
            'constraints' => [
                new Assert\GreaterThanOrEqual([
                    'value' => 0, 

                    'message' => 'should be greater or equal to 0 ',
                ]),
            ],
        ])
        ->add('datedebut', DateType::class, [
            'attr' => ['class' => 'js-datepicker'],
        ])
        
        // Add 'datefin' field with constraints
        ->add('datefin', DateType::class, [
            'constraints' => [
                new Assert\Expression([
                    'expression' => 'this.getParent()["datedebut"].getData() <= value',
                    'message' => 'End date must be equal to or greater than the start date.',
                ]),
            ],
        ])
        
    ->add('etatcarte', ChoiceType::class, [
                'choices' => [
                    'Active' => 'Active',
                    'Suspended' => 'suspended',
                    'Inactive' => 'inactive',
                ],
            ])
            ->add('niveaucarte', ChoiceType::class, [
                'choices' => [
                    'bronze' => 'bronze',
                    'silver' => 'silver',
                    'gold' => 'gold',
                ],
            ])
            ->add('user', EntityType::class, [
                'class' => 'App\Entity\User',
                'choice_label' => 'prenom',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->leftJoin('u.cartefidelite', 'c') // Assuming a OneToMany relationship named "cards"
                        ->where('c.idcarte IS NULL'); // Exclude users with cards
                },
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cartefidelite::class,
        ]); 
    } 

    public function validateDates($value, ExecutionContextInterface $context)
    {
        $form = $context->getObject();
    
        // Replace 'datedebut' with the actual name of your datedebut field
        $datedebutField = $form->get('datedebut');
    
        // Check if the datedebut field exists
        if (!$datedebutField) {
            return;
        }
    
        $datedebut = $datedebutField->getData();
    
        if ($datedebut && $value <= $datedebut) {
            $context
                ->buildViolation('Datefin must be greater than Datedebut.')
                ->atPath('datefin')
                ->addViolation();
        }
    }

}