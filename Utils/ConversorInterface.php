<?php
/*
* This file is part of the Duo Criativa software.
* Este arquivo é parte do software da Duo Criativa.
*
* (c) Paulo Ribeiro <paulo@duocriativa.com.br>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace BFOS\NotaFiscalBundle\Utils;


interface ConversorInterface {

    /**
     * Formata uma ou um conjunto de notas fiscais no formato TXT para importacao
     * no emissor de NFE 2.0.
     *
     * @param array|NotaFiscalInterface $notasFiscais Array of NotaFiscalInterface
     *
     * @return string
     */
    static public function converterParaTXT($notasFiscais);

}