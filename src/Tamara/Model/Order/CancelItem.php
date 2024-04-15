<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use Tamara\Model\Money;
use DateTimeImmutable;
use DateTime;

class CancelItem
{
    private const
        CANCEL_ID = 'cancel_id',
        ORDER_ID = 'order_id',
        TOTAL_AMOUNT = 'total_amount',
        ITEMS = 'items',
        CREATED_AT = 'created_at';

    /**
     * @var string
     */
    private $cancelId;

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var OrderItemCollection
     */
    private $items;

    /**
     * @var DateTimeImmutable
     */
    private $createdAt;

    public static function fromArray(array $data): CancelItem
    {
        $self = new self();
        $self->setCancelId($data[self::CANCEL_ID]);
        $self->setOrderId($data[self::CANCEL_ID]);
        $self->setItems(OrderItemCollection::create($data[self::ITEMS]));
        $self->setTotalAmount(Money::fromArray($data[self::TOTAL_AMOUNT]));
        $self->setCreatedAt(new DateTimeImmutable($data[self::CREATED_AT]));

        return $self;
    }

    public function getCancelId(): string
    {
        return $this->cancelId;
    }

    public function setCancelId(string $cancelId): void
    {
        $this->cancelId = $cancelId;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(Money $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    public function setItems(OrderItemCollection $items): void
    {
        $this->items = $items;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function toArray(): array
    {
        return [
            self::CANCEL_ID    => $this->getCancelId(),
            self::ORDER_ID     => $this->getOrderId(),
            self::ITEMS        => $this->getItems()->toArray(),
            self::TOTAL_AMOUNT => $this->getTotalAmount()->toArray(),
            self::CREATED_AT   => $this->getCreatedAt()->format(DateTime::ATOM),
        ];
    }
}