<?php

namespace Kapi\KapiSdk\Service;

use GuzzleHttp\Exception\GuzzleException;
use Kapi\KapiSdk\Exception\ValidationException;

class UserService extends BaseService
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
        return $this->request('GET', 'users', $data);
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
        return $this->request('POST', 'users', $data);
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
        return $this->request('GET', 'users/' . $id, $data);
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
        return $this->request('PATCH', 'users/' . $id, $data);
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
        return $this->request('DELETE', 'users/' . $id);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function invite(
        int $id,
    )
    {
        return $this->request('POST', 'users/' . $id . '/send-invite');
    }

}
