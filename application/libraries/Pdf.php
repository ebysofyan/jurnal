<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf
{


    function __construct()

    {

        $CI = &get_instance();

        log_message('Debug', 'mPDF class is loaded.');

    }


    function load($param = NULL)

    {

        require_once("./vendor/mpdf/mpdf/mpdf.php");


        if ($param == NULL) {

            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';

        }


        return new mPDF($param);

    }

}