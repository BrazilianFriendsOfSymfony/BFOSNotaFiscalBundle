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


class Emitente extends Parte implements EmitenteInterface
{
    protected $nomeFantasia;

    protected $codigoRegimeTributario;

    /**
     * Retorna o nome fantasia.
     *
     * @return string
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

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
    public function getCodigoRegimeTributario()
    {
        return $this->codigoRegimeTributario;
    }


    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
        return $this;
    }

    public function setCodigoRegimeTributario($codigoRegimeTributario)
    {
        $this->codigoRegimeTributario = $codigoRegimeTributario;
        return $this;
    }
}
