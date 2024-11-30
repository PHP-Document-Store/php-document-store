<?php

declare(strict_types=1);

namespace Devnix\PhpDocumentStore\Cache\Adapter;

use Devnix\PhpDocumentStore\Cache\DocumentInterface;
use function Devnix\PhpDocumentStore\Internal\suffix;

final class InMemoryAdapter implements AdapterInterface
{
    /**
     * @var array<non-empty-string, DocumentInterface>
     */
    private array $documents = [];

    public function __construct()
    {
    }

    public function set(string $key, DocumentInterface $document): void
    {
        $this->documents[$key] = $document;
    }

    public function get(string $key): DocumentInterface|null
    {
        if (!array_key_exists($key, $this->documents)) {
            return null;
        }

        return $this->documents[$key];
    }
}