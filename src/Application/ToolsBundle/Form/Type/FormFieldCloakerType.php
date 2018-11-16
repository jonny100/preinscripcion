<?php
namespace Application\ToolsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class FormFieldCloakerType extends HiddenType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        #cloack_selector replace values:
        # field_id
        # form_name

        $resolver->setDefaults(array(
            'cloak_selector'=> "#%field_id%",
            'jq_show_effect'=> 'slideDown()',
            'jq_hide_effect'=> 'slideUp()',
            'ischeckbox' => false
        ));
        
        $resolver->setRequired(array(
            'cloaked_fields',
            'cloakmap',
            'trigger_field'
            ));
    }

    public function getName()
    {
        return 'apptools_formfield_cloaker';
    }
    
    public function getParent()
    {
        return 'hidden';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->setAttribute('jq_show_effect', $options['jq_show_effect']);
        $builder->setAttribute('jq_hide_effect', $options['jq_hide_effect']);
        $builder->setAttribute('trigger_field', $options['trigger_field']);
        $builder->setAttribute('cloaked_fields', $options['cloaked_fields']);
        $builder->setAttribute('cloakmap', $options['cloakmap']);
        $builder->setAttribute('cloak_selector', $options['cloak_selector']);
        $builder->setAttribute('ischeckbox', $options['ischeckbox']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $options = array(
            'fields'=> $form->getConfig()->getAttribute('cloaked_fields'),
            'map'=> $form->getConfig()->getAttribute('cloakmap'),
        );

        $view->vars['trigger_field'] = $form->getConfig()->getAttribute('trigger_field');
        $view->vars['selector'] = $form->getConfig()->getAttribute('cloak_selector');
        $view->vars['show_effect'] = $form->getConfig()->getAttribute('jq_show_effect');
        $view->vars['hide_effect'] = $form->getConfig()->getAttribute('jq_hide_effect');
        $view->vars['cloak_options'] = json_encode($options);
        $view->vars['ischeckbox'] = $form->getConfig()->getAttribute('ischeckbox');
    }

}

