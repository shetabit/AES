<?php

class AES
{
    /**
     * @var string
     */
    protected $cipher;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var null | string
     */
    protected $iv;

    /**
     * AES constructor.
     *
     * @param string $key
     * @param string $cipher
     * @param null|string $iv
     */
    public function __construct($key, $cipher = 'AES-256-CBC', $iv = null)
    {
        $this->cipher = $cipher;
        $this->key = $key;
        $this->iv = $iv;
    }

    /**
     * Encrypt the given data.
     *
     * @param string $data
     * @return string
     *
     */
    public function encrypt($data)
    {
        if ($this->iv) {
        	$iv = $this->iv;
        } else {
        	$iv = base64_encode(random_bytes(openssl_cipher_iv_length($this->cipher)));
        }

        $encrypted = openssl_encrypt($data, $this->cipher, base64_decode($this->key), 0, base64_decode($iv));

        if ($this->iv == null) {
            return $encrypted . ':' . $iv;
        }
        return $encrypted;
    }

    /**
     * Decrypt the given data.
     *
     * @param string $data
     * @param bool $randomIv
     * @return string
     */
    public function decrypt($data, $randomIv = false)
    {
        if ($randomIv) {
            // To decrypt, separate the encrypted data from the initialization vector ($iv).
            $parts = explode(':', $data);
            $encrypted = $parts[0];
            $iv = base64_decode($parts[1]);
        } else {
            $encrypted = $data;
            $iv = base64_decode($this->iv);
        }
        $decrypted = openssl_decrypt($encrypted, $this->cipher, base64_decode($this->key), 0, $iv);
        return $decrypted;
    }
}
