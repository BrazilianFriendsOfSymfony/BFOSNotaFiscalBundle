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


class NotaFiscal implements NotaFiscalInterface
{
    protected $versao;
    protected $identificador;
    protected $codigoUf;
    protected $codigoNumerico;
    protected $naturezaOperacao;
    protected $indicadorFormaPagamento;
    protected $codigoModeloDocumento;
    protected $serieDocumento;
    protected $numeroDocumento;
    protected $dataEmissao;
    protected $dataHoraSaidaEntrada;
    protected $tipoOperacao;
    protected $municipioCodigoFatoGerador;
    protected $formatoImpressaoDanfe;
    protected $tipoEmissao;
    protected $digitoVerificadorChaveAcesso;
    protected $identificacaoAmbiente;
    protected $finalidadeEmissao;
    protected $processoEmissao;
    protected $versaoProcessoEmissao;
    protected $dataHoraEntradaEmContingencia;
    protected $justificafivaEntradaEmContingencia;

    protected $destinatario;
    protected $emitente;
    protected $itens;

    protected $valorTotalItens;

    public function __construct()
    {
        $this->versao = '2.00';
        $this->dataEmissao = new \DateTime();
        $this->setVersaoProcessoEmissao('2.2.0');
        $this->setFormatoImpressaoDanfe(NotaFiscalInterface::FORMATO_IMPRESSAO_DANFE_RETRATO);
        $this->setProcessoEmissao(NotaFiscalInterface::PROCESSO_EMISSAO_APLICATIVO_DO_FISCO);
        $this->codigoNumerico = sprintf("%08s", mt_rand(1000,99999999));
    }


    /**
     * Versão do leiaute (v2.0)
     *
     * @return string
     */
    public function getVersao()
    {
        return $this->versao;
    }

    /**
     * Identificador da TAG a ser assinada.
     *
     * Informar a chave de acesso da NF-e precedida do literal ‘NFe’,
     * acrescentada a validação do formato (v2.0).
     *
     * @return string
     */
    public function getIdentificador()
    {
        return $this->identificador;
    }

    /**
     * Código da UF do emitente do Documento Fiscal.
     *
     * Utilizar a Tabela do IBGE de código de unidades da federação
     * (Anexo IV - Tabela de UF, Município e País).
     *
     * @return string
     */
    public function getCodigoUf()
    {
        return $this->codigoUf;
    }

    /**
     * Código numérico que compõe a Chave de Acesso.
     *
     * Número aleatório gerado pelo emitente para cada NF-e para evitar
     * acessos indevidos da NF-e. (v2.0)
     *
     * @return string
     */
    public function getCodigoNumerico()
    {
        return $this->codigoNumerico;
    }

    /**
     * Descrição da Natureza da Operação
     *
     * Informar a natureza da operação de que decorrer a saída ou a entrada,
     * tais como: venda, compra, transferência, devolução, importação, consignação,
     * remessa (para fins de demonstração, de industrialização ou outra),
     * conforme previsto na alínea 'i', inciso I, art. 19 do CONVÊNIO S/Nº,
     * de 15 de dezembro de 1970.
     *
     * @return string
     */
    public function getNaturezaOperacao()
    {
        return $this->naturezaOperacao;
    }

    /**
     * Indicador da forma de pagamento.
     *
     *   0 - pagamento à vista;
     *   1 - pagamento à prazo;
     *   2 - outros.
     *
     * @return int
     */
    public function getIndicadorFormaPagamento()
    {
        return $this->indicadorFormaPagamento;
    }

    /**
     * Código do Modelo do Documento Fiscal.
     *
     * Utilizar o código 55 para identificação da NF-e,
     * emitida em substituição ao modelo 1 ou 1A.
     *
     * @return string
     */
    public function getCodigoModeloDocumento()
    {
        return $this->codigoModeloDocumento;
    }

    /**
     * Série do Documento Fiscal.
     *
     * Preencher com zeros na hipótese de a NF-e não possuir série. (v2.0)
     * Série 890-899 de uso exclusivo para emissão de NF-e avulsa,
     * pelo contribuinte com seu certificado digital, através do site
     * do Fisco (procEmi=2). (v2.0)
     * Serie 900-999 – uso exclusivo de NF-e emitidas no SCAN. (v2.0)
     *
     * @return string
     */
    public function getSerieDocumento()
    {
        return $this->serieDocumento;
    }

    /**
     * Número do Documento Fiscal.
     *
     * @return string
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Data de emissão do Documento Fiscal
     *
     * No XML o formato é "AAAA-MM-DD"
     *
     * @return \DateTime
     */
    public function getDataEmissao()
    {
        return $this->dataEmissao;
    }

