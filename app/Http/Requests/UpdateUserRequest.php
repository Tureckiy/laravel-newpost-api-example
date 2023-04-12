<?php
declare(strict_types=1);

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('user');

        return [
            'firstName' => 'required|string|max:40',
            'lastName' => 'required|string|max:40',
            'phone' => 'required|regex:/^[0-9]+$/|string|max:20',
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('users', 'email')->ignoreModel($user),
            ],
            'birthDate' => 'nullable|date',
        ];
    }


    public function validated(): array
    {
        $data = parent::validated();

        // some other custom validation functionality
        return $data;
    }


}
