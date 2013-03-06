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


interface NotaFiscalInterface {

    // A - Dados da Nota Fiscal eletrônica

    /**
     * Versão do leiaute (v2.0)
     *
     * @return string
     */
    public function getVersao();

    /**
     * Identificador da TAG a ser assinada.
     *
     * Informar a chave de acesso da NF-e precedida do literal ‘NFe’,
     * acrescentada a validação do formato (v2.0).
     *
     * @return string
     */
    public function getIdentificador();

    // B - Identificação da Nota Fiscal eletrônica

    /**
     * Código da UF do emitente do Documento Fiscal.
     *
     * Utilizar a Tabela do IBGE de código de unidades da federação
     * (Anexo IV - Tabela de UF, Município e País).
     *
     * @return string
     */
    public function getCodigoUf();

    /**
     * Código numérico que compõe a Chave de Acesso.
     *
     * Número aleatório gerado pelo emitente para cada NF-e para evitar
     * acessos indevidos da NF-e. (v2.0)
     *
     * @return string
     */
    public function getCodigoNumerico();

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
    public function getNaturezaOperacao();

    /**
     * Indicador da forma de pagamento.
     *
     *   0 - pagamento à vista;
     *   1 - pagamento à prazo;
     *   2 - outros.
     *
     * @return int
     */
    public function getIndicadorFormaPagamento();

    /**
     * Código do Modelo do Documento Fiscal.
     *
     * Utilizar o código 55 para identificação da NF-e,
     * emitida em substituição ao modelo 1 ou 1A.
     *
     * @return string
     */
    public function getCodigoModeloDocumento();

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
    public function getSerieDocumento();

    /**
     * Número do Documento Fiscal.
     *
     * @return string
     */
    public function getNumeroDocumento();

    /**
     * Data de emissão do Documento Fiscal
     *
     * No XML o formato é "AAAA-MM-DD"
     *
     * @return \DateTime
     */
    public function getDataEmissao();

    /**
     * Data/Hora de Saída ou da Entrada da Mercadoria/Produto.
     *
     * No XML, existem campos separados para Data e Hora. Na geração do XML
     * deverá ser considerado isso. O formato da data no XML é "AAAA-MM-DD"
     * e da hora é "HH:MM:SS". (v2.0)
     *
     * @return \DateTime
     */
    public function getDataHoraSaidaEntrada();

    /**
     * Tipo de Operação.
     *
     *   0 - entrada
     *   1 - saída
     *
     * @return int
     */
    public function getTipoOperacao();

    /**
     * Código do Município de Ocorrência do Fato Gerador.
     *
     * Informar o município de ocorrência do fato gerador do ICMS.
     * Utilizar a Tabela do IBGE (consulte Tabela de UF, Município e País)
     *
     * @return string
     */
    public function getMunicipioCodigoFatoGerador();

    const FORMATO_IMPRESSAO_DANFE_RETRATO = 1;
    const FORMATO_IMPRESSAO_DANFE_PAISAGEM = 2;

    /**
     * Formato de impressão da DANFE.
     *
     *   1 - Retrato
     *   2 - Paisagem
     *
     * @return int
     */
    public function getFormatoImpressaoDanfe();

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
    public function getTipoEmissao();

    /**
     * Dígito Verificador da Chave de Acesso da NF-e
     *
     * Informar o DV da Chave de Acesso da NF-e, o DV será calculado com a aplicação do algoritmo
     * módulo 11 (base 2,9) da Chave de Acesso. (vide item 5 do Manual de Integração)
     *
     * @return int
     */
    public function getDigitoVerificadorChaveAcesso();

    /**
     * Identificação do Ambiente
     *
     *   1 - Produção
     *   2 - Homologação
     *
     * @return int
     */
    public function getIdentificacaoAmbiente();

    /**
     * Finalidade de emissão da NFe
     *
     *   1 - NF-e normal
     *   2 - NF-e complementar
     *   3 - NF-e de ajuste
     *
     * @return int
     */
    public function getFinalidadeEmissao();

    const PROCESSO_EMISSAO_APLICATIVO_CONTRIBUINTE = 0;
    const PROCESSO_EMISSAO_AVULSA_PELO_FISCO = 1;
    const PROCESSO_EMISSAO_AVULSA_PELO_CONTRIBUINTE_VIA_SITE_FISCO = 2;
    const PROCESSO_EMISSAO_APLICATIVO_DO_FISCO = 3;

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
    public function getProcessoEmissao();

    /**
     * Versão do Processo de emissão da NF-e
     *
     * Identificador da versão do processo de emissão (informar a versão do aplicativo emissor de NF-e).
     *
     * @return int
     */
    public function getVersaoProcessoEmissao();

    /**
     * Data e Hora da entrada em contingência
     *
     * Informar a data e hora de entrada em contingência no formato AAAA-MM-DDTHH:MM:SS (v.2.0).
     *
     * @return \DateTime
     */
    public function getDataHoraEntradaEmContingencia();

    /**
     * Justificativa da entrada em contingência
     *
     * Informar a Justificativa da entrada em (v.2.0)
     *
     * @return string
     */
    public function getJustificafivaEntradaEmContingencia();

    /**
     * Destinario da nota fiscal.
     *
     * @return DestinatarioInterface
     */
    public function getDestinatario();

    /**
     * Emitente da nota fiscal.
     *
     * @return EmitenteInterface
     */
    public function getEmitente();

    /**
     * @return array Os itens da Nota Fiscal
     */
    public function getItens();

    /**
     * Valor Total dos produtos e serviços
     *
     * @return float
     */
    public function getValorTotalItens();

    /**
     * Valor Total de frete da NFE.
     *
     * @return float
     */
    public function getValorTotalFrete();

    /**
     * Valor Total da NFE.
     *
     * Inclui o valor dos itens, frete, etc
     *
     * @return float
     */
    public function getValorTotal();

}