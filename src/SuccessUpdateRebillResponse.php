<?php


namespace SymfonyLab\RocketGateGatewayBundle;


class SuccessUpdateRebillResponse implements RebillResponseInterface
{
    /**
     * @var string
     */
    public $transactionId;

    /**
     * @var string
     */
    public $rebillDate;

    /**
     * SuccessRebillResponse constructor.
     * @param string $transactionId
     * @param string $rebillDate
     */
    public function __construct(string $transactionId, string $rebillDate)
    {
        $this->transactionId = $transactionId;
        $this->rebillDate = $rebillDate;
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
    public function getRebillDate(): string
    {
        return $this->rebillDate;
    }
}
