<?php

namespace Tests\Feature;

use App\Http\Traits\ProductTrait;
use App\Http\Traits\ProductUnitTrait;
use App\Http\Traits\UnitTrait;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductUnitTest extends TestCase
{
    use ProductTrait,
    DatabaseTransactions,
    WithFaker,
    UnitTrait,
    ProductUnitTrait;

    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.productUnit.index'));
        $productUnits = $this->getProductUnits(20);

        $response->assertSee('جدول وحدات المنتجات');
        $response->assertViewHas('productUnits',$productUnits);
        $response->assertStatus(200);
    }

    // public function test_show()
    // {
    //     $product = $this->createRandomProduct();
    //     $response = $this->get(route('admin.product.show',['product'=>$product->slug]));
    //     $title = "تفاصيل منتج " . $product->name;

    //     $response->assertSee($title);
    //     $response->assertViewHas('product',$product);
    //     $response->assertStatus(200);
    // }

    public function test_create()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.productUnit.create'));
        $products = $this->getProducts();
        $units = $this->getUnits();

        $response->assertViewHas('products',$products);
        $response->assertViewHas('units',$units);
        $response->assertSee('انشاء وحدة منتج جديدة');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $productUnit = $this->createProductUnitData();

        $response = $this->actingAs($this->authUser)
            ->post(route('admin.productUnit.store'),$productUnit);

        $this->assertDatabaseHas('product_units',$productUnit);
    }

    public function test_edit()
    {
        $productUnit = $this->createRandomProductUnit();
        $response = $this->actingAs($this->authUser)->get(route('admin.productUnit.edit',$productUnit));
        $products = $this->getProducts();
        $units = $this->getUnits();

        $response->assertSee('تعديل وحدة منتج');
        $response->assertViewHas('products',$products);
        $response->assertViewHas('units',$units);
        $response->assertViewHas('productUnit',$productUnit);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldProductUnit = $this->createRandomProductUnit();
        $newProductUnit = $this->createProductUnitData();

        $response = $this->actingAs($this->authUser)
        ->put(route('admin.productUnit.update',$oldProductUnit),$newProductUnit);

        $this->assertDatabaseHas('product_units',$newProductUnit);
        $this->assertDatabaseMissing('product_units',[
            'product_id' => $oldProductUnit->product_id,
            'unit_id' => $oldProductUnit->unit_id,
            'small_unit_id' => $oldProductUnit->small_unit_id,
        ]);
    }

    public function test_destroy()
    {
        $productUnit = $this->createRandomProductUnit();

        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.productUnit.destroy',[
                'id' => $productUnit->id,
                'productUnit' => $productUnit
            ]));

        $this->assertSoftDeleted($productUnit);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.productUnit.archive'));
        $productUnits = $this->getOnlyTrashedProductUnits(20);

        $response->assertSee('أرشيف وحدة المنتجات');
        $response->assertViewHas('productUnits',$productUnits);
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $productUnit = $this->createRandomProductUnit();
        $productUnit->delete();

        $this->assertSoftDeleted($productUnit);

        $response = $this->actingAs($this->authUser)->delete(route('admin.productUnit.trash'),[
            'id' => $productUnit->id
        ]);

        $this->assertModelMissing($productUnit);
    }

    public function test_restore()
    {
        $productUnit = $this->createRandomProductUnit();
        $productUnit->delete();

        $this->assertSoftDeleted($productUnit);

        $response = $this->actingAs($this->authUser)
            ->post(route('admin.productUnit.restore'),[
                'id' => $productUnit->id
            ]);

        $this->assertModelExists($productUnit);
    }

    private function createProductUnitData()
    {
        $this->setUpFaker();
        $product = $this->createRandomProduct();
        $unit = $this->createRandomUnit();
        $small_unit = $this->createRandomUnit();
        return $this->randomProductUnitData($this->faker,[
            'product_id' => $product->id,
            'unit_id' => $unit->id,
            'small_unit_id' => $small_unit->id
        ]);
    }
}
