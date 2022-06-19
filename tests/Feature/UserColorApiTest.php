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

class UserColorApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_colors_of_a_given_user()
    {
        $this->seed();

        $user = User::factory()
            ->hasAttached(Role::whereSlug('user')->get()->firstOrFail())
            ->has(Color::factory()->count(2))
            ->count(1)->create()->first();

        Sanctum::actingAs(
            $this->givenUser(),
        );

        $response = $this->get(route('api.users.color', ['user' => $user]));

        $response
            ->assertStatus(200)
            ->assertJsonCount(2);
    }

    public function test_user_can_update_a_color() {
        $this->seed();

        $colors = Color::factory()->count(3)->create();
        $user = User::factory()
            ->hasAttached(Role::whereSlug('user')->get()->firstOrFail())
            ->hasAttached($colors->slice(0, 2))
            ->count(1)->create()->first();

        Sanctum::actingAs(
            $user,
        );

        $response = $this->patch(route('api.users.color.update', ['user' => $user]), [
            'color' => $colors->last()->name
        ]);

        $response
            ->assertStatus(200);

        $this
            ->assertEquals(1, User::findOrFail($user->id)->colors->count());
    }

    public function test_user_can_delete_his_account() {
        $this->seed();

        $user = User::factory()
            ->hasAttached(Role::whereSlug('user')->get()->firstOrFail())
            ->count(1)->create()->first();

        Sanctum::actingAs(
            $user,
        );

        $response = $this->deleteJson(route('api.users.delete'));

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) => $json->where('status', 'success'));

        $this->assertModelMissing($user);
    }

    private function givenUser()
    {
        return Role::whereSlug('admin')->firstOrFail()->users()->first();
    }
}
