<?php

namespace SymfonyLab\RocketGateGatewayBundle\OneClick;

use SymfonyLab\RocketGateReport\MerchantInterface;

class Request implements OneClickRequestInterface
{
    /**
     * @var MerchantInterface
     */
    private $merchant;

    /**
     * @var string
     */
    private $customer;

    /**
     * @var string
     */
    private $invoice;

    /**
     * @var string
     */
    private $cardHash;

    /**
     * @var float
     */
    private $amount;

    /**
     * Request constructor.
     * @param MerchantInterface $merchant
     * @param string $customer
     * @param string $invoice
     * @param string $cardHash
     * @param float $amount
     */
    public function __construct(MerchantInterface $merchant, string $customer, string $invoice, string $cardHash, float $amount)
    {
        $this->merchant = $merchant;
        $this->customer = $customer;
        $this->invoice = $invoice;
        $this->cardHash = $cardHash;
        $this->amount = $amount;
    }

    /**
     * @return MerchantInterface
     */
    public function getMerchant(): MerchantInterface
    {
        return $this->merchant;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return string
     */
    public function getInvoice(): string
    {
        return $this->invoice;
    }

    /**
     * @return string
     */
    public function getCardHash(): string
    {
        return $this->cardHash;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}
