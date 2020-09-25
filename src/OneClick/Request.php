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
     * @var int
     */
    private $siteId;

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
    private $transactionId;

    /**
     * @var string
     */
    private $productId;

    /**
     * @var float
     */
    private $amount;

    /**
     * Request constructor.
     * @param MerchantInterface $merchant
     * @param int $siteId
     * @param string $customer
     * @param string $invoice
     * @param string $transactionId
     * @param string $productId
     * @param float $amount
     */
    public function __construct(MerchantInterface $merchant, int $siteId, string $customer, string $invoice, string $transactionId, string $productId, float $amount)
    {
        $this->merchant = $merchant;
        $this->siteId = $siteId;
        $this->customer = $customer;
        $this->invoice = $invoice;
        $this->transactionId = $transactionId;
        $this->productId = $productId;
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
     * @return int
     */
    public function getSiteId(): int
    {
        return $this->siteId;
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
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}
