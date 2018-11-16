<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class EventoAdmin extends AbstractAdmin
{
    public function getNewInstance() {
        $instance = parent::getNewInstance();

        $em = $this->getModelManager()
                ->getEntityManager('AppBundle:EventoEstados');
        $ea = $em->getReference('AppBundle:EventoEstados', '1');
        $instance->setEventoEstados($ea); //ACTIVO
        
        return $instance;
    }
    
    public function configure() {

        $this->setTemplate('show', 'AppBundle:EventoAdmin:show.html.twig');
    }
    
    protected function configureRoutes(RouteCollection $collection)
    {
            $collection->add('preinscriptos');
    }
    
    public function getBatchActions()
    {
        $actions = parent::getBatchActions();
        unset($actions['delete']);

        return $actions;
    }
    
    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('id')
            ->add('nombre')
            ->add('descripcion')
            //->add('html')
            ->add('fechainicio')
            ->add('fechafin')
            ->add('cupo')
            ->add('lugar')
            ->add('observaciones')
            ->add('precio')
            ->add('puntaje')
            ->add('eventoestados')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            //->add('id')
            ->add('nombre')
            //->add('descripcion')
            //->add('html')
            ->add('fechainicio', null, array('format' => 'd/m/Y H:i'))
            ->add('fechafin', null, array('format' => 'd/m/Y H:i'))
            ->add('cupo')
            ->add('lugar')
            //->add('observaciones')
            ->add('precio')
            ->add('puntaje')
            ->add('eventoestados', null, array('label' => 'Estado'))
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    //'delete' => array(),
                    'preinscriptos' => array('template' => 'AppBundle:EventoAdmin:list_action_eventopreinscriptos.html.twig'),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            //->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('html', null, array('help' => 'Ingrese codigo html para personalizar la presentacion del evento'))
            ->add('fechainicio', 'sonata_type_datetime_picker', array('format'=>'dd/MM/yyyy', 'required' => false))
            ->add('fechafin', 'sonata_type_datetime_picker', array('format'=>'dd/MM/yyyy', 'required' => false))
            ->add('cupo')
            ->add('lugar')
            ->add('observaciones')
            ->add('precio')
            ->add('puntaje')
            ->add('eventoestados')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            //->add('id')
            ->add('nombre')
            ->add('descripcion')
            //->add('html')
            ->add('fechainicio', null, array('format' => 'd/m/Y H:i'))
            ->add('fechafin', null, array('format' => 'd/m/Y H:i'))
            ->add('cupo')
            ->add('lugar')
            ->add('observaciones')
            ->add('precio')
            ->add('puntaje')
            //->add('eventoestados')
        ;
    }
}
