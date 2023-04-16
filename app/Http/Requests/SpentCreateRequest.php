<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpentCreateRequest extends FormRequest
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
            'spent_categories_id' => ['required', 'exists:App\Models\SpentCategory,id'],
            'date' =>['required','date_format:Y-m-d H:i:s']
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'amount' => '支出金額',
            'remarks' => '備考',
            'user_id' => 'id',
            'spent_categories_id' => 'id',
            'date' => '日付'
        ];
    }
}
