<?php

namespace App\Http\Requests;

use App\Rules\ExcelRule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'csv_file' => [
                            'required',
                            // new ExcelRule($request->file('csv_file'))
                        ]
                    ];
                }
            case 'PUT':
                {
                    return [
                        //
                    ];
                }
            default:break
                ;
        }
    }

    public function messages()
    {
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'required' => 'File is required.'
                    ];
                }
            case 'PUT':
                {
                    return [
                        //
                    ];
                }
            default:break
                ;
        }
    }
}
