<?php

namespace App\Interfaces\Repositories;

use App\Dto\Unisender\ImportContactsDto;

interface UnisenderRepositoryInterface
{
    public function importContacts(ImportContactsDto $dto);

}
