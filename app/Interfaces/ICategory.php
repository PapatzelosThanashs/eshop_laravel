<?php
declare(strict_types=1);


namespace App\Interfaces;

use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ICategory
{
    public function getPaginateCategories(): LengthAwarePaginator;
    public function getLimitedCategories(int $limit = 100): Collection;
    public function createCategory(CategoryCreateRequest $request, $imageName): ?Category;
    public function deleteCategory(Category $category): ?bool;
    public function getCategoryById(int $id): ?Category;
    public function updateCategory(CategoryUpdateRequest $request, Category $category): bool;
}
