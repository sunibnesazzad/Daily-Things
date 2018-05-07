<?php
/**
 * Created by PhpStorm.
 * User: Sazzad
 * Date: 08-May-18
 * Time: 1:59 AM
 */

namespace App\Http\Requests\Setting;

use App\Http\Requests\FormRequest;
use http\Env\Request;

class InventoryRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'purchase_date' => 'required',
        ];
    }
}