<?php

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($phone)
    {
        $digits = preg_replace('/\D/', '', $phone); // Sadece rakamlar

        if (substr($digits, 0, 3) === '994') {
            $digits = substr($digits, 3); // Başta 994 varsa at
        }

        if ($digits[0] !== '0') {
            $digits = '0' . $digits; // Başına 0 ekle
        }

        return sprintf("(%s) %s-%s-%s",
            substr($digits, 0, 3),
            substr($digits, 3, 3),
            substr($digits, 6, 2),
            substr($digits, 8, 2)
        );
    }
}
