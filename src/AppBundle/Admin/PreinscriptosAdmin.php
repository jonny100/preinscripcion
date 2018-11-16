<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Route\RouteCollection;

class PreinscriptosAdmin extends AbstractAdmin
{
    
    public function  configure(){
            $this->parentAssociationMapping = 'evento';
            $this->setTemplate('edit', 'AppBundle:PreinscriptosAdmin:edit.html.twig');
    }
    
    protected function configureRoutes(RouteCollection $collection) {
        $collection->add('imprimirConstanciaPreinscripcion', $this->getRouterIdParameter() . '/imprimirConstanciaPreinscripcion');
        $collection->add('raw', $this->getRouterIdParameter() . '/raw');
    }
    
    public function getNewInstance() {
        $instance = parent::getNewInstance();

        $em = $this->getModelManager()->getEntityManager('AppBundle:PreinscriptosEstados');
        $ec = $em->getReference('AppBundle:PreinscriptosEstados', '1');
        $instance->setPreinscriptosEstados($ec);
        
        $em = $this->getModelManager()->getEntityManager('AppBundle:Paises');
        $ec = $em->getReference('AppBundle:Paises', '54');
        $instance->setPaises($ec);
        
//        $em2 = $this->getModelManager()->getEntityManager('AppBundle:Provincias');
//        $ec2 = $em2->getReference('AppBundle:Provincias', '5486');
//        $instance->setProvincias($ec2);
//        
//        $em3 = $this->getModelManager()->getEntityManager('AppBundle:DptosPartidos');
//        $ec3 = $em3->getReference('AppBundle:DptosPartidos', '5486049');
//        $instance->setDptosPartidos($ec3);
        
        return $instance;
    }
    
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('id')
            ->add('apellido')
            ->add('nombres')
            ->add('dni')
            ->add('sexo')
            ->add('eMail')
            ->add('celular')
            ->add('fijo')
            ->add('fechaNac')
            ->add('domicilio')
            ->add('profesion')
            ->add('preinscriptosestados')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           // ->add('id')
            ->add('apellido')
            ->add('nombres')
            ->add('dni')
            ->add('sexo')
            ->add('eMail')
            ->add('celular')
            //->add('fijo')
            //->add('fechaNac', null, array('format' => 'd/m/Y'))
            //->add('paises',null, array('label'=>'País'))
            //->add('provincias',null, array('label'=>'Provincia'))
            ->add('localidad')
            ->add('domicilio')
            //->add('profesion')
            ->add('preinscriptosestados', null, array('label' => 'Estado'))
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                    'constanciapreinsc' => array('template' => 'AppBundle:PreinscriptosAdmin:list_action_constanciapreinsc.html.twig'),
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
//        # Dependant Fields
//        $container = $this->getConfigurationPool()->getContainer();
//        $dependant_entities = $container->getParameter('application_tools.dependent_filtered_entities');        
//        $subscriber = $container->get('application_tools.dependent_filtered_entity_subscriber');
//        # Provincia
//        $form_options_pro = $dependant_entities['provincias_by_paises']['form_options'];
//        $form_options_pro = array_merge($form_options_pro, array('required'=>false));
//        $subscriber->addField('provincias', $form_options_pro);
//        # Dptos
//        $form_options_dpt = $dependant_entities['dptos_by_provincia']['form_options'];
//        $form_options_dpt = array_merge($form_options_dpt, array('required'=>false));
//        $subscriber->addField('dptosPartidos', $form_options_dpt);        
//        # Localidades
//        $form_options_loc = $dependant_entities['localidad_by_dptos']['form_options'];
//        $form_options_loc = array_merge($form_options_loc, array('required'=>false));
//        $subscriber->addField('localidades', $form_options_loc);
        
        $formMapper
            //->add('id')
            ->add('apellido')
            ->add('nombres')
            ->add('dni')
            ->add('sexo', 'choice', array(
                'choices'   => array('M' => 'MASCULINO', 'F' => 'FEMENINO'),
                'expanded'  => true
                ))
            ->add('eMail')
            ->add('celular')
            ->add('fijo')
            ->add('fechaNac', 'sonata_type_datetime_picker', array('format'=>'dd/MM/yyyy', 'required' => false))
            ->add('paises',null, array('label'=>'País'))
            ->add('provincias',null, array('label'=>'Provincia'))
            ->add('localidad')
            ->add('domicilio')
            ->add('profesion')
            ->add('estudiosAlcanzados')
            ->add('tipoFinalizacionEstudiosAlcanzados')
            ->add('recaptcha', 'pv_recaptcha', array(
                'label' => 'Verificación',
                'mapped' => false,
            ))
        ;
        
//        $formMapper->getFormBuilder()->addEventSubscriber($subscriber);
        
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            //->add('id')
            ->add('apellido')
            ->add('nombres')
            ->add('dni')
            ->add('sexo')
            ->add('eMail')
            ->add('celular')
            ->add('fijo')
            ->add('fechaNac', null, array('format' => 'd/m/Y'))
            ->add('paises',null, array('label'=>'País'))
            ->add('provincias',null, array('label'=>'Provincia'))
            ->add('localidad')
            ->add('domicilio')
            ->add('profesion')
            //->add('preinscriptosestados')
        ;
    }
}
