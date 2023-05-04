<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompteBancaire extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'RefCompte' => ['required', 'size:13'],
            'NomBanque' => ['required', 'string', 'max:25'],
            'Adresse' => ['required', 'string', 'max:30'],
        ];
    }
}
