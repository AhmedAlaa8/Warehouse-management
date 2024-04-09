<?php

namespace Tests\Feature;

use App\Http\Traits\StoreTrait;
use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use StoreTrait,DatabaseTransactions,WithFaker;

    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.store.index'));
        
        $response->assertSee('جدول المخازن');
        $response->assertViewHas('stores');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $store = $this->createRandomStore();
        $response = $this->actingAs($this->authUser)->get(route('admin.store.show',['store'=>$store->id]));
        $title = "تفاصيل مخزن " . $store->name;

        $response->assertSee($title);
        $response->assertViewHas('store',$store);
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.store.create'));

        $response->assertSee('انشاء مخزن جديد');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $store = $this->createStoreData();

        $response = $this->actingAs($this->authUser)
            ->post(route('admin.store.store'),$store);

        $this->assertDatabaseHas('stores',$store);
    }

    public function test_edit()
    {
        $store = $this->createRandomStore();
        $response = $this->actingAs($this->authUser)->get(route('admin.store.edit',$store->id));


        $response->assertSee('تعديل مخزن');
        $response->assertViewHas('store',$store);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldStore = $this->createRandomStore();
        $newStore = $this->createStoreData();

        $response = $this->actingAs($this->authUser)
            ->put(route('admin.store.update',$oldStore->id),$newStore);

        $this->assertDatabaseHas('stores',$newStore);
        $this->assertDatabaseMissing('stores',[
            'name' => $oldStore->name
        ]);
    }

    public function test_destroy()
    {
        $store = $this->createRandomStore();

        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.store.destroy',[
                'id' => $store->id,
                'store' => $store
            ]));

            $this->assertSoftDeleted($store);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.store.archive'));
        $stores = Store::onlyTrashed()->paginate(20);

        $response->assertSee('أرشيف المخازن');
        $response->assertViewHas('stores',$stores);
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $store = $this->createRandomStore();
        $store->delete();

        $this->assertSoftDeleted($store);

        $response = $this->actingAs($this->authUser)->delete(route('admin.store.trash'),[
            'id' => $store->id
        ]);

        $this->assertModelMissing($store);
    }

    public function test_restore()
    {
        $store = $this->createRandomStore();
        $store->delete();

        $this->assertSoftDeleted($store);

        $response = $this->actingAs($this->authUser)->post(route('admin.store.restore'),[
            'id' => $store->id
        ]);

        $this->assertModelExists($store);
    }

    private function createStoreData()
    {
        $this->setUpFaker();
        return $this->randomStoreData($this->faker);
    }
}
