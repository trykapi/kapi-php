<?php

namespace Kapi\KapiSdk\Service;

use GuzzleHttp\Exception\GuzzleException;
use Kapi\KapiSdk\Exception\ValidationException;

class TransactionService extends BaseService
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
        return $this->request('GET', 'transactions', $data);
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
        return $this->request('POST', 'transactions', $data);
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
        return $this->request('GET', 'transactions/' . $id, $data);
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
        return $this->request('PATCH', 'transactions/' . $id, $data);
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
        return $this->request('DELETE', 'transactions/' . $id);
    }

    /**
     * @param int|array $ids
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function pay(
        int|array $ids,
        array $data = [],
    ): mixed
    {
        $data['ids'] = is_array($ids) ? $ids : [$ids];
        return $this->request('POST', 'transactions/pay', $data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function refund(
        int $id,
        array $data = [],
    ): mixed
    {
        $data['id'] = $id;
        return $this->request('POST', '/transactions/' . $id . '/refund', $data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function restore(
        int $id,
        array $data = [],
    ): mixed
    {
        $data['id'] = $id;
        return $this->request('POST', '/transactions/' . $id . '/restore', $data);
    }

}
