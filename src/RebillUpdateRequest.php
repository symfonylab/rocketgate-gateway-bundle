<?php


namespace SymfonyLab\RocketGateGatewayBundle;


use SymfonyLab\RocketGateReport\MerchantInterface;

final class RebillUpdateRequest implements RebillRequestInterface
{
    /**
     * @var MerchantInterface
     */
    private $merchant;

    private string $customer;

    private string $invoice;

    private string $cardHash;

    private float $amount;

    private string $currency = 'USD';

    private \DateTimeImmutable $start;

    private string $frequency = 'MONTHLY';

    private int $productId = 0;

    /**
     * RebillUpdateRequest constructor.
     * @param MerchantInterface $merchant
     * @param string $customer
     * @param string $invoice
     * @param string $cardHash
     * @param float $amount
     * @param string $currency
     * @param \DateTimeImmutable $start
     * @param string $frequency
     */
    public function __construct(MerchantInterface $merchant, string $customer, string $invoice, string $cardHash, float $amount, string $currency, \DateTimeImmutable $start, string $frequency, int $productId=0)
    {
        $this->merchant = $merchant;
        $this->customer = $customer;
        $this->invoice = $invoice;
        $this->cardHash = $cardHash;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->start = $start;
        $this->frequency = $frequency;
        $this->productId = $productId;
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

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getStart(): \DateTimeImmutable
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getFrequency(): string
    {
        return $this->frequency;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }
}
