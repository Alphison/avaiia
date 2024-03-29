<?php

namespace App\Interfaces\Services;

interface UnisenderServiceInterface
{

    public function importUserEmails(): bool;

    public function importUserEmail(string $email): bool;
}
