<?php
/**
 * Created by PhpStorm.
 * User: Silvio Cedrim
 * Date: 14/12/2018
 * Time: 09:21
 */
require "../../vendor/autoload.php";
use MyCLabs\Enum\Enum;

class EnumTipoPagamento extends Enum
{

    const DINHEIRO = "Dinheiro";
    const CHEQUE = "Cheque";
    const CARTAO_DEBITO = "Cart&atilde;o d&eacute;bito";
    const CARTAO_CREDITO = "Cart&atilde;o cr&eacute;dito";
    const CARTAO_CREDITO_PARCELADO = "Cart&atilde;o cr&eacute;dito Parcelado";
    const DESCONTO = "Desconto";


}

