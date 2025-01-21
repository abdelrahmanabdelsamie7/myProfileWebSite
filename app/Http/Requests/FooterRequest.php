<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class FooterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'facebook_Link' => 'required|string|url',
            'whatsapp_Link' => 'required|string|url',
            'instgram_Link' => 'required|string|url',
            'linkedIn_Link' => 'required|string|url',
            'youtube_Link' => 'required|string|url',
        ];
    }
}
