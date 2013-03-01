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


interface ParteInterface {

    /**
     * Retorna o nome/razão social.
     *
     * @return string
     */
    public function getNome();

    /**
     * Retorna o CPF ou CNPJ.
     *
     * @return string
     */
    public function getCnpj();

    /**
     * Retorna o CPF.
     *
     * @return string
     */
    public function getCpf();

    /**
     * Retorna o endereço.
     *
     * @return string
     */
    public function getLogradouro();

    /**
     * Retorna o numero do logradouro.
     *
     * @return string
     */
    public function getNumero();

    /**
     * Retorna o bairro ou distrito.
     *
     * @return string
     */
    public function getBairro();

    /**
     * Retorna o código do município.
     *
     * @return string
     */
    public function getMunicipioCodigo();

    /**
     * Retorna o nome do município.
     *
     * @return string
     */
    public function getMunicipio();

    /**
     * Retorna o CEP.
     *
     * @return string
     */
    public function getCep();

    /**
     * Retorna o UF.
     *
     * @return string
     */
    public function getUf();

    /**
     * Retorna o código do país.
     *
     * @return string
     */
    public function getPaisCodigo();

    /**
     * Retorna o nome do país.
     *
     * @return string
     */
    public function getPais();

    /**
     * Retorna o telefone.
     *
     * @return string
     */
    public function getTelefone();

}