    /**
     * Data/Hora de Saída ou da Entrada da Mercadoria/Produto.
     *
     * No XML, existem campos separados para Data e Hora. Na geração do XML
     * deverá ser considerado isso. O formato da data no XML é "AAAA-MM-DD"
     * e da hora é "HH:MM:SS". (v2.0)
     *
     * @return \DateTime
     */
    public function getDataHoraSaidaEntrada()
    {
        return $this->dataHoraSaidaEntrada;
    }

    /**
     * Tipo de Operação.
     *
     *   0 - entrada
     *   1 - saída
     *
     * @return int
     */
    public function getTipoOperacao()
    {
        return $this->tipoOperacao;
    }

    /**
     * Código do Município de Ocorrência do Fato Gerador.
     *
     * Informar o município de ocorrência do fato gerador do ICMS.
     * Utilizar a Tabela do IBGE (consulte Tabela de UF, Município e País)
     *
     * @return string
     */
    public function getMunicipioCodigoFatoGerador()
    {
        return $this->municipioCodigoFatoGerador;
    }

    /**
     * Formato de impressão da DANFE.
     *
     *   1 - Retrato
     *   2 - Paisagem
     *
     * @return int
     */
    public function getFormatoImpressaoDanfe()
    {
        return $this->formatoImpressaoDanfe;
    }

    /**
     * Tipo de Emissão da NF-e
     *
     *   1 - Normal – emissão normal;
     *   2 - Contingência FS – emissão em contingência com impressão do DANFE em Formulário de Segurança;
     *   3 - Contingência SCAN - emissão em contingência no Sistema de Contingência do Ambiente Nacional – SCAN;
     *   4 - Contingência DPEC - emissão em contingência com envio da Declaração Prévia de Emissão em
     *       Contingência - DPEC;
     *   5 - Contingência FS-DA - emissão em contingência com impressão do DANFE em Formulário de Segurança
     *       para Impressão de Documento Auxiliar de Documento Fiscal Eletrônico (FS-DA).
     *
     * @return int
     */
    public function getTipoEmissao()
    {
        return $this->tipoEmissao;
    }

    /**
     * Dígito Verificador da Chave de Acesso da NF-e
     *
     * Informar o DV da Chave de Acesso da NF-e, o DV será calculado com a aplicação do algoritmo
     * módulo 11 (base 2,9) da Chave de Acesso. (vide item 5 do Manual de Integração)
     *
     * @return int
     */
    public function getDigitoVerificadorChaveAcesso()
    {
        return $this->digitoVerificadorChaveAcesso;
    }

    /**
     * Identificação do Ambiente
     *
     *   1 - Produção
     *   2 - Homologação
     *
     * @return int
     */
    public function getIdentificacaoAmbiente()
    {
        return $this->identificacaoAmbiente;
    }

    /**
     * Finalidade de emissão da NFe
     *
     *   1 - NF-e normal
     *   2 - NF-e complementar
     *   3 - NF-e de ajuste
     *
     * @return int
     */
    public function getFinalidadeEmissao()
    {
        return $this->finalidadeEmissao;
    }

    /**
     * Identificador do processo de emissão da NF-e
     *
     *   0 - emissão de NF-e com aplicativo do contribuinte;
     *   1 - emissão de NF-e avulsa pelo Fisco;
     *   2 - emissão de NF-e avulsa, pelo contribuinte com seu certificado digital, através do site do Fisco;
     *   3 - emissão NF-e pelo contribuinte com aplicativo fornecido pelo Fisco.
     *
     * @return int
     */
    public function getProcessoEmissao()
    {
        return $this->processoEmissao;
    }

    /**
     * Versão do Processo de emissão da NF-e
     *
     * Identificador da versão do processo de emissão (informar a versão do aplicativo emissor de NF-e).
     *
     * @return int
     */
    public function getVersaoProcessoEmissao()
    {
        return $this->versaoProcessoEmissao;
    }

    /**
     * Data e Hora da entrada em contingência
     *
     * Informar a data e hora de entrada em contingência no formato AAAA-MM-DDTHH:MM:SS (v.2.0).
     *
     * @return \DateTime
     */
    public function getDataHoraEntradaEmContingencia()
    {
        return $this->dataHoraEntradaEmContingencia;
    }

    /**
     * Justificativa da entrada em contingência
     *
     * Informar a Justificativa da entrada em (v.2.0)
     *
     * @return string
     */
    public function getJustificafivaEntradaEmContingencia()
    {
        return $this->justificafivaEntradaEmContingencia;
    }


    /**
     * Destinario da nota fiscal.
     *
     * @return DestinatarioInterface
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Emitente da nota fiscal.
     *
     * @return EmitenteInterface
     */
    public function getEmitente()
    {
        return $this->emitente;
    }

    /**
     * @return array Os itens da Nota Fiscal
     */
    public function getItens()
    {
        return $this->itens;
    }

