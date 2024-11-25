<?php

namespace MaxBeckers\AmazonAlexa\Request\Request\Standard;

use MaxBeckers\AmazonAlexa\Request\Request\AbstractRequest;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
abstract class StandardRequest extends AbstractRequest
{
    /**
     * @var string|null
     */
    public $token;

    /**
     * @var string
     */
    public $requestId;

    /**
     * @var string
     */
    public $locale;

    /**
     * @param array $amazonRequest
     */
    protected function setRequestData(array $amazonRequest)
    {
//        array_key_exists('requestId', $amazonRequest) || var_dump($amazonRequest);
        $this->requestId = $amazonRequest['requestId'] ?? null;
        //Workaround for amazon developer console sending unix timestamp
        if ($timeStamp = $amazonRequest['timestamp'] ?? null) {
            try {
                $this->timestamp = new \DateTime($timeStamp);
            } catch (\Exception) {
                $this->timestamp = (new \DateTime())->setTimestamp(intval($timeStamp / 1000));
            }

        }
        $this->locale = $amazonRequest['locale'] ?? null;
    }
}
