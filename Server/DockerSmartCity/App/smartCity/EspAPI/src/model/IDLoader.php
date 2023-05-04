<?php

declare(strict_types = 1);

class IDLoader
{
    private const DATA_PATH = 'data/authorizedIdentifiers.json';

    public static function getAuthorizedIDs(): array
    {
        $authorizedIds = json_decode(file_get_contents(self::DATA_PATH));

        if ($authorizedIds == null) {

            throw new RuntimeException('file not found or incorrect format');
        }

        return $authorizedIds;
    }

}