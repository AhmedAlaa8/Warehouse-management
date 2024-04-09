<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryDeleteRequest;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Http\Traits\CategoryTrait;
use App\Models\Category;
use App\Services\Authorization\PermissionsService;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    use CategoryTrait;
    public $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function index()
    {
        $x = new PermissionsService();
        $categories = $this->getCategories(20);
        return view('admin.pages.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('admin.pages.category.show',compact('category'));
    }

    public function tree()
    {
        $categories = Category::whereDoesntHave('parent')->with('kids')->get();
        return view('admin.pages.category.tree', compact('categories'));
    }

    public function create()
    {
        $categories = $this->getCategories();
        return view('admin.pages.category.create',compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $this->model::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        Alert::toast('تم إنشاء التصنيف بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(Category $category)
    {
        $categories = $this->getCategories();
        return view('admin.pages.category.edit',compact('category','categories'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        Alert::toast('تم تعديل التصنيف بنجاح', 'success');
        return redirect(route('admin.category.index'));
    }

    public function destroy(CategoryDeleteRequest $request,Category $category)
    {
        $category->delete();
        Alert::toast('تم حذف التصنيف بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $categories = $this->model::onlyTrashed()->paginate(20);
        return view('admin.pages.category.archive',compact('categories'));
    }

    public function trash(CategoryDeleteRequest $request)
    {
        $category = $this->model::withTrashed()->find($request->id);
        $category->forceDelete();
        Alert::toast('تم حذف التصنيف نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(CategoryDeleteRequest $request)
    {
        $category = $this->model::withTrashed()->find($request->id);
        $category->restore();
        Alert::toast('تم استعادة التصنيف', 'success');
        return redirect()->back();
    }
}