    /**
     * Valor Total dos produtos e serviços
     *
     * @return float
     */
    public function getValorTotalItens()
    {
        if(is_null($this->valorTotalItens)){
            $total = 0;
            /**
             * @var ItemNotaFiscalInterface $i
             */
            foreach ($this->itens as $i) {
                $total += $i->getValorTotal() ;
            }
            return $total;
        }
        return $this->valorTotalItens;
    }

    /**
     * Valor Total do frete dos produtos e serviços
     *
     * @return float
     */
    public function getValorTotalFreteItens()
    {
        $total = 0;
        /**
         * @var ItemNotaFiscalInterface $i
         */
        foreach ($this->itens as $i) {
            $total += $i->getValorTotalFrete();
        }
        return $total;
    }

    /**
     * Valor Total de frete da NFE.
     *
     * @return float
     */
    public function getValorTotalFrete()
    {
        return $this->getValorTotalFreteItens();
    }


    /**
     * Valor Total da NFE.
     *
     * Inclui o valor dos itens, frete, etc
     *
     * @return float
     */
    public function getValorTotal()
    {
        return $this->getValorTotalItens() + $this->getValorTotalFrete();
    }


    public function setCodigoModeloDocumento($codigoModeloDocumento)
    {
        $this->codigoModeloDocumento = $codigoModeloDocumento;
        return $this;
    }

    public function setCodigoNumerico($codigoNumerico)
    {
        $this->codigoNumerico = $codigoNumerico;
        return $this;
    }

    public function setCodigoUf($codigoUf)
    {
        $this->codigoUf = $codigoUf;
        return $this;
    }

    public function setDataEmissao($dataEmissao)
    {
        $this->dataEmissao = $dataEmissao;
        return $this;
    }

    public function setDataHoraSaidaEntrada($dataHoraSaidaEntrada)
    {
        $this->dataHoraSaidaEntrada = $dataHoraSaidaEntrada;
        return $this;
    }

    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;
        return $this;
    }

    public function setEmitente($emitente)
    {
        $this->emitente = $emitente;
        return $this;
    }

    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
        return $this;
    }

    public function setIndicadorFormaPagamento($indicadorFormaPagamento)
    {
        $this->indicadorFormaPagamento = $indicadorFormaPagamento;
        return $this;
    }

    public function setItens($itens)
    {
        $this->itens = $itens;
        return $this;
    }

    public function setMunicipioCodigoFatoGerador($municipioCodigoFatoGerador)
    {
        $this->municipioCodigoFatoGerador = $municipioCodigoFatoGerador;
        return $this;
    }

    public function setNaturezaOperacao($naturezaOperacao)
    {
        $this->naturezaOperacao = $naturezaOperacao;
        return $this;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
        return $this;
    }

    public function setSerieDocumento($serieDocumento)
    {
        $this->serieDocumento = $serieDocumento;
        return $this;
    }

    public function setTipoOperacao($tipoOperacao)
    {
        $this->tipoOperacao = $tipoOperacao;
        return $this;
    }

    public function setVersao($versao)
    {
        $this->versao = $versao;
        return $this;
    }

    public function setDataHoraEntradaEmContingencia($dataHoraEntradaEmContingencia)
    {
        $this->dataHoraEntradaEmContingencia = $dataHoraEntradaEmContingencia;
        return $this;
    }

    public function setDigitoVerificadorChaveAcesso($digitoVerificadorChaveAcesso)
    {
        $this->digitoVerificadorChaveAcesso = $digitoVerificadorChaveAcesso;
        return $this;
    }

    public function setFinalidadeEmissao($finalidadeEmissao)
    {
        $this->finalidadeEmissao = $finalidadeEmissao;
        return $this;
    }

    public function setFormatoImpressaoDanfe($formatoImpressaoDanfe)
    {
        $this->formatoImpressaoDanfe = $formatoImpressaoDanfe;
        return $this;
    }

    public function setIdentificacaoAmbiente($identificacaoAmbiente)
    {
        $this->identificacaoAmbiente = $identificacaoAmbiente;
        return $this;
    }

    public function setJustificafivaEntradaEmContingencia($justificafivaEntradaEmContingencia)
    {
        $this->justificafivaEntradaEmContingencia = $justificafivaEntradaEmContingencia;
        return $this;
    }

    public function setProcessoEmissao($processoEmissao)
    {
        $this->processoEmissao = $processoEmissao;
        return $this;
    }

    public function setTipoEmissao($tipoEmissao)
    {
        $this->tipoEmissao = $tipoEmissao;
        return $this;
    }

    public function setVersaoProcessoEmissao($versaoProcessoEmissao)
    {
        $this->versaoProcessoEmissao = $versaoProcessoEmissao;
        return $this;
    }

    public function setValorTotalItens($valorTotalItens)
    {
        $this->valorTotalItens = $valorTotalItens;
        return $this;
    }

}
