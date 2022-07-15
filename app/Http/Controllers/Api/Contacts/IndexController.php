<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response as HttpCode;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) :JsonResponse
    {
        $contacs = QueryBuilder::for(
            Contact::class,
        )->paginate();

        return new JsonResponse(ContactResource::collection($contacs), HttpCode::HTTP_OK);
    }
}
