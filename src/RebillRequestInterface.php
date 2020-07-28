<?php


namespace SymfonyLab\RocketGateGatewayBundle;


use Nevmmv\RocketGate\MerchantInterface;

interface RebillRequestInterface
{
    public function getMerchant(): MerchantInterface;

    public function getCustomer(): string;

    public function getInvoice(): string;
}
