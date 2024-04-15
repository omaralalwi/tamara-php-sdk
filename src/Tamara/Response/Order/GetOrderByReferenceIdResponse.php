<?php

declare(strict_types=1);

namespace Tamara\Response\Order;

use Tamara\Model\Money;
use Tamara\Model\Order\Address;
use Tamara\Model\Order\Consumer;
use Tamara\Model\Order\Discount;
use Tamara\Model\Order\Order;
use Tamara\Model\Order\OrderItemCollection;
use Tamara\Model\Order\Transactions;
use Tamara\Response\ClientResponse;
use DateTimeImmutable;

class GetOrderByReferenceIdResponse extends ClientResponse
{
    private const
        ORDER_ID = 'order_id',
        ORDER_REFERENCE_ID = 'order_reference_id',
        ORDER_NUMBER = 'order_number',
        CONSUMER = 'consumer',
        STATUS = 'status',
        BILLING_ADDRESS = 'billing_address',
        SHIPPING_ADDRESS = 'shipping_address',
        PAYMENT_TYPE = 'payment_type',
        TOTAL_AMOUNT = 'total_amount',
        REFUNDED_AMOUNT = 'refunded_amount',
        CAPTURED_AMOUNT = 'captured_amount',
        TAX_AMOUNT = 'tax_amount',
        SHIPPING_AMOUNT = 'shipping_amount',
        DISCOUNT_AMOUNT = 'discount_amount',
        CANCELED_AMOUNT = 'canceled_amount',
        ITEMS = 'items',
        SETTLEMENT_STATUS = 'settlement_status',
        SETTLEMENT_DATE = 'settlement_date',
        CREATED_AT = 'created_at',
        TRANSACTIONS = 'transactions';

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $orderReferenceId;

    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Address|null
     */
    private $billingAddress;

    /**
     * @var Address
     */
    private $shippingAddress;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var null|int
     */
    private $instalments = null;

    /**
     * @var Money
     */
    private $refundedAmount;

    /**
     * @var Money
     */
    private $capturedAmount;

    /**
     * @var Money
     */
    private $taxAmount;

    /**
     * @var Money
     */
    private $shippingAmount;

    /**
     * @var Discount
     */
    private $discountAmount;

    /**
     * @var Money
     */
    private $canceledAmount;

    /**
     * @var OrderItemCollection
     */
    private $items;

    /**
     * @var string
     */
    private $settlementStatus;

    /**
     * @var DateTimeImmutable
     */
    private $settlementDate;

    /**
     * @var DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var Transactions
     */
    private $transactions;

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getOrderReferenceId(): string
    {
        return $this->orderReferenceId;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function getConsumer(): Consumer
    {
        return $this->consumer;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress ?? null;
    }

    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function getRefundedAmount(): Money
    {
        return $this->refundedAmount;
    }

    public function getCapturedAmount(): Money
    {
        return $this->capturedAmount;
    }

    public function getTaxAmount(): Money
    {
        return $this->taxAmount;
    }

    public function getShippingAmount(): Money
    {
        return $this->shippingAmount;
    }

    public function getDiscountAmount(): Discount
    {
        return $this->discountAmount;
    }

    public function getCanceledAmount(): Money
    {
        return $this->canceledAmount;
    }

    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    public function getSettlementStatus(): string
    {
        return $this->settlementStatus;
    }

    public function getSettlementDate(): ?DateTimeImmutable
    {
        return $this->settlementDate;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getTransactions(): Transactions
    {
        return $this->transactions;
    }

    public function getInstalments(): ?int
    {
        return $this->instalments;
    }

    protected function parse(array $responseData): void
    {
        $settlementDate = !empty($responseData[self::SETTLEMENT_DATE])
            ? new DateTimeImmutable($responseData[self::SETTLEMENT_DATE])
            : null;

        $this->orderId = $responseData[self::ORDER_ID];
        $this->orderReferenceId = $responseData[self::ORDER_REFERENCE_ID];
        $this->orderNumber = $responseData[self::ORDER_NUMBER] ?? $this->orderReferenceId;
        $this->consumer = Consumer::fromArray($responseData[self::CONSUMER]);
        $this->status = $responseData[self::STATUS];
        $this->billingAddress = is_array($responseData[self::BILLING_ADDRESS]) ? Address::fromArray($responseData[self::BILLING_ADDRESS]) : null;
        $this->shippingAddress = Address::fromArray($responseData[self::SHIPPING_ADDRESS]);
        $this->paymentType = $responseData[self::PAYMENT_TYPE] ?? '';
        $this->totalAmount = Money::fromArray($responseData[self::TOTAL_AMOUNT]);
        $this->refundedAmount = Money::fromArray($responseData[self::REFUNDED_AMOUNT]);
        $this->capturedAmount = Money::fromArray($responseData[self::CAPTURED_AMOUNT]);
        $this->taxAmount = Money::fromArray($responseData[self::TAX_AMOUNT]);
        $this->shippingAmount = Money::fromArray($responseData[self::SHIPPING_AMOUNT]);
        $this->discountAmount = Discount::fromArray($responseData[self::DISCOUNT_AMOUNT]);
        $this->canceledAmount = Money::fromArray($responseData[self::CANCELED_AMOUNT]);
        $this->items = OrderItemCollection::create($responseData[self::ITEMS]);
        $this->settlementStatus = $responseData[self::SETTLEMENT_STATUS] ?? '';
        $this->settlementDate = $settlementDate;
        $this->createdAt = new DateTimeImmutable($responseData[self::CREATED_AT]);
        $this->transactions = Transactions::fromArray($responseData[self::TRANSACTIONS]);
        $this->instalments = $responseData[Order::INSTALMENTS] ?? null;
    }
}
