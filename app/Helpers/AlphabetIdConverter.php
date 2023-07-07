<?php


namespace App\Helpers;


class AlphabetIdConverter
{
    const ALPHABET = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * @param int $id
     * @return string
     */
    public static function convertToAlphabetId(int $id): string
    {
        $base = strlen(self::ALPHABET);
        $convertedId = '';

        while ($id > 0) {
            $remainder = $id % $base;
            $id = (int)($id / $base);
            $convertedId = self::ALPHABET[$remainder - 1] . $convertedId;
        }

        return $convertedId;
    }

    /**
     * @param $alphabetId
     * @return int
     * @throws \Exception
     */
    public static function convertToId($alphabetId): int
    {
        $base = strlen(self::ALPHABET);
        $id = 0;

        $length = strlen($alphabetId);
        for ($i = 0; $i < $length; $i++) {
            $char = $alphabetId[$i];
            $position = strpos(self::ALPHABET, $char) + 1;

            if ($position === false) {
                throw new \Exception('Invalid character in the alphabet ID.');
            }

            $id = ($id * $base) + $position;
        }

        return $id;
    }
}
