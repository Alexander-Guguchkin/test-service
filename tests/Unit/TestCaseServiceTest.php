<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\TestCaseService;
use App\Models\TestCase as TestCaseModel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCaseServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_test_case()
    {
        $service = new TestCaseService();

        $data = [
            'title' => 'Тест кейс 1',
            'description' => 'Проверка описания',
            'steps' => '1.Тестовый шаг',
            'expected_results' => 'Создал тестовый кейс',
            'priority' => 'высокий',
        ];

        $testCase = $service->add($data);

        $this->assertDatabaseHas('test_cases', [
            'title' => 'Тест кейс 1',
            'description' => 'Проверка описания',
            'steps' => '1.Тестовый шаг',
            'expected_results' => 'Создал тестовый кейс',
            'priority' => 'высокий',
        ]);

        $this->assertInstanceOf(TestCaseModel::class, $testCase);
        $this->assertEquals('Тест кейс 1', $testCase->title);
    }
}
