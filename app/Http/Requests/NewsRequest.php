<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => ['required', 'min:1', 'max:20'],
            'text' => ['required', 'max:400'],
            'image' => ['image'],
            'isPrivate' => ['boolean'],
            'category_id' => "required|exists:{$tableNameCategory},id",
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле :attribute не заполнено',
            'text.required' => 'Поле :attribute не заполнено',
            'image.image' => 'Не является типом :attribute',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
            'image' => 'Изображение'
        ];
    }
}

