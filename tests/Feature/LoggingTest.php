<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_logging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function test_log_context()
    {
        Log::error("tes context", ['Name' => "Hanif"]);
        self::assertTrue(true);
    }

    public function test_log_with_context()
    {
        Log::withContext(['Name' => 'Hanif']);
        Log::error("error 1");
        Log::critical("error 2");

        self::assertTrue(true);
    }

    public function test_channel()
    {
        $stackLogger = Log::channel('stack');
        $stackLogger->error("Hello Slack");

        Log::error("jos banget");

        self::assertTrue(true);
    }

    public function test_handler()
    {
        $handlerLogger = Log::channel('file');
        $handlerLogger->debug("Hello Slack");
        $handlerLogger->info("Hello Info");
        $handlerLogger->warning("Hello Warning");
        $handlerLogger->error("Hello Error");
        $handlerLogger->critical("Hello Critical");

        self::assertTrue(true);
    }
}
