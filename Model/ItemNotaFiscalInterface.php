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

namespace BFOS\NotaFiscalBundle\Model;


interface ItemNotaFiscalInterface {
    /**
     * Código do produto
     *
     * @return string
     */
    public function getCodigo();

    public function getCodigoEAN();

    public function getDescricao();

    public function getCodigoNCM();

    public function getCodigoExTipi();

    public function getCFOP();

    public function getUnidadeComercial();

    public function getQuantidadeComercial();

    public function getValorUnitarioComercial();

    public function getValorTotal();

    public function getCodigoGTIN();

    public function getUnidadeTributavel();

    public function getQuantidadeTributavel();

    public function getValorUnitarioTributavel();

    public function getValorTotalFrete();

    public function getValorTotalSeguro();

    public function getValorDesconto();

    public function getValorOutrasDespesas();

    /**
     * Indica se valor do Item (vProd) entra no valor total da NF-e (vProd)
     *
     * Este campo deverá ser
    preenchido com:
    0 – o valor do item (vProd)
    compõe o valor total da NF-e
    (vProd)
    1 – o valor do item (vProd) não
    compõe o valor total da NF-e (vProd) (v2.0)

     * @return int
     */
    public function getValorBrutoCompoeValorTotalNfe();
}