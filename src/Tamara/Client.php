<?php

namespace Tamara;

use Tamara\HttpClient\HttpClient;
use Tamara\Request\Order\AuthoriseOrderRequest;
use Tamara\Request\Checkout\CreateCheckoutRequest;
use Tamara\Request\Checkout\GetPaymentTypesRequest;
use Tamara\Request\Order\CancelOrderRequest;
use Tamara\Request\Payment\CaptureRequest;
use Tamara\Request\Payment\RefundRequest;
use Tamara\Request\RequestDispatcher;
use Tamara\Response\ClientResponse;
use Tamara\Response\Order\AuthoriseOrderResponse;
use Tamara\Response\Checkout\GetPaymentTypesResponse;
use Tamara\Response\Checkout\CreateCheckoutResponse;
use Tamara\Response\Payment\CancelResponse;
use Tamara\Response\Payment\CaptureResponse;
use Tamara\Response\Payment\RefundResponse;

class Client
{
    /**
     * @var string
     */
    public const VERSION = '1.0.0';

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var RequestDispatcher
     */
    private $requestDispatcher;

    /**
     * @param Configuration $configuration
     *
     * @return Client
     */
    public static function create(Configuration $configuration): Client
    {
        return new static($configuration->createHttpClient());
    }

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->requestDispatcher = new RequestDispatcher($httpClient);
    }

    /**
     * @param string $countryCode
     *
     * @return GetPaymentTypesResponse
     *
     * @throws Exception\RequestDispatcherException
     */
    public function getPaymentTypes(string $countryCode): GetPaymentTypesResponse
    {
        return $this->requestDispatcher->dispatch(new GetPaymentTypesRequest($countryCode));
    }

    /**
     * @param CreateCheckoutRequest $createCheckoutRequest
     *
     * @return CreateCheckoutResponse
     *
     * @throws Exception\RequestDispatcherException
     */
    public function createCheckout(CreateCheckoutRequest $createCheckoutRequest): CreateCheckoutResponse
    {
        return $this->requestDispatcher->dispatch($createCheckoutRequest);
    }

    /**
     * @param AuthoriseOrderRequest $authoriseOrderRequest
     *
     * @return AuthoriseOrderResponse
     *
     * @throws Exception\RequestDispatcherException
     */
    public function authoriseOrder(AuthoriseOrderRequest $authoriseOrderRequest): AuthoriseOrderResponse
    {
        return $this->requestDispatcher->dispatch($authoriseOrderRequest);
    }

    /**
     * @param CancelOrderRequest $cancelOrderRequest
     *
     * @return CancelResponse
     *
     * @throws Exception\RequestDispatcherException
     */
    public function cancelOrder(CancelOrderRequest $cancelOrderRequest): CancelResponse
    {
        return $this->requestDispatcher->dispatch($cancelOrderRequest);
    }

    /**
     * @param CaptureRequest $captureRequest
     *
     * @return CaptureResponse
     *
     * @throws Exception\RequestDispatcherException
     */
    public function capture(CaptureRequest $captureRequest): CaptureResponse
    {
        return $this->requestDispatcher->dispatch($captureRequest);
    }

    /**
     * @param RefundRequest $refundRequest
     *
     * @return RefundResponse
     *
     * @throws Exception\RequestDispatcherException
     */
    public function refund(RefundRequest $refundRequest): RefundResponse
    {
        return $this->requestDispatcher->dispatch($refundRequest);
    }
}
