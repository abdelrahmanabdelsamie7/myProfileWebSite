<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'start_at' => 'required|date|before:end_at',
            'end_at' => 'date|after:start_at',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2048',
            'city' => 'string',
        ];
    }
}
