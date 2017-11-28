<?php

namespace AppBundle\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class)
            ->add('emailAddress', EmailType::class)
            ->add('subject', TextType::class)
            ->add('message', TextareaType::class, [
                'attr' => [
                    'rows' => 15,
                    'cols' => 50,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactRequest::class,
            'empty_data' => function (FormInterface $form) {
                return new ContactRequest(
                    $form->get('fullName')->getData(),
                    $form->get('emailAddress')->getData(),
                    $form->get('subject')->getData(),
                    $form->get('message')->getData()
                );
            },
        ]);
    }
}
