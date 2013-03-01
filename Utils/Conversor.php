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

use BFOS\NotaFiscalBundle\Model\NotaFiscalInterface;

class Conversor implements ConversorInterface {

    /**
     * Formata uma ou um conjunto de notas fiscais no formato TXT para importacao
     * no emissor de NFE 2.0.
     *
     * @param array|NotaFiscalInterface $notasFiscais Array of NotaFiscalInterface
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    static public function converterParaTXT($notasFiscais){

        if($notasFiscais instanceof NotaFiscalInterface){
            $notasFiscais = array($notasFiscais);
        } else if(!is_array($notasFiscais)) {
            throw new \InvalidArgumentException('$notasFiscais is not array or instance of NotaFiscalInterface');
        }

        $result = '';

        /**
         * @var NotaFiscalInterface $nota
         */
        foreach ($notasFiscais as $nota)
        {
            $result .= self::converterNotaFiscalParaTXT($nota);
        }
        return $result;
    }

    static protected function converterNotaFiscalParaTXT(NotaFiscalInterface $nota){

        $r = '';

        // A
        $r .= 'A|' . $nota->getVersao() . '|' . $nota->getIdentificador() . '|';

        // B
        $r .= 'B|' . implode('|', array(
                $nota->getCodigoUf(),
                $nota->getCodigoNumerico(),
                $nota->getNaturezaOperacao(),
                $nota->getIndicadorFormaPagamento(),
                $nota->getCodigoModeloDocumento(),
                $nota->getSerieDocumento(),
                $nota->getNumeroDocumento(),
                $nota->getDataEmissao()->format('Y-m-d'),
                $nota->getDataHoraSaidaEntrada()->format('Y-m-d'),
                $nota->getDataHoraSaidaEntrada()->format('H:i:s'),
                $nota->getTipoOperacao(),
                $nota->getgetMunicipioCodigoFatoGerador()
            ));
    }

}