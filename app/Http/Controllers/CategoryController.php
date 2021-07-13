<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Interfaces\ICategory;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
{
    /**
     * @var ICategory
     */
    private $categoryService;

    /**
     * CategoryController constructor.
     */
    public function __construct(ICategory $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getPaginateCategories();
        return view('admin.category.category')
            ->with(compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->getLimitedCategories(100);
        return view('admin.category.create')
            ->with(compact('categories'));
    }

    public function store(CategoryCreateRequest $request)
    {
        $imageName = $this->categoryService->saveCategoryImageFile($request);

        $categories = $this->categoryService->createCategory($request, $imageName);

        if (!isset($categories)) {
            return back()->with('error', 'Failed to create Category');
        }

        request()->session()->flash('message', 'Category added');

        return redirect('admin/category');
    }


    public function delete(Category $category): RedirectResponse
    {
        if (!isset($category)) {
            return back()->with('error', 'Failed to delete Category');
        }

        $deleted = $this->categoryService->deleteCategory($category);

        if (!$deleted) {
            return back()->with('error', 'Failed to delete Category');
        }

        request()->session()->flash('message', 'Category deleted!');
        return back();
    }

    public function show(Category $category)
    {
        $categories = $this->categoryService->getLimitedCategories(100)
            ->except($category->id);

        return view('admin.category.show')
            ->with(compact('category'))
            ->with(compact('categories'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $result = $this->categoryService->updateCategory($request, $category);

        if (!$result) {
            return back()->with('error', 'Failed to update category!');
        }

        request()->session()->flash('message', 'Category edited');

        return redirect('admin/category');
    }


    public function status(Category $category, int $status)
    {
        $status = !$status;

        if (!$category) {
            return back()->with('error', 'Failed to update category status doesnt exist!');
        }

        if ($category->update(['status' => $status])) {
            request()->session()->flash('message', 'Category status updated');

            return redirect('admin/category');
        }

        return back()->with('error', 'Failed to update category doesnt exist!');
    }
}
