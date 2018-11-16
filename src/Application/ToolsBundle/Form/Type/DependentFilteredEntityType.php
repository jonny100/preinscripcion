<?php
namespace Application\ToolsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class DependentFilteredEntityType extends EntityType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'compound'     => false,
            'empty_value'  => '',
            'property' => null,
            'no_result_msg' => '',
        ));
        
        # class option is required by base class
        $resolver->setRequired(array('entity_alias', 'field_name',
                                     'parent_field', 'parent_property'));
    }

    public function getName()
    {
        return 'apptools_dependent_filtered_entity';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->setAttribute("parent_field", $options['parent_field']);
        $builder->setAttribute("entity_alias", $options['entity_alias']);
        $builder->setAttribute("no_result_msg", $options['no_result_msg']);
        $builder->setAttribute("empty_value", $options['empty_value']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['parent_field'] = $form->getConfig()->getAttribute('parent_field');
        $view->vars['entity_alias'] = $form->getConfig()->getAttribute('entity_alias');
        $view->vars['no_result_msg'] = $form->getConfig()->getAttribute('no_result_msg');
        $view->vars['empty_value'] = $form->getConfig()->getAttribute('empty_value');
    }
}
