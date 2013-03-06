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


abstract class Parte implements ParteInterface
{
    protected $nome;
    protected $cnpj;
    protected $cpf;
    protected $inscricaoEstadual;
    protected $logradouro;
    protected $numero;
    protected $complemento;
    protected $bairro;
    protected $municipioCodigo;
    protected $municipio;
    protected $cep;
    protected $uf;
    protected $paisCodigo;
    protected $pais;
    protected $telefone;

    public function __construct()
    {
        $this->paisCodigo = '1058'; // Brasil
        $this->pais = 'Brasil';
    }


    /**
     * Retorna o nome/razão social.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Retorna o CPF ou CNPJ.
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Retorna o CPF.
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Retorna a I.E.
     *
     * @return string
     */
    public function getInscricaoEstadual()
    {
        return $this->inscricaoEstadual;
    }

    /**
     * Retorna o endereço.
     *
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Retorna o numero do logradouro.
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Retorna o complemento.
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Retorna o bairro ou distrito.
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Retorna o código do município.
     *
     * @return string
     */
    public function getMunicipioCodigo()
    {
        return $this->municipioCodigo;
    }

    /**
     * Retorna o nome do município.
     *
     * @return string
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Retorna o CEP.
     *
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Retorna o UF.
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Retorna o código do país.
     *
     * @return string
     */
    public function getPaisCodigo()
    {
        return $this->paisCodigo;
    }

    /**
     * Retorna o nome do país.
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Retorna o telefone.
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    public function setCpf($cpf)
    {
        $this->cpf = str_replace('.', '', str_replace('-','',$cpf));
        return $this;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = str_replace('.', '', str_replace('-','',$cnpj));;
        return $this;
    }

    public function setInscricaoEstadual($inscricaoEstadual)
    {
        $this->inscricaoEstadual = $inscricaoEstadual;
        return $this;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
        return $this;
    }

    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
        return $this;
    }

    public function setMunicipioCodigo($municipioCodigo)
    {
        $this->municipioCodigo = $municipioCodigo;
        return $this;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
        return $this;
    }

    public function setPaisCodigo($paisCodigo)
    {
        $this->paisCodigo = $paisCodigo;
        return $this;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }

}
