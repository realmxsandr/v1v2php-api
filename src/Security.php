<?php

namespace V1V2;

class Security
{
    public function encrypt(string $encrypt, string $key): string
    {
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($encrypt, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
        return base64_encode( $iv.$hmac.$ciphertext_raw);
    }

    public function decrypt(string $decrypt, string $key): string
    {
        try {


            $c = base64_decode($decrypt);
            $cipher = "AES-128-CBC";
            $ivlen = openssl_cipher_iv_length("AES-128-CBC");
            $iv = substr($c, 0, $ivlen);
            $hmac = substr($c, $ivlen, $sha2len = 32);
            $ciphertext_raw = substr($c, $ivlen + $sha2len);
            $plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
            $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, true);

            if (hash_equals($hmac, $calcmac)) {
                return $plaintext;
            } else {
                return '';
            }
        } catch (\Throwable $throwable)  {
            return '';
        }
    }
}
