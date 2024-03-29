<?php

namespace App\Dto\Unisender;

class ImportContactsDto
{

    public function __construct(
        public readonly array $fieldNames,
        public readonly array $data
    )
    {
    }
}
