<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoFormRequest extends FormRequest
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
            'todo_id' => 'nullable',
            'title' => 'required',
            'desc' => 'nullable',
            'status' => 'required',
            'empresas_id'=> 'required',
            'fevento' => 'date_format:"Y-m-d"|required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Se requiere el titulo.',
            'status.required' => 'Seleccione estado',
            'empresas_id.required' => 'Seleccione una empresa',
            'fevento.date'   =>  'No es fecha valida',
            'fevento.required'   =>  'No es fecha requerida',
            'fevento.date_format'   =>  'No es fecha bien formateada',
        ];
    }
}
