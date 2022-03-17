<?php


namespace Vonq\Channel\Domain;


interface JobGatewayResponse
{
    public function isSuccessful(): bool;

    public function getErrors(): array;
}
