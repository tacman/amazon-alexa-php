<?php

namespace MaxBeckers\AmazonAlexa\Request\Request\System;

use MaxBeckers\AmazonAlexa\Request\Request\AbstractRequest;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
abstract class SystemRequest extends AbstractRequest
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
        $this->requestId = $amazonRequest['requestId']??null;
        //Workaround for amazon developer console sending unix timestamp
        if ($timeStamp = $amazonRequest['timestamp'] ?? null) {
            try {
                $this->timestamp = new \DateTime($amazonRequest['timestamp']);
            } catch (\Exception) {
                $this->timestamp = (new \DateTime())->setTimestamp(intval($amazonRequest['timestamp'] / 1000));
            }
        }
        $this->locale = $amazonRequest['locale']??null;
    }
}
