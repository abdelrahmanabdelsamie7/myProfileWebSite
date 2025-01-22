<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class AboutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'about_me' => 'required|string|max:2048',
            'image' => 'nullable|string|max:2048',
        ];
    }
}
