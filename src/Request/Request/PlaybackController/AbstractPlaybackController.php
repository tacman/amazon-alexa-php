<?php

namespace MaxBeckers\AmazonAlexa\Request\Request\PlaybackController;

use MaxBeckers\AmazonAlexa\Request\Request\AbstractRequest;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
abstract class AbstractPlaybackController extends AbstractRequest
{
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
        try {
            $this->timestamp = new \DateTime($amazonRequest['timestamp']);
        } catch (\Exception) {
            $this->timestamp = (new \DateTime())->setTimestamp(intval($amazonRequest['timestamp'] / 1000));
        }
        $this->requestId = $amazonRequest['requestId'] ?? null;
        $this->locale    = $amazonRequest['locale'] ?? null;
    }
}
