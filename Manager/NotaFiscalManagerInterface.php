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


interface NotaFiscalManagerInterface {

    /**
     * Formata um conjunto de notas fiscais no formato TXT para importacao
     * no emissor de NFE 2.0.
     *
     * @param array $notasFiscais Array of NotaFiscalInterface
     *
     * @return string
     */
    public function formatarParaExportacaoTXT(array $notasFiscais);

    /**
     * Formata uma nota fiscal no formato XML, pronto para enviar para
     * o destinatário da nota.
     *
     * @param \BFOS\NotaFiscalBundle\Model\NotaFiscalInterface $notaFiscal
     *
     * @return mixed
     */
    public function formatarParaExportacaoXML(NotaFiscalInterface $notaFiscal);

}
