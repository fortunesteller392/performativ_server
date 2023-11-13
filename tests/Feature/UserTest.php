<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_get_all_users() {
        $response = $this->get("/api/users?sort=lastname")
        ->assertStatus(200);
    }

    public function test_get_user_by_id() {
        $response = $this->get("/api/users/1")
        ->assertStatus(200);
    }

    public function test_create_user() {
        $user = [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'hobby' => 'Programming',
        ];
        $response = $this->post("/api/users", $user)
        ->assertStatus(201);
    }

    public function test_update_user() {
        $userId = 1;
        $user = [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'hobby' => 'Programming',
        ];
        $response = $this->put("/api/users/$userId", $user)
        ->assertStatus(200);
    }

    public function test_delete_user() {
        $userId = 1;
        $response = $this->delete("/api/users/$userId")
        ->assertStatus(200);
    }
}
