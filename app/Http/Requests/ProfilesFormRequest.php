<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfilesFormRequest extends Request
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
            'name'            => 'required|max:254',
            'email'           => 'email',
            'intro'           => 'required',
            'date_of_birth'   => 'required|date',
            'nationality'     => 'required',
            'residence'       => 'required',
            'athletic_skills' => 'required',
            'hero_status'     => 'required',
            'hero_statement'  => 'required',
            'biography'       => 'required',
            'facebook'        => 'url',
            'twitter'         => 'url',
            'instagram'       => 'url',
            'linkedin'        => 'url'
        ];
    }
}
