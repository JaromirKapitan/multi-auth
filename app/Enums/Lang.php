<?php

namespace App\Enums;

enum Lang: string
{
    case SK = 'sk';
    case CS = 'cs';
    case EN = 'en';

    // Voliteľné: Metóda na získanie všetkých hodnôt
    public static function values(): array
    {
        $appLangs = env('APP_LANGS', null);

        if(!empty($appLangs))
            return explode(',', $appLangs);

        return array_column(self::cases(), 'value');
    }

    public static function valuesString(): string
    {
        return implode(',', self::values());
    }
}
