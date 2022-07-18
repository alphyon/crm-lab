<?php
declare(strict_types=1);

use App\Models\Contact;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Symfony\Component\HttpFoundation\Response as HttpCodes;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

it('get an Unathoruized response when is not logged', function () {
    getJson(
        uri: route('api:contacts:index'),
    )->assertStatus(HttpCodes::HTTP_UNAUTHORIZED);
});
it('can retrive a list of contacts user', function () {
    auth()->loginUsingId(User::factory()->create()->id);
    Contact::factory(10)->create();
    getJson(
        uri: route('api:contacts:index'),
    )->assertStatus(HttpCodes::HTTP_OK)->assertJson(fn(AssertableJson $json) => $json->count(10)
        ->first(fn(AssertableJson $json) => $json->where('type', 'contact')->etc(),
        ),
    );
});

it('can create a new contact', function (string $string) {
    auth()->loginUsingId(User::factory()->create()->id);
    expect(Contact::query()->count())->toEqual(expected: 0);
    postJson(
        uri: route('api:contacts:store'), data: [
        'title' => $string,
        'name' => [
            'first' => $string,
            'middle' => $string,
            'last' => $string,
            'preferred' => $string,
            'full' => "$string $string $string"
        ],
        'email' => "{$string}@email.com",
        'phone' => $string
    ])->assertStatus(HttpCodes::HTTP_CREATED);
    expect(Contact::query()->count())->toEqual(expected: 0);

})->with('strings');
