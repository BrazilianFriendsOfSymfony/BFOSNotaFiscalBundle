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


class ItemNotaFiscal implements ItemNotaFiscalInterface
{
    protected $codigo;
    protected $codigoEAN;
    protected $descricao;
    protected $codigoNCM;
    protected $codigoExTipi;

    protected $CFOP;

    protected $unidadeComercial;

    protected $quantidadeComercial;

    protected $valorUnitarioComercial;

    protected $valorTotal;

    protected $codigoGTIN;

    protected $unidadeTributavel;

    protected $quantidadeTributavel;

    protected $valorUnitarioTributavel;

    protected $valorTotalFrete;

    protected $valorTotalSeguro;

    protected $valorDesconto;

    protected $valorOutrasDespesas;

    protected $somaAoTotal;


    public function setCFOP($CFOP)
    {
        $this->CFOP = $CFOP;
        return $this;
    }

    public function getCFOP()
    {
        return $this->CFOP;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigoEAN($codigoEAN)
    {
        $this->codigoEAN = $codigoEAN;
        return $this;
    }

    public function getCodigoEAN()
    {
        return $this->codigoEAN;
    }

    public function setCodigoExTipi($codigoExTipi)
    {
        $this->codigoExTipi = $codigoExTipi;
        return $this;
    }

    public function getCodigoExTipi()
    {
        return $this->codigoExTipi;
    }

    public function setCodigoGTIN($codigoGTIN)
    {
        $this->codigoGTIN = $codigoGTIN;
        return $this;
    }

    public function getCodigoGTIN()
    {
        return $this->codigoGTIN;
    }

    public function setCodigoNCM($codigoNCM)
    {
        $this->codigoNCM = $codigoNCM;
        return $this;
    }

    public function getCodigoNCM()
    {
        return $this->codigoNCM;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setQuantidadeComercial($quantidadeComercial)
    {
        $this->quantidadeComercial = $quantidadeComercial;
        return $this;
    }

    public function getQuantidadeComercial()
    {
        return $this->quantidadeComercial;
    }

    public function setQuantidadeTributavel($quantidadeTributavel)
    {
        $this->quantidadeTributavel = $quantidadeTributavel;
        return $this;
    }

    public function getQuantidadeTributavel()
    {
        return $this->quantidadeTributavel;
    }

    public function setUnidadeComercial($unidadeComercial)
    {
        $this->unidadeComercial = $unidadeComercial;
        return $this;
    }

    public function getUnidadeComercial()
    {
        return $this->unidadeComercial;
    }

    public function setUnidadeTributavel($unidadeTributavel)
    {
        $this->unidadeTributavel = $unidadeTributavel;
        return $this;
    }

    public function getUnidadeTributavel()
    {
        return $this->unidadeTributavel;
    }

    public function setValorDesconto($valorDesconto)
    {
        $this->valorDesconto = $valorDesconto;
        return $this;
    }

    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    public function setValorOutrasDespesas($valorOutrasDespesas)
    {
        $this->valorOutrasDespesas = $valorOutrasDespesas;
        return $this;
    }

    public function getValorOutrasDespesas()
    {
        return $this->valorOutrasDespesas;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
        return $this;
    }

    public function getValorTotal()
    {
        if(is_null($this->valorTotal) && $this->getQuantidadeComercial() && $this->getValorUnitarioComercial()){
            return $this->getQuantidadeComercial() * $this->getValorUnitarioComercial();
        }
        return $this->valorTotal;
    }

    public function setValorTotalFrete($valorTotalFrete)
    {
        $this->valorTotalFrete = $valorTotalFrete;
        return $this;
    }

    public function getValorTotalFrete()
    {
        return $this->valorTotalFrete;
    }

    public function setValorTotalSeguro($valorTotalSeguro)
    {
        $this->valorTotalSeguro = $valorTotalSeguro;
        return $this;
    }

    public function getValorTotalSeguro()
    {
        return $this->valorTotalSeguro;
    }

    public function setValorUnitarioComercial($valorUnitarioComercial)
    {
        $this->valorUnitarioComercial = $valorUnitarioComercial;
        return $this;
    }

    public function getValorUnitarioComercial()
    {
        return $this->valorUnitarioComercial;
    }

    public function setValorUnitarioTributavel($valorUnitarioTributavel)
    {
        $this->valorUnitarioTributavel = $valorUnitarioTributavel;
        return $this;
    }

    public function getValorUnitarioTributavel()
    {
        return $this->valorUnitarioTributavel;
    }

    public function setValorBrutoCompoeValorTotalNfe($somaAoTotal)
    {
        $this->somaAoTotal = $somaAoTotal;
        return $this;
    }

    public function getValorBrutoCompoeValorTotalNfe()
    {
        return $this->somaAoTotal;
    }



}
