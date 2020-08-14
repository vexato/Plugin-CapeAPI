<?php

namespace Azuriom\Plugin\SkinApi;

class SkinAPI
{
    public static function getConstraints()
    {
        $width = (int) setting('skin.width', 64);
        $height = (int) setting('skin.height', 64);
        $scale = (int) setting('skin.scale', 1);

        if ($scale === 1) {
            return [
                'width' => $width,
                'height' => $height,
            ];
        }

        return [
            'min_width' => $width,
            'min_height' => $height,
            'max_width' => $width * $scale,
            'max_height' => $height * $scale,
        ];
    }

    public static function getRule()
    {
        $result = '';

        foreach (self::getConstraints() as $key => $value) {
            $result .= "$key=$value,";
        }

        return 'dimensions:'.substr($result, 0, -1);
    }
}
