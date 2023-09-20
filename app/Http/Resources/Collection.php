<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;
use App\Support\Arr;
use JsonSerializable;

class Collection extends ResourceCollection
{
    /**
     * Resource wrapper name.
     *
     * @var string
     */
    protected string $wrapper = 'collection';

    /**
     * Transform the resource into a JSON array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray(Request $request): array|JsonSerializable|Arrayable
    {
        $result = array_merge_recursive($this->additional, [$this->wrapper() => parent::toArray($request)]);

        return $this->resource instanceof AbstractPaginator ? $this->withPagination($result) : $result;
    }

    /**
     * Get the resource collection wrapper attribute.
     *
     * @return string
     */
    protected function wrapper(): string
    {
        return $this->wrapper;
    }

    /**
     * Merges pagination metadata with the supplied resource array.
     *
     * @param  mixed    $data
     * @return array
     */
    protected function withPagination(mixed $data): array
    {
        return array_merge($data, $this->getPaginationMetadata());
    }

    /**
     * Return pagination metadata for the collection.
     *
     * @return array
     */
    protected function getPaginationMetadata(): array
    {
        $paginated = $this->resource->toArray();

        $links = [
            'first' => $paginated['first_page_url'] ?? null,
            'last'  => $paginated['last_page_url'] ?? null,
            'prev'  => $paginated['prev_page_url'] ?? null,
            'next'  => $paginated['next_page_url'] ?? null,
        ];

        $meta = Arr::except($paginated, [
            'data',
            'first_page_url',
            'last_page_url',
            'prev_page_url',
            'next_page_url',
        ]);

        return ['links' => $links, 'meta' => $meta];
    }
}
