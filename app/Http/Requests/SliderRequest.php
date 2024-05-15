<?php

// app/Http/Requests/SliderRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['max:255'],
            'body' => ['max:255'],
            'image' => ['required', 'image'],
            'type' => ['required']
        ];
    }
}
