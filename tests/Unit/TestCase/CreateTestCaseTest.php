<?php

namespace Tests\Unit\TestCase;

use App\Services\TestCaseService;
use Illuminate\Support\Facades\Log;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Throwable;

class CreateTestCaseTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function test_mock(): void
    {
        $data = [
            'name' => 'Test Case',
            'description' => 'Test Case Description',
            'steps' => 'Test Case Steps',
            'expected_results' => 'Test Case Expected Results',
            'priority' => 'Test Case Priority'
        ];

        $mockService = Mockery::mock(TestCaseService::class);
        $mockService->shouldReceive('add')
            ->once()
            ->with($data)
            ->andReturn(true);

        // Здесь вы можете использовать $mockService для тестирования
        $result = $mockService->add($data);
        $this->assertTrue($result);

    }
}
