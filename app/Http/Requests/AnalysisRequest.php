<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalysisRequest extends FormRequest
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
            //
            'goal_date' => 'required|numeric',
            'goal_contact'  => 'required|numeric',
            'goal_mitsumori'  => 'required|numeric',
            'goal_anken'  => 'required|numeric',
            'goal_seiyaku'  => 'required|numeric',
        ];
    }

    public function messages(){
      return [
        'goal_date.required' => '日付を入力してください　例）2019年　→　2019',
        'goal_date.numeric' => '日付を数値でしてください　例）2019年　→　2019',
        'goal_date.unique' => ' すでに登録済みです。変更する場合は編集してください。',
        'goal_contact.required' => 'コンタクト数目標を入力してください',
        'goal_contact.numeric' => 'コンタクト数目標数値でしてください',
        'goal_mitsumori.required' => '見積提示数目標を入力してください',
        'goal_mitsumori.numeric' => '見積提示数目標を数値でしてください',
        'goal_anken.required' => '案件提示数目標を入力してください',
        'goal_anken.numeric' => '案件提示数目標を数値でしてください',
        'goal_seiyaku.required' => '成約提示数目標を入力してください',
        'goal_seiyaku.numeric' => '成約提示数目標を数値でしてください',
      ];
    }



}
