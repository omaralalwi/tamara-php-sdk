<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use Tamara\Model\Money;

class Order
{
    public const
        ORDER_ID = 'order_id',
        TOTAL_AMOUNT = 'total_amount',
        ITEMS = 'items',
        CONSUMER = 'consumer',
        BILLING_ADDRESS = 'billing_address',
        SHIPPING_ADDRESS = 'shipping_address',
        DISCOUNT = 'discount',
        TAX_AMOUNT = 'tax_amount',
        SHIPPING_AMOUNT = 'shipping_amount',
        MERCHANT_URL = 'merchant_url',
        PAYMENT_TYPE = 'payment_type',
        ORDER_REFERENCE_ID = 'order_reference_id',
        ORDER_NUMBER = 'order_number',
        DESCRIPTION = 'description',
        COUNTRY_CODE = 'country_code',
        LOCALE = 'locale',
        PLATFORM = 'platform',
        DISCOUNT_AMOUNT = 'discount_amount',
        RISK_ASSESSMENT = 'risk_assessment',
        INSTALMENTS = 'instalments',
        EXPIRY_TIME = 'expires_in_minutes',
        PAY_BY_INSTALMENTS = 'PAY_BY_INSTALMENTS',
        PAY_BY_LATER = 'PAY_BY_LATER',
        ADDITIONAL_DATA = 'additional_data';

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
     * @var Money
     */
    private $totalAmount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var null|int
     */
    private $instalments = null;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var OrderItemCollection
     */
    private $items;

    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @var Address|null
     */
    private $billingAddress = null;

    /**
     * @var Address
     */
    private $shippingAddress;

    /**
     * @var Discount
     */
    private $discount;

    /**
     * @var Money
     */
    private $taxAmount;

    /**
     * @var Money
     */
    private $shippingAmount;

    /**
     * @var MerchantUrl
     */
    private $merchantUrl;

    /**
     * @var string the platform that the merchant is using such as Magento, OpenCart...
     */
    private $platform;

    /**
     * @var RiskAssessment
     */
    private $riskAssessment;

    /**
     * @var int
     */
    private $expiresInMinutes = 0;

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): Order
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrderReferenceId(): string
    {
        return $this->orderReferenceId;
    }

    public function setOrderReferenceId(string $orderReferenceId): Order
    {
        $this->orderReferenceId = $orderReferenceId;

        return $this;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber ?? $this->getOrderReferenceId();
    }

    public function setOrderNumber(string $orderNumber): Order
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(Money $totalAmount): Order
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Order
    {
        $this->currency = $currency;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description ?? '';
    }

    public function setDescription(string $description): Order
    {
        $this->description = $description;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): Order
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    public function setPaymentType(string $paymentType): Order
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function getInstalments(): ?int
    {
        return $this->isInstalments() ? $this->instalments : null;
    }

    public function setInstalments(?int $instalments): Order
    {
        $this->instalments = $instalments;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale ?? '';
    }

    public function setLocale(string $locale): Order
    {
        $this->locale = $locale;

        return $this;
    }

    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    public function setItems(OrderItemCollection $items): Order
    {
        $this->items = $items;

        return $this;
    }

    public function getConsumer(): Consumer
    {
        return $this->consumer;
    }

    public function setConsumer(Consumer $consumer): Order
    {
        $this->consumer = $consumer;

        return $this;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress ?? null;
    }

    public function setBillingAddress(Address $billingAddress): Order
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(Address $shippingAddress): Order
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function getDiscount(): Discount
    {
        return $this->discount;
    }

    public function setDiscount(Discount $discount): Order
    {
        $this->discount = $discount;

        return $this;
    }

    public function getTaxAmount(): Money
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(Money $taxAmount): Order
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    public function getShippingAmount(): Money
    {
        return $this->shippingAmount;
    }

    public function setShippingAmount(Money $shippingAmount): Order
    {
        $this->shippingAmount = $shippingAmount;

        return $this;
    }

    public function getMerchantUrl(): MerchantUrl
    {
        return $this->merchantUrl;
    }

    public function setMerchantUrl(MerchantUrl $merchantUrl): Order
    {
        $this->merchantUrl = $merchantUrl;

        return $this;
    }

    public function getPlatform(): string
    {
        return $this->platform ?? '';
    }

    public function setPlatform(string $platform): Order
    {
        $this->platform = $platform;

        return $this;
    }

    public function getRiskAssessment(): RiskAssessment
    {
        return $this->riskAssessment ?? new RiskAssessment([]);
    }

    public function setRiskAssessment(RiskAssessment $riskAssessment): Order
    {
        $this->riskAssessment = $riskAssessment;

        return $this;
    }

    public function isInstalments(): bool
    {
        return self::PAY_BY_INSTALMENTS === $this->getPaymentType();
    }

    public function getExpiresInMinutes(): int
    {
        return $this->expiresInMinutes;
    }

    public function setExpiresInMinutes(int $expiresInMinutes): Order
    {
        $this->expiresInMinutes = $expiresInMinutes;

        return $this;
    }

    public function toArray(): array
    {
        $result = [
            self::ORDER_REFERENCE_ID => $this->getOrderReferenceId(),
            self::ORDER_NUMBER       => $this->getOrderNumber(),
            self::TOTAL_AMOUNT       => $this->getTotalAmount()->toArray(),
            self::DESCRIPTION        => $this->getDescription(),
            self::COUNTRY_CODE       => $this->getCountryCode(),
            self::PAYMENT_TYPE       => $this->getPaymentType(),
            self::LOCALE             => $this->getLocale(),
            self::ITEMS              => $this->getItems()->toArray(),
            self::CONSUMER           => $this->getConsumer()->toArray(),
            self::BILLING_ADDRESS    => $this->getBillingAddress() ? $this->getBillingAddress()->toArray() : null,
            self::SHIPPING_ADDRESS   => $this->getShippingAddress()->toArray(),
            self::DISCOUNT           => $this->getDiscount()->toArray(),
            self::TAX_AMOUNT         => $this->getTaxAmount()->toArray(),
            self::SHIPPING_AMOUNT    => $this->getShippingAmount()->toArray(),
            self::MERCHANT_URL       => $this->getMerchantUrl()->toArray(),
            self::PLATFORM           => $this->getPlatform(),
            self::RISK_ASSESSMENT    => $this->getRiskAssessment()->getData(),
        ];

        if ($this->getInstalments() > 0 && $this->isInstalments()) {
            $result[self::INSTALMENTS] = $this->getInstalments();
        }

        if ($this->getExpiresInMinutes() > 0) {
            $result[self::EXPIRY_TIME] = $this->getExpiresInMinutes();
        }

        return $result;
    }
}
