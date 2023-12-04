<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class RequestTest extends TestCase
{
    /**
     * A basic feature test to check the /lookup route.
     *
     * @return void
     */
    public function test_lookup_endpoint()
    {
        $response = $this->get('/lookup');

        $response->assertStatus(200);
    }

    public function test_request_has_type() {
        $request = Request::create('/lookup?type=xbl&username=tebex', 'GET');

        $this->assertTrue($request->has('type'));
    }

    public function test_request_has_id_or_username() {
        $request = Request::create('/lookup?type=xbl&username=tebex', 'GET');

        $this->assertTrue($request->has('id') || $request->has('username'));
    }

    public function test_request_has_two_params() {
        $request = Request::create('/lookup?type=xbl&username=tebex', 'GET');

        $this->assertCount(2, $request->all());
    }

/*     public function test_json_structure() {
        $response = $this->get('https://ident.tebex.io/usernameservices/4/username/76561198806141009');

        $response->assertStatus(200)
                ->assertJsonStructure(
                    [
                        "username",
                        "id",
                        "avatar",
                    ]
                );
    } */
}
