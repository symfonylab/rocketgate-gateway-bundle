<?php


namespace SymfonyLab\RocketGateGatewayBundle;


class FailRebillResponse implements RebillResponseInterface
{
    private int $code;

    private int $reason;

    /**
     * FailRebillResponse constructor.
     * @param int $code
     */
    public function __construct(int $code, int $reason)
    {
        $this->code = $code;
        $this->reason = $reason;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getReason(): int
    {
        return $this->reason;
    }
}
