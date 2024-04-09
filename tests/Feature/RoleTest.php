<?php

namespace Tests\Feature;

use App\Http\Traits\RoleTrait;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RoleTrait,DatabaseTransactions,WithFaker;

    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.role.index'));
        
        $response->assertSee('جدول الأدوار');
        $response->assertViewHas('roles');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $role = $this->createRandomRole();
        $response = $this->actingAs($this->authUser)->get(route('admin.role.show',['role'=>$role->id]));

        $response->assertSee('تفاصيل دور');
        $response->assertViewHas('role',$role);
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.role.create'));

        $response->assertSee('انشاء دور جديد');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $role = $this->createRoleData();

        $response = $this->actingAs($this->authUser)
            ->post(route('admin.role.store'),$role);

        $this->assertDatabaseHas('roles',$role);
    }

    public function test_edit()
    {
        $role = $this->createRandomRole();
        $response = $this->actingAs($this->authUser)->get(route('admin.role.edit',$role->id));

        $response->assertSee('تعديل دور');
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldRole = $this->createRandomRole();
        $newRole = $this->createRoleData();

        $response = $this->actingAs($this->authUser)
            ->put(route('admin.role.update',$oldRole->id),$newRole);

        $this->assertDatabaseHas('roles',$newRole);
        $this->assertDatabaseMissing('roles',[
            'name' => $oldRole->name
        ]);
    }

    public function test_destroy()
    {
        $role = $this->createRandomRole();
        
        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.role.destroy',[
                'id' => $role->id,
                'role' => $role
            ]));

        $this->assertSoftDeleted($role);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.role.archive'));
        
        $response->assertSee('أرشيف الأدوار');
        $response->assertViewHas('roles');
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $role = $this->createRandomRole();
        $role->delete();

        $this->assertSoftDeleted($role);

        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.role.trash'),[
                'id' => $role->id
            ]);

        $this->assertModelMissing($role);
    }

    public function test_restore()
    {
        $role = $this->createRandomRole();
        $role->delete();

        $this->assertSoftDeleted($role);

        $response = $this->actingAs($this->authUser)->post(route('admin.role.restore'),[
            'id' => $role->id
        ]);

        $this->assertModelExists($role);
    }

    private function createRoleData() : array
    {
        $this->setUpFaker();
        return $this->randomRoleData($this->faker);
    }
}
