<?php

namespace App\Repositories;

use App\Dto\Unisender\ImportContactsDto;
use App\Interfaces\Repositories\UnisenderRepositoryInterface;
use Illuminate\Support\Facades\Http;

class UnisenderRepository implements UnisenderRepositoryInterface
{
    private string $importContactsUrl;

    public function __construct()
    {
        $this->importContactsUrl = config('unisender.apiRoutes.importContacts');
    }

    public function importContacts(ImportContactsDto $dto): bool
    {
        $query = '';

        try {

            foreach ($dto->fieldNames as $key => $field) {
                $query .= '&field_names[' . $key . ']=' . $field;
            }

            foreach ($dto->data as $i => $row) {
                foreach ($row as $j => $col){
                    $query .= '&data[' . $i . ']' . '[' . $j . ']=' . $col;
                }
            }

            Http::get($this->importContactsUrl . $query)->json();

            return true;
        } catch (\Throwable $exception) {
            info($exception);
        }

        return true;
    }

}
