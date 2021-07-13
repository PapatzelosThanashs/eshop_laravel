<?php
declare(strict_types=1);


namespace App\Repositories;


use App\Http\Requests\Category\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    public function getPaginateCategories() : LengthAwarePaginator
    {
        return Category::orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getLimitedCollection(int $limit) : Collection
    {
        return Category::orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }

    public function createCategory(CategoryCreateRequest $request, $imageName): Category {
       return Category::create([
            'category_name' => $request['categoryName'],
            'category_slug' => $request['categorySlug'],
            'category_parent_id' => $request['categoryParentId'],
            'category_image' => $imageName,
            'is_home' => $request['isHome'],
        ]);
    }

    public function deleteCategory(Category $category): int
    {
        return Category::destroy($category->id);
    }

    public function getCategoryById(int $id) {
        return Category::find($id);
    }
}
