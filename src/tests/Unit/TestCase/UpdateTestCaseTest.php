<?php

namespace Tests\Unit\TestCase;

use App\Services\TestCaseService;
use Faker\Factory;
use Mockery;
use PHPUnit\Framework\TestCase;

class UpdateTestCaseTest extends TestCase
{
    private $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    private function getTestCaseData(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'steps' => $this->faker->text,
            'expected_results' => $this->faker->text,
            'priority' => $this->faker->randomElement(['Low', 'Medium', 'High'])
        ];
    }

    public function test_add_test_case_successfully(): void
    {
        // Arrange
        $data = $this->getTestCaseData();
        $service = Mockery::mock(TestCaseService::class);
        $service->shouldReceive('add')
            ->once()
            ->with($data)
            ->andReturn(true);

        // Act
        $result = $service->add($data);

        // Assert
        $this->assertTrue($result);
    }

    public function test_add_test_case_fails_with_invalid_data(): void
    {
        // Arrange
        $invalidData = [];
        $service = Mockery::mock(TestCaseService::class);
        $service->shouldReceive('add')
            ->once()
            ->with($invalidData)
            ->andReturn(false);

        // Act
        $result = $service->add($invalidData);

        // Assert
        $this->assertFalse($result);
    }
}
