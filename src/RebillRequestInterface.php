<?php


namespace SymfonyLab\RocketGateGatewayBundle;


use SymfonyLab\RocketGateReport\MerchantInterface;

interface RebillRequestInterface
{
    public function getMerchant(): MerchantInterface;

    public function getCustomer(): string;

    public function getInvoice(): string;
}
