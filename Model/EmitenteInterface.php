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


interface EmitenteInterface extends ParteInterface {

    /**
     * Retorna o nome fantasia.
     *
     * @return string
     */
    public function getNomeFantasia();

    const CODIGO_REGIME_TRIBUTARIO_SIMPLES_NACIONAL = 1;
    const CODIGO_REGIME_TRIBUTARIO_SIMPLES_NACIONAL_COM_EXCESSO = 2;
    const CODIGO_REGIME_TRIBUTARIO_REGIME_NORMAL = 3;

    /**
     * Código de Regime Tributário
     *
     * Este campo será obrigatoriamente preenchido com:
     *
     *   1 – Simples Nacional;
     *   2 – Simples Nacional – excesso de sublimite de receita bruta;
     *   3 – Regime Normal. (v2.0).
     *
     * @return int
     */
    public function getCodigoRegimeTributario();
}