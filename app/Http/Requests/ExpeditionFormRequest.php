<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExpeditionFormRequest extends Request
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
            'name' => 'required|max:254',
            'location' => 'required',
            'about' => 'required',
            'mission' => 'required',
            'objectives' => 'required',
            'donation_goal' => 'required',
            'start_date' => 'required|date'
        ];
    }
}
