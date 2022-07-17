<?php
declare(strict_types=1);

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class ContactResource extends JsonApiResource
{
    /**
     * @param Request $request
     * @return string
     */
    protected function toType(Request $request): string
    {
        return 'contact';
    }

    /**
     * @param Request $request
     * @return array
     */
   protected function toAttributes(Request $request): array
   {

       return [
           'title' => $this->title,// @phpstan-ignore-line
           'name' => [
               'first' => $this->first_name,// @phpstan-ignore-line
               'middle' => $this->middle_name,// @phpstan-ignore-line
               'last' => $this->last_name,// @phpstan-ignore-line
               'preferred' => $this->preferred_name,// @phpstan-ignore-line
               'full' => $this->fullName()
           ],
           'phone' => $this->phone,// @phpstan-ignore-line
           'email' => $this->email// @phpstan-ignore-line
       ];
   }

    /**
     * @return string
     */
    protected function fullName(): string
    {

        return ltrim("{$this->first_name} {$this->middle_name} {$this->last_name}"); // @phpstan-ignore-line
    }
}
