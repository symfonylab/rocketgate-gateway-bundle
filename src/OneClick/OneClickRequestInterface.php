<?php


namespace SymfonyLab\RocketGateGatewayBundle\OneClick;


use SymfonyLab\RocketGateReport\MerchantInterface;

interface OneClickRequestInterface
{
    public function getMerchant(): MerchantInterface;

    public function getSiteId(): int;

    public function getCustomer(): string;

    public function getInvoice(): string;

    public function getTransactionId(): string;

    public function getProductId(): string;

    public function getAmount(): float;
}
