<?php

namespace App\Enums;

enum ContentStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Archived = 'archived';

    // Voliteľné: Metóda na získanie všetkých hodnôt
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function valuesString(): string
    {
        return implode(',', self::values());
    }

    public static function badge($status)
    {
//        switch ($status){
//            case self::Published:
//                $class = 'success';
//                break;
//            case self::Archived:
//                $class = 'secondary';
//                break;
//            default:
//                $class = 'warning';
//                break;
//        }
//
//        return view('admin.parts.badge', [
//            'class' => $class,
//            'text' => trans($status),
//        ]);
    }
}
