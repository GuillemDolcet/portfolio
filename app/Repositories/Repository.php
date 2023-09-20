<?php

namespace App\Repositories;

use Illuminate\Database\Connection;
use Illuminate\Support\MessageBag;
use Illuminate\Contracts\Support\MessageProvider as MessageProviderContract;
use Illuminate\Database\Eloquent\Builder;
use App\Concerns\Contracts\Repository as RepositoryContract;
use App\Concerns\Contracts\FindsInstances as FindsInstancesContract;
use App\Concerns\FindsInstances;
use Closure;
use Throwable;

abstract class Repository implements
    RepositoryContract,
    FindsInstancesContract,
    MessageProviderContract
{
    use FindsInstances;

    /**
     * Error messages.
     *
     * @var MessageBag
     */
    protected MessageBag $messages;

    /**
     * The actual model class supporting the business logic.
     *
     * @return string
     */
    abstract public function getModelClass(): string;

    /**
     * Returns an instance of the current database connection.
     *
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->getInstance()->getConnection();
    }

    /**
     * Instantiates a new instance of the current repository's model class.
     *
     * @return mixed
     */
    public function getInstance(): mixed
    {
        $klass = $this->getModelClass();

        return new $klass();
    }

    /**
     * Instantiates a new instance of the current repository's model class with
     * the supplied attributes.
     *
     * @param array $attributes
     * @return mixed
     */
    public function make(array $attributes = []): mixed
    {
        $instance = $this->getInstance();

        $instance->fill($attributes);

        return $instance;
    }

    /**
     * Get a new query builder for the model's table.
     *
     * @return Builder
     */
    public function newQuery(): Builder
    {
        return $this->getInstance()->newQuery();
    }

    /**
     * Get the message container for this repository.
     *
     * @return MessageBag
     */
    public function messages(): MessageBag
    {
        return $this->messages;
    }

    /**
     * An alternative more semantic shortcut to the message container.
     *
     * @return MessageBag
     */
    public function errors(): MessageBag
    {
        return $this->messages();
    }

    /**
     * Get the messages for the instance.
     *
     * @return MessageBag
     */
    public function getMessageBag(): MessageBag
    {
        return $this->messages();
    }

    /**
     * Adds an error message to the container.
     *
     * @param string $key
     * @param string $message
     * @return MessageBag
     */
    public function addError(string $key, string $message): MessageBag
    {
        if (! $this->messages) {
            $this->messages = new MessageBag();
        }

        return $this->messages->add($key, $message);
    }

    /**
     * Execute a Closure within a transaction.
     *
     * @param Closure $callback
     * @return mixed
     *
     * @throws Throwable
     */
    public function transaction(Closure $callback): mixed
    {
        return $this->getConnection()->transaction($callback);
    }
}
