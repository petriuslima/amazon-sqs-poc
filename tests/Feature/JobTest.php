<?php

namespace Tests\Feature;

use App\Jobs\ProcessAnotherStandard;
use App\Jobs\ProcessMasterStandard;
use App\Jobs\ProcessStandard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class JobTest extends TestCase
{
    public function testShouldDispatchSingleQueueWhenCalledRoute()
    {
        Queue::fake();

        $response = $this->get(route('test-a-single-queue'));

        Queue::assertPushed(ProcessStandard::class);
    }

    public function testShouldDispatchChainedQueueWhenCalledRoute()
    {
        Queue::fake();

        $response = $this->get(route('test-a-chained-queue'));

        $testableChainedJobs = [ProcessAnotherStandard::class, ProcessMasterStandard::class];

        Queue::assertPushedWithChain(ProcessStandard::class, $testableChainedJobs);
    }
}
