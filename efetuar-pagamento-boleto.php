<?php

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;



// ...
// Configure o ambiente
$environment = $environment = Environment::sandbox();

// Configure meu merchant
//$merchant = new Merchant('5cb9bdf7-3541-45c6-b6d6-b76020811183', 'WNSBSESTVQVQFXADPPBSCEDUCUWGHQETQNCAMGEZ');
$merchant = new Merchant('cb6c2a85-ec86-418c-9a84-fe40400d905e', 'MMZCCDCZLIHQIVARJIBOPERHWTWTTTDJFXRKAEII');

// Criar uma instância de Sale informando o ID do pedido na loja
$sale = new Sale('123');

// Criar uma instância de Customer informando o nome do cliente
$customer = $sale->customer($_POST['firstName'] . ' ' . $_POST['lastName'])
			->setIdentity('00000000001')
                  ->setIdentityType('CPF')
                  ->address()->setZipCode('22750012')
                             ->setCountry('BRA')
                             ->setState('MG')
                             ->setCity('Varginha')
                             ->setDistrict('Centro')
                             ->setStreet('Av Sem nome teste')
                             ->setNumber('123');


// Criar uma instância de Payment informando o valor do pagamento
$payment = $sale->payment((int) ($_POST['total'] . '00'));

$payment->setCapture(1);
			

		
$payment->setType(Payment::PAYMENTTYPE_BOLETO)
		->setAddress('Rua de Teste')
		->setBoletoNumber('1234')
		->setAssignor('Empresa de Teste LOONEY TUNES')
		->setDemonstrative('Desmonstrative Teste')
		->setExpirationDate(date('d/m/Y', strtotime('+1 month')))
		->setIdentification('11884926754')
		->setInstructions('Esse é um boleto de exemplo do LooneyTunes Ohh que que ha velhinho....');
		



// Criar o pagamento na Cielo
try {
    // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
    $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

    $paymentId = $sale->getPayment()->getPaymentId();
	
	/*echo $sale->getPayment()->getStatus();
	echo "-";
	echo $sale->getPayment()->getReturnCode();
	echo "<pre>";
	print_r($sale->getPayment());
	die();*/
	
	
	Header("Location: " . $sale->getPayment()->getUrl());

} catch (CieloRequestException $e) {

	Header("Location: retorno.php?cod=2&erro=" . $e->getCieloError()->getCode());
}