<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'project_name' => 'required',
            'sales_amount'  => 'numeric',
            'product_id'  => 'required',
            'start_date'  => 'date',
            'sintyokuritu'  => 'numeric',
        ];
    }

    public function messages(){
      return [
        'project_name.required' => '案件名を入力してください',
        'sales_amount.numeric' => '金額は数値で入力してください',
        'product_id.required' => '商品名を選択してください',
        'start_date.date' => '日付を入力してください',
        'sintyokuritu.numeric' => '数値で入力してください',
      ];
    }
}
