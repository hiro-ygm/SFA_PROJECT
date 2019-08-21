<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessRequest extends FormRequest
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
        return [
          'contact_date' => 'required|date',
          'purpose' => 'required',
          'progress_rate' => 'required|numeric',
          'customer_id' => 'required',
        ];
    }

    public function messages(){
      return [
        'contact_date.required' => 'コンタクト日は必ず入力してください',
        'contact_date.date' => 'コンタクト日は日付で入力してください',
        'progress_rate.numeric' => '進捗率は必ず入力してください',
        'progress_rate.numeric' => '進捗率は半角数値で入力してください',
        'product_id.' => '商品名を選択してください',
      ];
    }
}
