<?php


namespace SymfonyLab\RocketGateGatewayBundle;


use SymfonyLab\RocketGateReport\MerchantInterface;

final class RebillCancelRequest implements RebillRequestInterface
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
     * RebillCancelRequest constructor.
     * @param MerchantInterface $merchant
     * @param string $customer
     * @param string $invoice
     */
    public function __construct(MerchantInterface $merchant, string $customer, string $invoice)
    {
        $this->merchant = $merchant;
        $this->customer = $customer;
        $this->invoice = $invoice;
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
}
