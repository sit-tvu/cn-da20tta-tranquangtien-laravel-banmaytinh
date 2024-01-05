<?php

if (! function_exists('formatPhoneNumber')) {
    /**
     * Format a phone number.
     *
     * @param  string  $phoneNumber
     * @return string
     */
    function formatPhoneNumber($phoneNumber)
    {
        // Loại bỏ các ký tự không phải số từ số điện thoại
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Định dạng số điện thoại theo một định dạng mong muốn
        $formattedPhoneNumber = preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $phoneNumber);

        return $formattedPhoneNumber;
    }
}