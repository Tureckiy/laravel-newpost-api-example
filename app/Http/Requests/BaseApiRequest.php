<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Interfaces\Requests\RequestInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseApiRequest extends FormRequest implements RequestInterface
{
    public function failedValidation(Validator $validator): void
    {
        $this->errorResponse($validator->errors()->all());
    }

    private function errorResponse(array $errors): void
    {
        throw new HttpResponseException(response()->json(
            [
                'success' => false,
                'message' => $errors
            ],
            400
        ));
    }
}
