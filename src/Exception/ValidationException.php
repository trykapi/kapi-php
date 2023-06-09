<?php

namespace Kapi\KapiSdk\Exception;

class ValidationException extends \Exception
{

    protected $code = 422;

    protected array $data = [];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function setData(
        array $data,
    ): static
    {
        $this->data = $data;
        return $this;
    }

}
