<?php

namespace Tests\Feature;

use App\Http\Traits\UnitTrait;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    use UnitTrait,DatabaseTransactions,WithFaker;

    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.unit.index'));
        
        $response->assertSee('جدول الوحدات');
        $response->assertViewHas('units');
        $response->assertStatus(200);
    }

    // public function test_show()
    // {
    //     $unit = $this->createRandomUnit();
    //     $response = $this->get(route('admin.unit.show',['unit'=>$unit->id]));
    //     $title = "تفاصيل شركة " . $unit->name;

    //     $response->assertSee($title);
    //     $response->assertViewHas('unit',$unit);
    //     $response->assertStatus(200);
    // }

    public function test_create()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.unit.create'));

        $response->assertSee('انشاء وحدة جديدة');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $unit = $this->createUnitData();

        $response = $this->actingAs($this->authUser)
            ->post(route('admin.unit.store'),$unit);

        $this->assertDatabaseHas('units',$unit);
    }

    public function test_edit()
    {
        $unit = $this->createRandomUnit();
        $response = $this->actingAs($this->authUser)->get(route('admin.unit.edit',$unit->id));


        $response->assertSee('تعديل وحدة');
        $response->assertViewHas('unit',$unit);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldUnit = $this->createRandomUnit();
        $newUnit = $this->createUnitData();

        $response = $this->actingAs($this->authUser)
            ->put(route('admin.unit.update',$oldUnit->id),$newUnit);

        $this->assertDatabaseHas('units',$newUnit);
        $this->assertDatabaseMissing('units',[
            'name' => $oldUnit->name
        ]);
    }

    public function test_destroy()
    {
        $unit = $this->createRandomUnit();

        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.unit.destroy',[
                'id' => $unit->id,
                'unit' => $unit
            ]));
        
        $this->assertSoftDeleted($unit);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.unit.archive'));
        $units = Unit::onlyTrashed()->paginate(20);

        $response->assertSee('أرشيف الوحدات');
        $response->assertViewHas('units',$units);
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $unit = $this->createRandomUnit();
        $unit->delete();

        $this->assertSoftDeleted($unit);

        $response = $this->actingAs($this->authUser)->delete(route('admin.unit.trash'),[
            'id' => $unit->id
        ]);

        $this->assertModelMissing($unit);
    }

    public function test_restore()
    {
        $unit = $this->createRandomUnit();
        $unit->delete();

        $this->assertSoftDeleted($unit);

        $response = $this->actingAs($this->authUser)->post(route('admin.unit.restore'),[
            'id' => $unit->id
        ]);

        $this->assertModelExists($unit);
    }

    private function createUnitData()
    {
        $this->setUpFaker();
        return $this->randomUnitData($this->faker);
    }
}
