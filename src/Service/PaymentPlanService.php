<?php

namespace Kapi\KapiSdk\Service;

use GuzzleHttp\Exception\GuzzleException;
use Kapi\KapiSdk\Exception\ValidationException;

class PaymentPlanService extends BaseService
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
        return $this->request('GET', 'payment-plans', $data);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function store(
        array $data,
    ): mixed
    {
        return $this->request('POST', 'payment-plans', $data);
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
        return $this->request('GET', 'payment-plans/' . $id, $data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function update(
        int $id,
        array $data,
    ): mixed
    {
        $data['id'] = $id;
        return $this->request('PATCH', 'payment-plans/' . $id, $data);
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
        return $this->request('DELETE', 'payment-plans/' . $id);
    }

}
