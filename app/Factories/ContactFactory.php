<?php
declare(strict_types=1);
namespace App\Factories;

use App\ValueObjects\ContactValueObject;

final class ContactFactory
{
    /**
     * @param array $attributes
     * @return ContactValueObject
     */
    public static function make(array $attributes) :ContactValueObject
    {
        return new ContactValueObject(
            title: strval(data_get($attributes,'title')),
            firstName: strval(data_get($attributes,'name.first')),
            middleName: strval(data_get($attributes,'name.middle')),
            lastName: strval(data_get($attributes,'name.last')),
            preferredName: strval(data_get($attributes,'name.preferred')),
            phone: strval(data_get($attributes,'phone')),
            email: strval(data_get($attributes,'email')),
        );
    }
}
