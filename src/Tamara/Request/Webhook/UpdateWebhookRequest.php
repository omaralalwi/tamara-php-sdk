<?php

declare(strict_types=1);

namespace Tamara\Request\Webhook;

use Tamara\Model\Webhook;

class UpdateWebhookRequest
{
    /**
     * @var string
     */
    private $webhookId;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $events;

    /**
     * @var array|null
     */
    private $headers;

    public function __construct(string $webhookId, string $url, array $events)
    {
        $this->webhookId = $webhookId;
        $this->url = $url;
        $this->events = $events;
    }

    public function getWebhookId(): string
    {
        return $this->webhookId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function getHeaders(): array
    {
        return $this->headers ?? [];
    }

    public function addHeaders(string $key, $value): void
    {
        $this->headers[$key] = $value;
    }

    public function toArray(): array
    {
        return [
            Webhook::WEBHOOK_ID => $this->getWebhookId(),
            Webhook::URL        => $this->getUrl(),
            Webhook::EVENTS     => $this->getEvents(),
            Webhook::HEADERS    => $this->getHeaders(),
        ];
    }
}