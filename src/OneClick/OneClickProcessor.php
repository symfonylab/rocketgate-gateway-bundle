<?php


namespace SymfonyLab\RocketGateGatewayBundle\OneClick;


use RocketGate\Sdk\GatewayRequest;
use RocketGate\Sdk\GatewayResponse;
use RocketGate\Sdk\GatewayService;

class OneClickProcessor
{
    public function process(OneClickRequestInterface $request): bool
    {
        $response = new GatewayResponse();
        $service = new GatewayService();
        $gatewayRequest = new GatewayRequest();
        $gatewayRequest->Set(GatewayRequest::MERCHANT_ID(), $request->getMerchant()->getId());
        $gatewayRequest->Set(GatewayRequest::MERCHANT_PASSWORD(), $request->getMerchant()->getPassword());
        $gatewayRequest->Set(GatewayRequest::MERCHANT_SITE_ID(), $request->getSiteId());
//        $gatewayRequest->Set(GatewayRequest::IPADDRESS(), $_SERVER['REMOTE_ADDR']);

        $gatewayRequest->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $request->getCustomer());
        $gatewayRequest->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $request->getInvoice());
        $gatewayRequest->Set(GatewayRequest::PAYINFO_TRANSACT_ID(), $request->getTransactionId());

        $gatewayRequest->Set(GatewayRequest::AMOUNT(), $request->getAmount());
        $gatewayRequest->Set(GatewayRequest::MERCHANT_PRODUCT_ID(), $request->getProductId());
        $gatewayRequest->Set(GatewayRequest::CURRENCY(), 'USD');

        if ($service->PerformPurchase($gatewayRequest, $response)) {
            return true;
        }

        return false;
    }
}
