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

}