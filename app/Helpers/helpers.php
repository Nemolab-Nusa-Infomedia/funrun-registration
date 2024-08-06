<?php

if (!function_exists('format_date')) {
    /**
     * Format tanggal menjadi string yang lebih mudah dibaca.
     *
     * @param string $date
     * @return string
     */
    function format_date($date)
    {
        return \Carbon\Carbon::parse($date)->format('d M Y');
    }
}

if (!function_exists('get_user_role')) {
    /**
     * Mendapatkan role pengguna.
     *
     * @param \App\Models\User $user
     * @return string
     */
    function get_user_role($user)
    {
        return $user->role->name ?? 'Unknown';
    }
}

if (!function_exists('calculate_age')) {
    /**
     * Menghitung usia dari tanggal lahir.
     *
     * @param string $birthDate
     * @return int
     */
    function calculate_age($birthDate)
    {
        return \Carbon\Carbon::parse($birthDate)->age;
    }
}

if (!function_exists('generate_random_string')) {
    /**
     * Menghasilkan string acak dengan panjang tertentu.
     *
     * @param int $length
     * @return string
     */
    function generate_random_string($length = 10)
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $length)), 0, $length);
    }
}

if (!function_exists('convert_to_currency')) {
    /**
     * Mengonversi angka ke format mata uang.
     *
     * @param float $amount
     * @return string
     */
    function convert_to_currency($amount)
    {
        return number_format($amount, 2, ',', '.');
    }
}
