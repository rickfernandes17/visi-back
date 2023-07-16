<?php

namespace App\Http\Requests;

use App\Models\Layout;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLayoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $layout = $this->route('layout');
        return $layout->user_id===$this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cabecalho'=>'nullable'
        ];
    }
}
