<?php

namespace App\Services;

use App\Dto\Unisender\ImportContactsDto;
use App\Interfaces\Repositories\UnisenderRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Services\UnisenderServiceInterface;

class UnisenderService implements UnisenderServiceInterface
{

    public function __construct(
        private UserRepositoryInterface      $userRepository,
        private UnisenderRepositoryInterface $unisenderRepository
    )
    {
    }

    public function importUserEmails(): bool
    {
        $cursor = 0;

        try {
            do {
                $users = $this->userRepository->getFromCursor($cursor);

                if ($users->isEmpty()){
                    break;
                }

                $data['field_names'] = [
                    'email',
                    'email_list_ids'
                ];

                $data['data'] = $users->map(function ($item) {
                    return [
                        $item->email,
                        1
                    ];
                })->all();

                $this->unisenderRepository->importContacts(new ImportContactsDto(
                    fieldNames: $data['field_names'],
                    data: $data['data']
                ));

                $cursor = $users->pop()->id;

            } while (!$users->isEmpty());


            return true;

        } catch (\Throwable $exception) {
            info($exception);
        }

        return true;
    }

    public function importUserEmail(string $email): bool
    {
        $data['field_names'] = [
            'email',
            'email_list_ids'
        ];

        $data['data'][] = [$email, 1];

        $this->unisenderRepository->importContacts(new ImportContactsDto(
            fieldNames: $data['field_names'],
            data: $data['data']
        ));

        return true;
    }
}
