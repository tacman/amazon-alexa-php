<?php

use MaxBeckers\AmazonAlexa\Helper\ResponseHelper;
use MaxBeckers\AmazonAlexa\Request\Request;
use MaxBeckers\AmazonAlexa\Request\Request\Standard\IntentRequest;
use MaxBeckers\AmazonAlexa\RequestHandler\AbstractRequestHandler;
use MaxBeckers\AmazonAlexa\Response\Card;
use MaxBeckers\AmazonAlexa\Response\Response;

/**
 * Just a simple example request handler for a card response.
 * To create a response with an image @see https://developer.amazon.com/de/docs/custom-skills/include-a-card-in-your-skills-response.html#creating-a-home-card-to-display-text-and-an-image
 *
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class CardResponseRequestHandler extends AbstractRequestHandler
{
    /**
     * @param ResponseHelper $responseHelper
     */
    public function __construct(private readonly ResponseHelper $responseHelper)
    {
        $this->supportedApplicationIds = ['my_amazon_skill_id'];
    }

    /**
     * {@inheritdoc}
     */
    public function supportsRequest(Request $request): bool
    {
        // support all intent requests, should not be done.
        return $request->request instanceof IntentRequest;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(Request $request): Response
    {
        $card = Card::createSimple(
            'Example of the Card Title',
            "Example of card content. This card has just plain text content.\nThe content is formatted with line breaks to improve readability."
        );
        $this->responseHelper->card($card);

        return $this->responseHelper->respond('Text to speak back to the user.');
    }
}
