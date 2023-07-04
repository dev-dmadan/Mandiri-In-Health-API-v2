<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RequestTrait;

class ClosingRequest extends FormRequest
{
    use RequestTrait;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->isMethod('POST')) {
            return $this->storeRules();
        }

        if($this->isMethod('PUT')) {
            return $this->updateRules();
        }

        return [];
    }

    public function attributes()
    {
        return [];
    }

    private function storeRules()
    {
        return [];
    }

    private function updateRules()
    {
        return [];
    }
}
