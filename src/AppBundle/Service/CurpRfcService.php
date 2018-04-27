<?php

namespace AppBundle\Service;


error_reporting(E_ERROR | E_PARSE);

/**
 * Get CURP/RFC from http://www.ossc.com.mx/curp.php
 *
 * 
 */
class CurpRfcService 
{

    /**
     * @param   object    $oCustomer     Customer information       
     * @return  array    
     */
    function processRequestCurpRfc($oCustomer) 
    {
        $curl = curl_init();
        $date = $oCustomer->getDateOfBirth();
        $sDay = $date->format('d');
        $sMonth = $date->format('m');
        $sYear = $date->format('Y');
        $sUrl = "http://www.ossc.com.mx/curp.php";
        $sFields = "paterno={$oCustomer->getFirstSurname()}&materno={$oCustomer->getSecondSurname()}&nombre={$oCustomer->getFirstName()}&dia={$sDay}&mes={$sMonth}&anio={$sYear}&entidad={$oCustomer->getPlaceOfBirth()}&sexo={$oCustomer->getGender()}&Submit=";
        curl_setopt_array($curl, array(
            CURLOPT_URL => $sUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $sFields,
            CURLOPT_HTTPHEADER => array("Cache-Control: no-cache", "Content-Type: application/x-www-form-urlencoded"),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) 
        {
            return array('status'=>'error','message'=>$err);           
        } 
            else 
        {
            $html = html_entity_decode($response);
            curl_close($curl);
            $doc = new \DOMDocument();
            $doc->loadHTML($html);
            $xpath = new \DOMXPath($doc);
            $sData = $xpath->query('//font');
            $aTempData = array();
            $iCounter = 0;
            foreach ($sData as $sItem) 
            {
                if ($iCounter != 0) 
                {
                    $aTempData[] = str_replace(":", "", trim($sItem->nodeValue));
                }
                $iCounter++;
            }
            for ($i = 0; $i < count($aTempData); $i = $i + 2)
            {
                $aResult[] = array($aTempData[$i] => $aTempData[$i + 1]);
            }
            return $aResult;
        }
    }

}
