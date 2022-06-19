<?php

namespace Tests\Feature;

use App\Models\Color;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use jeremykenedy\LaravelRoles\Models\Role;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests if the user can view other users
     *
     * @return void
     */
    public function test_user_can_view_all_users()
    {
        $this->seed();

        User::factory()
            ->hasAttached(Role::whereSlug('user')->get()->firstOrFail())
            ->has(Color::factory()->count(2))
            ->count(5)->create();

        Sanctum::actingAs(
            $this->givenUser(),
        );

        $response = $this->get(route('api.users'));

        $response
            ->assertStatus(200)
            ->assertJsonCount(5)
            ->assertJson(fn(AssertableJson $json) => $json->first(fn(AssertableJson $json) => $json
                ->has('email')
                ->has('colors')
                ->etc())
            );
    }

    private function givenUser()
    {
        return Role::whereSlug('admin')->firstOrFail()->users()->first();
    }
}
