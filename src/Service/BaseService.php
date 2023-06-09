<?php

namespace Kapi\KapiSdk\Service;

use GuzzleHttp\Exception\ClientException;
use Kapi\KapiSdk\Exception\ValidationException;
use GuzzleHttp\Client;

abstract class BaseService
{

    /**
     * @var string
     */
    protected string $pluralName = '';

    public function __construct(
        protected Client $client
    )
    {

    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ValidationException
     */
    protected function request(
        string $method,
        string $uri,
        array $data = []
    ): mixed
    {
        $options = [];
        if($method === 'GET'){
            $options['query'] = $data;
        }else{
            $options['json'] = $data;
        }
        try {
            $response = $this->client->request($method, $uri, $options);
        }catch (ClientException $exception){
            if($exception->getCode() === 422){
                throw (new ValidationException($exception->getMessage()))
                    ->setData(json_decode($exception->getResponse()->getBody()->getContents(), true));
            } else {
                throw $exception;
            }
        }
        $data = json_decode($response->getBody()->getContents());
        return $data;
    }

}
