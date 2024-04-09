<?php

namespace Tests\Feature;

use App\Http\Traits\CategoryTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\SupplierTrait;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use ProductTrait,
    DatabaseTransactions,
    WithFaker,
    CategoryTrait,
    SupplierTrait;

    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.product.index'));
        
        $response->assertSee('جدول المنتجات');
        $response->assertViewHas('products');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $product = $this->createRandomProduct();
        $response = $this->actingAs($this->authUser)->get(route('admin.product.show',['product'=>$product->slug]));

        $title = "تفاصيل منتج " . $product->name;

        $response->assertSee($title);
        $response->assertViewHas('product',$product);
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.product.create'));
        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();

        $response->assertViewHas('categories',$categories);
        $response->assertViewHas('suppliers',$suppliers);
        $response->assertSee('انشاء منتج جديدة');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $product = $this->createProductData();

        $response = $this->actingAs($this->authUser)
            ->post(route('admin.product.store'),$product);

        $this->assertDatabaseHas('products',$product);
    }

    public function test_edit()
    {
        $product = $this->createRandomProduct();
        $response = $this->actingAs($this->authUser)->get(route('admin.product.edit',$product));
        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();

        $response->assertSee('تعديل منتج');
        $response->assertViewHas('categories',$categories);
        $response->assertViewHas('suppliers',$suppliers);
        $response->assertViewHas('product',$product);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldProduct = $this->createRandomProduct();
        $newProduct = $this->createProductData();

        $response = $this->actingAs($this->authUser)
            ->put(route('admin.product.update',$oldProduct),$newProduct);

        $this->assertDatabaseHas('products',$newProduct);
        $this->assertDatabaseMissing('products',[
            'name' => $oldProduct->name
        ]);
    }

    public function test_destroy()
    {
        $product = $this->createRandomProduct();

        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.product.destroy',[
                'id' => $product->id,
                'product' => $product
            ]));

        $this->assertSoftDeleted($product);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.product.archive'));
        $products = $this->getOnlyTrashedProducts(20);

        $response->assertSee('أرشيف المنتجات');
        $response->assertViewHas('products',$products);
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $product = $this->createRandomProduct();
        $product->delete();

        $this->assertSoftDeleted($product);

        $response = $this->actingAs($this->authUser)->delete(route('admin.product.trash'),[
            'id' => $product->id
        ]);

        $this->assertModelMissing($product);
    }

    public function test_restore()
    {
        $product = $this->createRandomProduct();
        $product->delete();

        $this->assertSoftDeleted($product);

        $response = $this->actingAs($this->authUser)->post(route('admin.product.restore'),[
            'id' => $product->id
        ]);

        $this->assertModelExists($product);

        $response->assertStatus(302);
    }

    private function createProductData()
    {
        $this->setUpFaker();
        $category = $this->createRandomCategory();
        $supplier = $this->createRandomSupplier();
        return $this->randomProductData($this->faker,[
            'category_id' => $category->id,
            'supplier_id' => $supplier->id
        ]);
    }
}
