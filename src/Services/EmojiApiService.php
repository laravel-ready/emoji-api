<?php

namespace LaravelReady\EmojiApi\Services;

class EmojiApiService
{
    public function __construct()
    {
    }

    /**
     * This is nonstatic service method
     *
     * @return string
     */
    public function myServiceFunction(string $input): string
    {
        return $input;
    }
}
