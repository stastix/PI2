<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use App\Entity\Offrespecialevenment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Positive; 
use Symfony\Component\Validator\Constraints\Expression;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual; 
use Symfony\Component\Validator\Constraints\Range; 
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Context\ExecutionContextInterface;



class OffrespecialevenmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a title.']),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'The title cannot be longer than {{ limit }} characters.',
                    ]),
                ],
            ])
            ->add('description', TextareaType::class, [
                'constraints' => [
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'The description cannot be longer than {{ limit }} characters.',
                    ]),
                ],
            ])
            ->add('dateDepart', DateTimeType::class, [
                'date_widget' => 'single_text', 
                'constraints' => [
                    new Callback([$this, 'validateDateDepart']),
                ],
            ])
                    
            ->add('prix', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a price.']),
                    new GreaterThanOrEqual([
                        'value' => 0,
                        'message' => 'Price must be a positive value.',
                    ]),
                ],
            ])
            ->add('categorie', null, [
                'constraints' => [new Length([
                    'max' => 255,
                    'maxMessage' => 'The description cannot be longer than {{ limit }} characters.',
                ]),

                ],
            ])
            ->add('guideId', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Please enter a guideId.']),
                    new Range([
                        'min' => 1,
                        'max' => 100,
                        'minMessage' => 'GuideId must be at least {{ limit }}.',
                        'maxMessage' => 'GuideId cannot be more than {{ limit }}.',
                    ]),
                ],
            ])
                        ->add('destination', null, [
                'constraints' => [
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'required' => true, 
                'mapped' => false,   // tell Symfony not to try to map this field to any entity property
            ])
    
            ->add('niveau', ChoiceType::class, [
                'choices' => [
                    'bronze' => 'bronze',
                    'silver' => 'silver',
                    'gold' => 'gold',
                ],
            ]);
    }
 
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offrespecialevenment::class,
        ]);
    } 
    public function validateDateDepart($value, ExecutionContextInterface $context)
{
    // Check if the date is later than the current date
    if ($value instanceof \DateTime && $value <= new \DateTime()) {
        $context->buildViolation('Departure date must be later than the current date.')
            ->atPath('dateDepart')
            ->addViolation();
    }

}
}
