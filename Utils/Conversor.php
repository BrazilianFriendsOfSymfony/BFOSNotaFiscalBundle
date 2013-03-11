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

use BFOS\NotaFiscalBundle\Model\ItemNotaFiscalInterface;
use BFOS\NotaFiscalBundle\Model\NotaFiscalInterface;

class Conversor implements ConversorInterface {

    /**
     * Formata uma ou um conjunto de notas fiscais no formato TXT para importacao
     * no emissor de NFE 2.0.
     *
     * @param array|NotaFiscalInterface $notasFiscais Array of NotaFiscalInterface
     *
     * @return string
     */
    public function converterParaTXT($notasFiscais)
    {
        return self::converterParaTXTHelper($notasFiscais);
    }

    /**
     * Formata uma ou um conjunto de notas fiscais no formato TXT para importacao
     * no emissor de NFE 2.0.
     *
     * @param array|NotaFiscalInterface $notasFiscais Array of NotaFiscalInterface
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    static public function converterParaTXTHelper($notasFiscais){

        if($notasFiscais instanceof NotaFiscalInterface){
            $notasFiscais = array($notasFiscais);
        } else if(!is_array($notasFiscais)) {
            throw new \InvalidArgumentException('$notasFiscais is not array or instance of NotaFiscalInterface');
        }

        $result = 'NOTAFISCAL|'.count($notasFiscais) . "\n";

        /**
         * @var NotaFiscalInterface $nota
         */
        foreach ($notasFiscais as $nota)
        {
            $result .= self::converterNotaFiscalParaTXT($nota);
        }
        return $result;
    }

    static public function converterNotaFiscalParaTXT(NotaFiscalInterface $nota){

        $r = '';

        // A
        $r .= self::converterNotaFiscaParaTXTGrupoA($nota) . "\n";

        // B
        $r .= self::converterNotaFiscaParaTXTGrupoB($nota) . "\n";

        // C
        $r .= self::converterNotaFiscaParaTXTGrupoC($nota) . "\n";

        // E
        $r .= self::converterNotaFiscaParaTXTGrupoE($nota) . "\n";

        $i = 1;
        /**
         * @var ItemNotaFiscalInteface $item
         */
        foreach ($nota->getItens() as $item) {
            $r .= self::converterNotaFiscaParaTXTGrupoItem($item, $i) . "\n";
            $i++;
        }

        $r .= self::converterNotaFiscaParaTXTGrupoW($nota) . "\n";

        return $r;
    }

    static public function converterNotaFiscaParaTXTGrupoA(NotaFiscalInterface $nota)
    {
        return 'A|' . $nota->getVersao() . '|' . $nota->getIdentificador() . '|';
    }

    static public function converterNotaFiscaParaTXTGrupoB(NotaFiscalInterface $nota)
    {
        $dataEmissao = '';
        if ($nota->getDataEmissao() instanceof \DateTime) {
            $dataEmissao = $nota->getDataEmissao()->format('Y-m-d');
        }
        $dataSaidaEntrada = '';
        $horaSaidaEntrada = '';
        if ($nota->getDataHoraSaidaEntrada() instanceof \DateTime) {
            $dataSaidaEntrada = $nota->getDataHoraSaidaEntrada()->format('Y-m-d');
            $horaSaidaEntrada = $nota->getDataHoraSaidaEntrada()->format('H:i:s');
        }
        $dadosLinha = array(
            $nota->getCodigoUf(),
            $nota->getCodigoNumerico(),
            $nota->getNaturezaOperacao(),
            $nota->getIndicadorFormaPagamento(),
            $nota->getCodigoModeloDocumento(),
            $nota->getSerieDocumento(),
            $nota->getNumeroDocumento(),
            $dataEmissao,
            $dataSaidaEntrada,
            $horaSaidaEntrada,
            $nota->getTipoOperacao(),
            $nota->getMunicipioCodigoFatoGerador(),
            $nota->getFormatoImpressaoDanfe(),
            $nota->getTipoEmissao(),
            $nota->getDigitoVerificadorChaveAcesso(),
            $nota->getIdentificacaoAmbiente(),
            $nota->getFinalidadeEmissao(),
            $nota->getProcessoEmissao(),
            $nota->getVersaoProcessoEmissao(),
            $nota->getDataHoraEntradaEmContingencia(),
            $nota->getJustificafivaEntradaEmContingencia()
        );
        return 'B|' . implode(
            '|',
            $dadosLinha
        );
    }

    static public function converterNotaFiscaParaTXTGrupoC(NotaFiscalInterface $nota)
    {
        if (!$nota->getEmitente()){
            return '';
        }
        $e = $nota->getEmitente();
        $dadosLinha = array(
            $e->getNome(),
            $e->getNomeFantasia(),
            $e->getInscricaoEstadual(),
            '',
            '',
            '',
            $e->getCodigoRegimeTributario()
        );
        $C = 'C|' . implode('|', $dadosLinha) . "|\n";
        $C02 = "C02|" . $e->getCnpj() . "|\n";

        $dadosLinha = array(
            $e->getLogradouro(),
            $e->getNumero(),
            $e->getComplemento(),
            $e->getBairro(),
            $e->getMunicipioCodigo(),
            $e->getMunicipio(),
            $e->getUf(),
            $e->getCep(),
            $e->getPaisCodigo(),
            $e->getPais(),
            $e->getTelefone()
        );
        $C05 = 'C05|' . implode('|', $dadosLinha) . "|";
        return $C . $C02 . $C05;
    }

    static public function converterNotaFiscaParaTXTGrupoE(NotaFiscalInterface $nota)
    {
        if (!$nota->getDestinatario()){
            return '';
        }
        $d = $nota->getDestinatario();
        $dadosLinha = array(
            $d->getNome(),
            $d->getInscricaoEstadual(),
            '',
            ''
        );
        $C = 'E|' . implode('|', $dadosLinha) . "|\n";
        if($d->getCnpj()){
            $C02 = "E02|" . $d->getCnpj() . "|\n";
        } else {
            $C02 = "E03|" . $d->getCpf() . "|\n";
        }

        $dadosLinha = array(
            $d->getLogradouro(),
            $d->getNumero(),
            $d->getComplemento(),
            $d->getBairro(),
            $d->getMunicipioCodigo(),
            $d->getMunicipio(),
            $d->getUf(),
            $d->getCep(),
            $d->getPaisCodigo(),
            $d->getPais(),
            $d->getTelefone()
        );
        $C05 = 'E05|' . implode('|', $dadosLinha) . "|";
        return $C . $C02 . $C05;
    }

    static public function converterNotaFiscaParaTXTGrupoItem(ItemNotaFiscalInterface $item, $i)
    {
        $H = sprintf("H|%d||\n", $i);
        $valorUnitarioComercial = number_format($item->getValorUnitarioComercial(), 2, '.', '');
        $valorUnitarioTributavel = number_format($item->getValorUnitarioTributavel(), 2, '.', '');
        $valorTotal = number_format($item->getValorTotal(), 2, '.', '');
        $valorTotalFrete = $item->getValorTotalFrete() > 0 ? number_format($item->getValorTotalFrete(), 2, '.', '') : '';
        $dados = array(
            $item->getCodigo(),
            $item->getCodigoEAN(),
            $item->getDescricao(),
            $item->getCodigoNCM(),
            $item->getCodigoExTipi(),
            $item->getCFOP(),
            $item->getUnidadeComercial(),
            $item->getQuantidadeComercial(),
            $valorUnitarioComercial,
            $valorTotal,
            $item->getCodigoGTIN(),
            $item->getUnidadeTributavel(),
            $item->getQuantidadeTributavel(),
            $valorUnitarioTributavel,
            $valorTotalFrete,
            "",
            "",
            "",
            $item->getValorBrutoCompoeValorTotalNfe(),
            "",
            ""
        );
        $H .= "I|" . implode("|", $dados) . "|\n";
        $H .= "M|
N|
N10d|0|400|
O|||||052|
O08|02|
Q|
Q04|07|
S|
S04|07|";
        return $H;
    }

    static public function converterNotaFiscaParaTXTGrupoW(NotaFiscalInterface $nota)
    {
        $totalItens = number_format($nota->getValorTotalItens(), 2, '.', '');
        $totalFrete = number_format($nota->getValorTotalFrete(), 2, '.', '');
        $totalNfe = number_format($nota->getValorTotal(), 2, '.', '');
        $H = sprintf("W|
W02|0.00|0.00|0.00|0.00|%s|%s|0.00|0.00|0.00|0.00|0.00|0.00|0.00|%s|
X|0|",
            $totalItens,
            $totalFrete,
            $totalNfe
        );

        return $H;
    }

}