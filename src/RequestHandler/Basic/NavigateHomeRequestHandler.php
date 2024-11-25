<?php

namespace MaxBeckers\AmazonAlexa\RequestHandler\Basic;

use MaxBeckers\AmazonAlexa\Helper\ResponseHelper;
use MaxBeckers\AmazonAlexa\Request\Request;
use MaxBeckers\AmazonAlexa\Request\Request\Standard\IntentRequest;
use MaxBeckers\AmazonAlexa\RequestHandler\AbstractRequestHandler;
use MaxBeckers\AmazonAlexa\Response\Response;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class NavigateHomeRequestHandler extends AbstractRequestHandler
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
        // support amazon navigate home request, amazon default intents are prefixed with "AMAZON."
        return $request->request instanceof IntentRequest && 'AMAZON.NavigateHomeIntent' === $request->request->intent->name;
    }

    /**
     * @inheritdoc
     */
    public function handleRequest(Request $request): Response
    {
        return $this->responseHelper->respond($this->output);
    }
}
