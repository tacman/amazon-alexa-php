<?php

namespace MaxBeckers\AmazonAlexa\Test\Request;

use MaxBeckers\AmazonAlexa\Request\Request;
use MaxBeckers\AmazonAlexa\Request\Request\CanFulfill\CanFulfillIntentRequest;
use MaxBeckers\AmazonAlexa\Request\Request\Standard\IntentRequest;
use PHPUnit\Framework\TestCase;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class CanFulfillIntentRequestTest extends TestCase
{
    public function testIntentRequest()
    {
        $requestBody = file_get_contents(__DIR__.'/RequestData/can_fulfill_intent.json');
        $request     = Request::fromAmazonRequest($requestBody, 'https://s3.amazonaws.com/echo.api/echo-api-cert.pem', 'signature');

        $this->assertInstanceOf(IntentRequest::class, $request->request);
        $this->assertSame(CanFulfillIntentRequest::TYPE, $request->request->type);

        // was...
        //        $this->assertInstanceOf(CanFulfillIntentRequest::class, $request->request);
        //        $this->assertSame(CanFulfillIntentRequest::TYPE, $request->request->type);
    }
}
