<?php

namespace Tests\Feature;

use App\Http\Traits\CategoryTrait;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use CategoryTrait,DatabaseTransactions,WithFaker;


    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.category.index'));
        
        $response->assertSee('جدول التصنيفات');
        $response->assertViewHas('categories');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $category = $this->createRandomCategory();
        $response = $this->actingAs($this->authUser)->get(route('admin.category.show',['category'=>$category->id]));

        $response->assertSee('تصنيف وابناؤه شكل شجري');
        $response->assertViewHas('category',$category);
        $response->assertStatus(200);
    }

    public function test_tree()
    {   
        $categories = Category::whereDoesntHave('parent')->with('kids')->get();
        $response = $this->actingAs($this->authUser)->get(route('admin.category.tree'));

        $response->assertSee('التصنيفات شكل شجري');
        $response->assertViewHas('categories',$categories);
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $categories = $this->getCategories();
        $response = $this->actingAs($this->authUser)->get(route('admin.category.create'));

        $response->assertSee('انشاء تصنيف جديد');
        $response->assertViewHas('categories',$categories);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $category = $this->createCategoryData();

        $response = $this->actingAs($this->authUser)->post(route('admin.category.store'),$category);

        $this->assertDatabaseHas('categories',$category);
    }

    public function test_edit()
    {
        $category = $this->createRandomCategory();
        $response = $this->actingAs($this->authUser)->get(route('admin.category.edit',$category->id));

        $categories = $this->getCategories();

        $response->assertSee('تعديل تصنيف');
        $response->assertViewHas('categories',$categories);
        $response->assertViewHas('category',$category);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldCategory = $this->createRandomCategory();
        $newCategory = $this->createCategoryData();

        $response = $this->actingAs($this->authUser)
            ->put(route('admin.category.update',$oldCategory->id),$newCategory);

        $this->assertDatabaseHas('categories',$newCategory);
        $this->assertDatabaseMissing('categories',[
            'name' => $oldCategory->name
        ]);
    }

    public function test_destroy()
    {
        $category = $this->createRandomCategory();
        
        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.category.destroy',[
                'id' => $category->id,
                'category' => $category
            ]));

        $this->assertSoftDeleted($category);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.category.archive'));
        // $categories = Category::onlyTrashed()->paginate(20);

        $response->assertSee('أرشيف التصنيفات');
        // $response->assertViewHas('categories',$categories);
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $category = $this->createRandomCategory();
        $category->delete();

        $this->assertSoftDeleted($category);

        $response = $this->actingAs($this->authUser)->delete(route('admin.category.trash'),[
            'id' => $category->id
        ]);

        $this->assertModelMissing($category);
    }

    public function test_restore()
    {
        $category = $this->createRandomCategory();
        $category->delete();

        $this->assertSoftDeleted($category);

        $response = $this->actingAs($this->authUser)->post(route('admin.category.restore'),[
            'id' => $category->id
        ]);
        
        $this->assertModelExists($category);
    }

    private function createCategoryData() : array
    {
        $this->setUpFaker();
        return $this->randomCategoryData($this->faker);
    }
}
