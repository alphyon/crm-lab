<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Contacts;

use App\Actions\Contacts\CreateNewContact;
use App\Factories\ContactFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contacts\StoreRequest;
use App\Http\Resources\Api\ContactResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpCodes;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreRequest $request): JsonResponse
    {
        $contact = CreateNewContact::handle(object: ContactFactory::make(attributes: $request->validated()));
        return new JsonResponse(data: new ContactResource($contact), status: HttpCodes::HTTP_CREATED);
    }
}
