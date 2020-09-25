<?php


namespace SymfonyLab\RocketGateGatewayBundle\OneClick;


use SymfonyLab\RocketGateReport\MerchantInterface;

interface OneClickRequestInterface
{
    public function getMerchant(): MerchantInterface;

    public function getCustomer(): string;

    public function getInvoice(): string;

    public function getCardHash(): string;

    public function getAmount(): float;
}
