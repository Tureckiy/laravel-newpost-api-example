<?php
declare(strict_types=1);

namespace App\Interfaces\Requests;

use Illuminate\Contracts\Validation\Validator;

interface RequestInterface
{
    public function failedValidation(Validator $validator): void;
}
