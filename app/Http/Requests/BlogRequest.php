<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link_url' => 'required|string|url',
            'image' => 'nullable|image|string|max:2048',
        ];
    }
}
