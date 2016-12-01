<?php

namespace ShagBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom',
                    'label_attr' =>
                        [
                            'class' => 'firstname',
                        ],
                    'attr' =>
                        [
                            'placeholder' => 'Prénom',
                        ],
                    'required' => true,
                ]
            )
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom',
                    'label_attr' =>
                        [
                            'class' => 'lastname',
                        ],
                    'attr' =>
                        [
                            'placeholder' => 'Nom',
                        ],
                    'required' => true,
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Email',
                    'label_attr' =>
                        [
                            'class' => 'email',
                        ],
                    'attr' =>
                        [
                            'placeholder' => 'Email',
                        ],
                    'required' => true,
                ]
            )
            ->add(
                'content',
                TextareaType::class,
                [
                    'label' => 'Sujet',
                    'label_attr' =>
                        [
                            'class' => 'content',
                        ],
                    'attr' =>
                        [
                            'placeholder' => 'Sujet',
                        ],
                    'required' => true,
                ]
            )
            ->add(
                'save',
                SubmitType::class,
                [
                    'label' => 'Envoyer'
                ]
            )
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ShagBundle\Entity\Users'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'form_contact';
    }


}
