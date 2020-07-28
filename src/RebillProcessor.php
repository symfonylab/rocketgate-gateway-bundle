<?php


namespace SymfonyLab\RocketGateGatewayBundle;

use RocketGate\Sdk\GatewayRequest;
use RocketGate\Sdk\GatewayResponse;
use RocketGate\Sdk\GatewayService;

class RebillProcessor
{
    public function process(RebillRequestInterface $request): ?RebillResponseInterface
    {
        if ($request instanceof RebillUpdateRequest) {
            return $this->update($request);
        }

        if ($request instanceof RebillCancelRequest) {
            return $this->cancel($request);
        }

        return null;
    }

    public function update(RebillUpdateRequest $rebill): RebillResponseInterface
    {
        $response = new GatewayResponse();
        $service = new GatewayService();
        $request = new GatewayRequest();
        $request->Set(GatewayRequest::MERCHANT_ID(), $rebill->getMerchant()->getId());
        $request->Set(GatewayRequest::MERCHANT_PASSWORD(), $rebill->getMerchant()->getPassword());
        $request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $rebill->getCustomer());
        $request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $rebill->getInvoice());
        $request->Set(GatewayRequest::CARD_HASH(), $rebill->getCardHash());
        $request->Set(GatewayRequest::AMOUNT(), $rebill->getAmount());
        $request->Set(GatewayRequest::REBILL_AMOUNT(), $rebill->getAmount());
        $request->Set(GatewayRequest::CURRENCY(), $rebill->getCurrency());
        $request->Set(GatewayRequest::REBILL_START(), $rebill->getStart()->format('Y-m-d H:i:s'));
        $request->Set(GatewayRequest::REBILL_FREQUENCY(), $rebill->getFrequency());
        $request->Set(GatewayRequest::REBILL_END_DATE(), "CLEAR");

        if ($service->PerformRebillUpdate($request, $response)) {

            return new SuccessUpdateRebillResponse(
                $response->Get(GatewayResponse::TRANSACT_ID()),
                $response->Get(GatewayResponse::REBILL_END_DATE())
            );
        } else {

            return new FailRebillResponse(
                (int)$response->Get(GatewayResponse::RESPONSE_CODE()),
                (int)$response->Get(GatewayResponse::REASON_CODE()),
            );
        }
    }

    public function cancel(RebillCancelRequest $rebill): RebillResponseInterface
    {
        $response = new GatewayResponse();
        $service = new GatewayService();
        $request = new GatewayRequest();
        $request->Set(GatewayRequest::MERCHANT_ID(), $rebill->getMerchant()->getId() );
        $request->Set(GatewayRequest::MERCHANT_PASSWORD(), $rebill->getMerchant()->getPassword());

        $request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $rebill->getCustomer());
        $request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $rebill->getInvoice());
        if ($service->PerformRebillCancel($request, $response)) {
            return new SuccessCancelRebillResponse();
        }

        return new FailRebillResponse(
            (int)$response->Get(GatewayResponse::RESPONSE_CODE()),
            (int)$response->Get(GatewayResponse::REASON_CODE()),
        );
    }
}
