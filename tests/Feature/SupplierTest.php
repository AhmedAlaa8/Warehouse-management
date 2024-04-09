<?php

namespace Tests\Feature;

use App\Http\Traits\CompanyTrait;
use App\Http\Traits\SupplierTrait;
use App\Models\Company;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    use SupplierTrait,
    DatabaseTransactions,
    WithFaker,
    CompanyTrait;

    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.supplier.index'));
        
        $response->assertSee('جدول الموردين');
        $response->assertViewHas('suppliers');
        $response->assertStatus(200);
    }

    // public function test_show()
    // {
    //     $supplier = $this->createRandomSupplier();
    //     $response = $this->get(route('admin.supplier.show',['supplier'=>$supplier->id]));
    //     $title = "تفاصيل شركة " . $supplier->name;

    //     $response->assertSee($title);
    //     $response->assertViewHas('supplier',$supplier);
    //     $response->assertStatus(200);
    // }

    public function test_create()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.supplier.create'));

        $response->assertSee('انشاء مورد جديد');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $supplier = $this->createSupplierData();

        $response = $this->actingAs($this->authUser)
            ->post(route('admin.supplier.store'),$supplier);
        
        $this->assertDatabaseHas('suppliers',$supplier);
    }

    public function test_edit()
    {
        $supplier = $this->createRandomSupplier();
        $response = $this->actingAs($this->authUser)->get(route('admin.supplier.edit',$supplier->id));


        $response->assertSee('تعديل موَرِّد');
        $response->assertViewHas('supplier',$supplier);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldSupplier = $this->createRandomSupplier();
        $newSupplier = $this->createSupplierData();

        $response = $this->actingAs($this->authUser)
            ->put(route('admin.supplier.update',$oldSupplier->id),$newSupplier);

        $this->assertDatabaseHas('suppliers',$newSupplier);
        $this->assertDatabaseMissing('suppliers',[
            'name' => $oldSupplier->name
        ]);
    }

    public function test_destroy()
    {
        $supplier = $this->createRandomSupplier();

        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.supplier.destroy',[
                'id' => $supplier->id,
                'supplier' => $supplier
            ]));

        $this->assertSoftDeleted($supplier);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.supplier.archive'));
        $suppliers = Supplier::onlyTrashed()->paginate(20);

        $response->assertSee('أرشيف الموردين');
        $response->assertViewHas('suppliers',$suppliers);
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $supplier = $this->createRandomSupplier();
        $supplier->delete();

        $this->assertSoftDeleted($supplier);

        $response = $this->actingAs($this->authUser)->delete(route('admin.supplier.trash'),[
            'id' => $supplier->id
        ]);

        $this->assertModelMissing($supplier);
    }

    public function test_restore()
    {
        $supplier = $this->createRandomSupplier();
        $supplier->delete();

        $this->assertSoftDeleted($supplier);
        
        $response = $this->actingAs($this->authUser)->post(route('admin.supplier.restore'),[
            'id' => $supplier->id
        ]);
        
        $this->assertModelExists($supplier);
    }

    private function createSupplierData()
    {
        $this->setUpFaker();
        $company = $this->createRandomCompany();
        return $this->randomSupplierData($this->faker,$company->id);
    }
}
