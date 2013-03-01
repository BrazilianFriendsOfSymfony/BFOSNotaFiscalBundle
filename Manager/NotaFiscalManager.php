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

namespace BFOS\NotaFiscalBundle\Manager;

use \BFOS\NotaFiscalBundle\Model\NotaFiscalInterface;
use BFOS\NotaFiscalBundle\Utils\ConversorInterface;

class NotaFiscalManager implements NotaFiscalManagerInterface {

    /**
     * @var \BFOS\NotaFiscalBundle\Utils\ConversorInterface $conversor
     */
    protected $conversor;

    public function __construct(ConversorInterface $conversor)
    {
        $this->conversor = $conversor;
    }


    /**
     * Formata uma ou um conjunto de notas fiscais no formato TXT para importacao
     * no emissor de NFE 2.0.
     *
     * @param array|NotaFiscalInterface $notasFiscais Array of NotaFiscalInterface
     *
     * @return string
     */
    public function formatarParaExportacaoTXT($notasFiscais)
    {
        return $this->conversor->converterParaTXT($notasFiscais);
    }

    /**
     * Formata uma nota fiscal no formato XML, pronto para enviar para
     * o destinatário da nota.
     *
     * @param \BFOS\NotaFiscalBundle\Model\NotaFiscalInterface $notaFiscal
     *
     * @return mixed
     */
    public function formatarParaExportacaoXML(NotaFiscalInterface $notaFiscal)
    {
        // TODO: Implement formatarParaExportacaoXML() method.
    }


}