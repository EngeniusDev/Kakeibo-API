<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'alpha_num', 'min:100', 'max:1000000'],
            'remarks' => ['nullable', 'max:50'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'income_categories_id' => ['required', 'exists:App\Models\IncomeCategory,id'],
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'amount' => '収入金額',
            'remarks' => '備考',
        ];
    }
}
