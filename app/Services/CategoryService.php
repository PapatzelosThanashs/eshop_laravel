<?php
declare(strict_types=1);


namespace App\Services;

use App\Http\Requests\Category\AbstractCategoryRequest;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Interfaces\ICategory;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;

class CategoryService implements ICategory
{
    /**
     * @var CategoryRepository
     */
    private $repository;


    /**
     * CategoryService constructor.
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getPaginateCategories(): LengthAwarePaginator
    {
        return $this->repository->getPaginateCategories();
    }

    public function getLimitedCategories(int $limit = 100): Collection
    {
        return $this->repository->getLimitedCollection($limit);
    }

    public function createCategory(CategoryCreateRequest $request, $imageName): ?Category
    {
        return empty($request) || !isset($imageName)
            ? null
            : $this->repository->createCategory($request, $imageName);
    }

    public function deleteCategory(Category $category): ?bool
    {
        if (isset($category)) {
            $this->deleteCategoryImageFromStorage($category->category_image);
            return $this->repository->deleteCategory($category) === 1;
        }
        return null;
    }

    public function getCategoryById(int $id): ?Category
    {
        return ($id > 0) ? $this->repository->getCategoryById($id) : null;
    }

    public function updateCategory(CategoryUpdateRequest $request, Category $category): bool
    {
        if (!isset($request) || !isset($category)) {
            return false;
        }

        $imageName = $this->saveCategoryImageFile($request);
        if (isset($imageName)) {
            $this->deleteCategoryImageFromStorage($category->category_image);
        }

        $data = $this->mapCategoryUpdateData($request, $imageName);

        return $category->update($data);
    }

    /**
     * @param CategoryUpdateRequest $request
     * @return array
     */
    public function mapCategoryUpdateData(CategoryUpdateRequest $request, ?string $imageName): array
    {
        $data = [];
        $data['is_home'] = (int)$request['isHome'];
        $data['category_name'] = $request['categoryName'];
        $data['category_slug'] = $request['categorySlug'];
        $data['category_parent_id'] = (int)$request['categoryParentId'];
        if (isset($imageName)) {
            $data['category_image'] = $imageName;
        }

        return $data;
    }

    public function deleteCategoryImageFromStorage(?string $imageName): void
    {
        if (isset($imageName) && File::exists(public_path('storage/product_photo/product_categories/' . $imageName))) {
            File::delete(public_path('storage/product_photo/product_categories/' . $imageName));
        }
    }

    public function saveCategoryImageFile(AbstractCategoryRequest $request): ?string
    {
        $imageName = null;
        if ($request->hasfile('categoryImage')) {
            $image = $request->file('categoryImage');
            $extension = $image->extension();
            $imageName = time() . '.' . $extension;
            $image->storeAs('public/product_photo/product_categories', $imageName);
        }
        return $imageName;
    }
}
