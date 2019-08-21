<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      //とりあえずアクセス制限は外しておく
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
                'customer_name' => 'required',
                'email'  => 'email',
                'company_name'  => 'required',
                'department'  => 'string',
                'rank'  => 'string',
                'image_url' => [
                    // アップロードされたファイルであること
                    'file',
                    // 画像ファイルであること
                    'image',
                    // MIMEタイプを指定
                    'mimes:jpeg,png',
                    // 最小縦横120px 最大縦横400px
                    'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
                ]
        ];
    }

    public function messages(){
      return [
        'customer_name.required' => '顧客名は必ず入力してください',
        'email.email' => 'メールアドレスが必要です',
        'company_name.required' => '会社名を入力してください',
        'department.string' => '部署名を入力してください',
        'rank.string' => '半角英数で入力してください',
        'image_url.mimes' => 'ファイル拡張子はjpegかpngでお願いします',
        'image_url.dimensions' => '最小縦横120px 最大縦横400pxでお願いします',
      ];
    }
}
