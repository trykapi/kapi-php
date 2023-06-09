<?php

namespace Kapi\KapiSdk;

use Kapi\KapiSdk\Exception\InvalidArgumentException;
use GuzzleHttp\Client;

abstract class BaseKapiClient
{

    const DEFAULT_API_BASE = 'https://api.kapi.app/api/';

    const DEFAULT_CONFIG = [
        'api_key' => null,
        'api_base' => self::DEFAULT_API_BASE,
    ];

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(
        protected array $config = []
    )
    {
        $this->mergeConfigWithDefault();
        $this->validateConfig();
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function validateConfig(): void
    {
        $unnecessaryKeys = array_diff_key($this->config, self::DEFAULT_CONFIG);
        if($unnecessaryKeys){
            $message = 'unnecessary arguments: ' . implode(', ', $unnecessaryKeys);
            throw new InvalidArgumentException($message);
        }
        if(!is_string($this->getApiKey()) || $this->getApiKey() === ''){
            throw new InvalidArgumentException('api_key should be a not empty string');
        }
        if(!is_string($this->getApiBase())){
            throw new InvalidArgumentException('api_base should be a not empty string');
        }
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->config['api_key'];
    }

    /**
     * @return mixed
     */
    public function getApiBase()
    {
        return $this->config['api_base'];
    }

    /**
     * @return void
     */
    protected function mergeConfigWithDefault(): void
    {
        $this->config = array_merge(self::DEFAULT_CONFIG, $this->config);
    }

    protected function getClient(): Client
    {
        return new Client([
            'base_uri' => $this->getApiBase(),
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getApiKey(),
            ]
        ]);
    }

}
