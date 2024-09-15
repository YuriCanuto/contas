<?php

namespace App\Http\Controllers\Validators\Cards;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StoreCardValidator
{
    public static function validate(array $request)
    {
        $validator = Validator::make($request, self::rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->getMessageBag()->messages());
        }

        return $validator;
    }

    /** @return array */
    private static function rules(): array
    {
        return [
            'nome'           => 'required|max:100',
            'anuidade'       => 'required|numeric',
            'data_expiracao' => 'required|numeric',
        ];
    }
}
