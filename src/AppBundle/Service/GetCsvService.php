<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\StreamedResponse;

class GetCsvService
{
    
     /**
     * @param   object    $oCustomer     Customer information       
     * @return  StreamedResponse    
     */
     public function generateCsv($oCustomer)
    {
        $response = new StreamedResponse();
        $sFileName = 'export_'.date('Y_m_d_h_m_s').'.csv';
        $response->setCallback(function() use($oCustomer){
            $handle = fopen('php://output', 'w+');
            fputcsv($handle, array('Nombre', 'CURP', 'RFC', 'Correo', 'LugarNacimiento', 'CodigoPostal'), ';');
            foreach ($oCustomer as $customer) {
                fputcsv($handle, array(
                    $customer->getFullName(),
                    $customer->getCurp(),
                    $customer->getRfc(),
                    $customer->getEmail(),
                    $customer->getNamePlaceOfBirth(),
                    $customer->getPostCode(), ), ';');
            }
            fclose($handle);
        });
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', "attachment; filename={$sFileName}");
        return $response;
    }

}
