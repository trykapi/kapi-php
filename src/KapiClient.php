<?php

namespace Kapi\KapiSdk;

use Kapi\KapiSdk\Service\LeadService;
use Kapi\KapiSdk\Service\PaymentMethodService;
use Kapi\KapiSdk\Service\PaymentPlanService;
use Kapi\KapiSdk\Service\UserService;

/**
 * Client used to send requests to Kapi`s API.
 *
 * @property UserService $users
 * @property LeadService $leads
 * @property PaymentMethodService $paymentMethods
 * @property PaymentPlanService $paymentPlans
 */
class KapiClient extends BaseKapiClient
{

    private static array $classMap = [
        'users' => UserService::class,
        'leads' => LeadService::class,
        'paymentMethods' => PaymentMethodService::class,
        'paymentPlans' => PaymentPlanService::class,
    ];

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->getService($name);
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function getService($name): mixed
    {
        return array_key_exists($name, self::$classMap) ? new self::$classMap[$name]($this->getClient()) : null;
    }
}
