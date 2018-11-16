<?php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Application\ReportBundle\Report\ReportPDF;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PreinscriptosAdminController extends CRUDController
{
    protected function redirectTo($object, Request $request = null) {
        $url = false;
        if (null !== $this->getRequest()->get('btn_preinsc')) {
            $url = $this->get('router')->generate('admin_app_preinscriptos_imprimirConstanciaPreinscripcion', array('id'=> $object->getId()));
        }
        if (!$url) {
            return parent::redirectTo($object, $request);
        }
        
        return new RedirectResponse($url);
    }
    
    public function imprimirConstanciaPreinscripcionAction(Request $request) {
        $object = $this->admin->getSubject();

        if (!$object) {
            throw new NotFoundHttpException(sprintf('No se pudo encontrar la preinscripcion correspondiente a esta identificación : %s', $id));
        }
        $pdf = new ReportPDF(); //$this->get("white_october.tcpdf")->create();
        // lineas copiadas del codigo de gerezpo
        $pdf->AddPage();

//            $pdf->Line(28,15,200,15);
//            $pdf->Line(29,16,199,16);
//
//            $pdf->Line(28,330,200,330);
//            $pdf->Line(29,329,199,329);
//
//            $pdf->Line(28,15,28,330);
//            $pdf->Line(29,16,29,329);
//
//            $pdf->Line(200,15,200,330);
//            $pdf->Line(199,16,199,329);
        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //$pdf->setPageFormat('A4', 'P');
        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);
        //$pdf->SetFont('helvetica', '',8);
        $logo = dirname(__FILE__).'/../Resources/public/images/EIE-Logo.png';
        $pdf->setHeaderData($logo,150,'','');
        $pdf->Image($logo, 10, 5, 30, 30, '', '', '', true, 150);
        //$pdf->SetFont("FreeSerif", "", 16);
        //set style for barcode
        $style = array(
            'border' => 1,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );

        // QRCODE,L : QR-CODE Low error correction

        //$json = $object->getCodigoQR(); //'{ "datos": [{ "id": "'.$object->getId().'", "clase": "caso", "descripcion": "'.$object->getNumeroLegajo(). ' - ' .$object->getAnioLegajo().'-'.$object.'"  }] }';

//        $crypt = new MCrypt();
//        $jsonc = $crypt->encrypt($json);

        $text = $this->getConstanciaPreinscripcion($object);
        $pdf->writeHTMLCell(0, 0, 20, 40, $text, 0, 0, 0, true, "J", 0);
        //$pdf->write2DBarcode($jsonc, 'QRCODE,L', 170, 45, 40, 40, $style, 'N');

        // $pdf->writeHTML($text, true, false, true, false, '');
        //Close and output PDF document
        $pdf->Output('Constancia de Preinscripcion N° ' . $object->getId() . '.pdf', 'I');
    }
    
    public function getConstanciaPreinscripcion($object){
        $text = '<p> <b>Preinscripción al Evento:</b> ' . $object->getEvento()->getNombre() . '</p>

                <p> <b>Nro. de Preinscripción:</b> ' . $object->getId() . '</p>

                <p> <b>DNI:</b> ' . $object->getDNI() . '</p>

                <p> <b>Apellido y Nombres:</b> ' . $object->getApellido() . ', ' . $object->getNombres() . '</p>

                <p> <b>Fecha de Preinscripción:</b> ' . $object->getFechaPreinsc()->format('d/m/Y') . '</p>

                <p> <b>Lugar del Evento:</b> ' . $object->getEvento()->getLugar() . '</p>

                <p> <b>Fecha del Evento:</b> ' . $object->getEvento()->getFechaInicio()->format('d/m/Y') . '</p>';
        
        return $text;
    }
}
