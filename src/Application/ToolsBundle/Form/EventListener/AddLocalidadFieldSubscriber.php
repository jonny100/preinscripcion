<?php

namespace Application\ToolsBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;


class AddLocalidadFieldSubscriber implements EventSubscriberInterface
{
    private $property_path;

    public function __construct($property_path)
    {
        $this->property_path = $property_path;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }

    private function addLocalidadForm($form, $depto_id, $localidad = null)
    {
        $formOptions = array(
            'class'         => 'ApplicationMainBundle:Localidad',
            'empty_value'   => '== Seleccione Localidad ==',
            'label'         => 'Localidad',
            'mapped'        => false,
            'attr'          => array(
                'class' => 'province_selector',
            ),
            'query_builder' => function (EntityRepository $repository) use ($depto_id) {
                $qb = $repository->createQueryBuilder('loc')
                    ->where('loc.departamento = :depto_id')
                    ->setParameter('depto_id', $depto_id)
                ;

                return $qb;
            }
        );

        if ($localidad) {
            $formOptions['data'] = $localidad;
        }

        $form->add('localidad','entity', $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor = PropertyAccess::getPropertyAccessor();

        $localidad = $accessor->getValue($data, $this->property_path);
        $departamento = ($localidad) ? $localidad->getDepartamento() : null;
        $depto_id  = ($departamento) ? $departamento->getId() : null;

        $this->addLocalidadForm($form, $depto_id, $localidad);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $depto_id = array_key_exists('departamento', $data) ? $data['departamento'] : null;

        $this->addLocalidadForm($form, $depto_id);
    }
}

