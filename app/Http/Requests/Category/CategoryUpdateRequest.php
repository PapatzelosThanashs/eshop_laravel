<?php
declare(strict_types=1);

namespace App\Http\Requests\Category;

class CategoryUpdateRequest extends AbstractCategoryRequest
{
    public $categoryName;
    public $categorySlug;
    public $categoryParentId;
    public $isHome;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'categoryName' => 'required',
            'categorySlug' => 'required',
            'categoryImage' => 'mimes:jpg,bmp,png,jpeg',
        ];
    }
}
