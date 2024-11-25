<?php

namespace MaxBeckers\AmazonAlexa\RequestHandler\Basic;

use MaxBeckers\AmazonAlexa\Helper\ResponseHelper;
use MaxBeckers\AmazonAlexa\Request\Request;
use MaxBeckers\AmazonAlexa\Request\Request\Standard\SessionEndedRequest;
use MaxBeckers\AmazonAlexa\RequestHandler\AbstractRequestHandler;
use MaxBeckers\AmazonAlexa\Response\Response;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class SessionEndedRequestHandler extends AbstractRequestHandler
{
    /**
     * @param ResponseHelper $responseHelper
     * @param string         $output
     * @param array          $supportedApplicationIds
     */
    public function __construct(private readonly ResponseHelper $responseHelper, private readonly string $output, array $supportedApplicationIds)
    {
        $this->supportedApplicationIds = $supportedApplicationIds;
    }

    /**
     * @inheritdoc
     */
    public function supportsRequest(Request $request): bool
    {
        return $request->request instanceof SessionEndedRequest;
    }

    /**
     * @inheritdoc
     */
    public function handleRequest(Request $request): Response
    {
        return $this->responseHelper->respond($this->output, true);
    }
}
