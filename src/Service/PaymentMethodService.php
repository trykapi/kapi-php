<?php

namespace Kapi\KapiSdk\Service;

use GuzzleHttp\Exception\GuzzleException;
use Kapi\KapiSdk\Exception\ValidationException;

class PaymentMethodService extends BaseService
{

    /**
     * @param array $data
     * @return mixed
     * @throws ValidationException
     */
    public function index(
        array $data,
    ): mixed
    {
        return $this->request('GET', 'payment-methods', $data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function show(
        int $id,
        array $data,
    ): mixed
    {
        return $this->request('GET', 'payment-methods/' . $id, $data);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function delete(
        int $id,
    ): mixed
    {
        return $this->request('DELETE', 'payment-methods/' . $id);
    }

}
