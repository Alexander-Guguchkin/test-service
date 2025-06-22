<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\TestCase as TestCaseModel;

class TestCaseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_test_case()
    {
        $data = [
            'title' => 'Тестовый кейс',
            'description' => 'Описание теста',
            'steps' => '1. Шаг',
            'expected_results' => 'Ожидаемый результат',
            'priority' => 'средний',
        ];

        $response = $this->postJson('/test-cases', $data);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'title' => 'Тестовый кейс',
                'description' => 'Описание теста',
                'steps' => '1. Шаг',
                'expected_results' => 'Ожидаемый результат',
                'priority' => 'средний',
            ]);

        $this->assertDatabaseHas('test_cases', [
                'title' => 'Тестовый кейс',
                'description' => 'Описание теста',
                'steps' => '1. Шаг',
                'expected_results' => 'Ожидаемый результат',
                'priority' => 'средний',
        ]);
    }
}
