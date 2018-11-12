<?php
/**
 * Created by PhpStorm.
 * User: markus
 * Date: 22.06.18
 * Time: 22:29
 */

namespace App\Form;

use MongoDB\BSON\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class FleaMarketType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('startDate', null, array('widget' => 'single_text'))
            ->add('endDate', null, array('widget' => 'single_text'))
            ->add('feeInPercent')
            ->add('save', SubmitType::class);
    }

}