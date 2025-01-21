<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ServiceRequest extends FormRequest
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
            'icon' => 'required|string',
        ];
    }
}
