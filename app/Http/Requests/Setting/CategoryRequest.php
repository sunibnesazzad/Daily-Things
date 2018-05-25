<?php
/**
 * Created by PhpStorm.
 * User: Sazzad
 * Date: 25-May-18
 * Time: 12:28 AM
 */

namespace App\Http\Requests\Setting;


use App\Http\Requests\FormRequest;

class CategoryRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}