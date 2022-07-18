<?php
declare(strict_types=1);

namespace App\Http\Requests\Api\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules() :array
    {
        return [
            'title'=>['nullable','string','max:20'],
            'name.first'=>['required','string','min:2','max:50'],
            'name.middle'=>['nullable','string','min:2','max:50'],
            'name.last'=>['nullable','string','min:2','max:50'],
            'name.preferred'=>['nullable','string','min:2','max:100'],
            'name.full'=>['required','string','min:2','max:255'],
            'phone'=>['nullable','string'],
            'email'=>['nullable','email'],
        ];
    }
}
