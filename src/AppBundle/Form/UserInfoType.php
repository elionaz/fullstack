<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class UserInfoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {       
        $builder
                ->add('firstName')
                ->add('firstSurname')
                ->add('secondSurname')            
                ->add('email')                
                ->add('dateOfBirth', BirthdayType::class, 
                array(
                    'placeholder' => 
                    array(
                        'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    )
                ))
                ->add("placeOfBirth", ChoiceType::class, 
                        array(
                            "choices"=>$this->getEntitiesList()))
                ->add('postCode')              
                ->add("gender", ChoiceType::class,
                        array(
                            "choices" => $this->getGenderList()))                
                ->add('createdAt');
               
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
                array(
                    'data_class' => 'AppBundle\Entity\UserInfo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_userinfo';
    }
    
    public function getGenderList()
    {
        return array("Hombre" => 'H', "Mujer" => 'M');
    }
    
    
    public function getEntitiesList()
    {
        return array(
            "AGUASCALIENTES"=>"AS",
            "BAJA CALIFORNIA"=>"BC",
            "BAJA CALIF. SUR"=>"BS",
            "CAMPECHE"=>"CC",
            "CHIAPAS"=>"CS",
            "CHIHUHUA"=>"CH",            
            "COAHUILA"=>"CL",
            "COLIMA"=>"CM",
            "DISTRITO FEDERAL"=>"DF",
            "DURANGO"=>"DG",
            "GUANAJUATO"=>"GT",
            "GUERRERO"=>"GR",
            "HIDALGO"=>"HG",
            "JALISCO"=>"JC",
            "MICHOACAN"=>"MN",
            "MORELOS"=>"MS",
            "NAYARIT"=>"NT",
            "NUEVO LEON"=>"NL",
            "OAXACA"=>"OC",
            "PUEBLA"=>"PL",
            "QUERETARO"=>"QT",
            "QUINTANA ROO"=>"QR",
            "SAN LUIS POTOSI"=>"SP",
            "SINALOA"=>"SL",
            "SONORA"=>"SR",
            "TABASCO"=>"TC",
            "TAMAULIPAS"=>"TS",
            "TLAXCALA"=>"TL",
            "VERACRUZ"=>"VZ",
            "YUCATAN"=>"YN",
            "ZACATECAS"=>"ZS"                    
        );       
    }

}