<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "street" => "required|string",
            "city" => "required|string",
            "country" => "required|string",
            "area" => "required|numeric",
            "opens_at" => "nullable",
            "closes_at" => "nullable",
            "google_maps_url" => "required|string",
            "images" => "required|array",
            "images.*" => "image|mimes:jpeg,jpg,png,webp|max:2048",
            "activities" => "required|array",
            "activities.*" => "integer|exists:activities,id"
        ];
    }
}
