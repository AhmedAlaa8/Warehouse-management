<?php

namespace Tests\Feature;

use App\Http\Traits\CompanyTrait;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use CompanyTrait,DatabaseTransactions,WithFaker;

    private User $authUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->authUser = User::where('email','admin@admin.com')->first();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.company.index'));
        
        $response->assertSee('جدول الشركات');
        $response->assertViewHas('companies');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $company = $this->createRandomCompany();
        $response = $this->actingAs($this->authUser)->get(route('admin.company.show',['company'=>$company->id]));
        $title = "تفاصيل شركة " . $company->name;

        $response->assertSee($title);
        $response->assertViewHas('company',$company);
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.company.create'));

        $response->assertSee('انشاء شركة جديدة');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $company = $this->createCompanyData();

        $response = $this->actingAs($this->authUser)->post(route('admin.company.store'),$company);

        $this->assertDatabaseHas('companies',$company);
    }

    public function test_edit()
    {
        $company = $this->createRandomCompany();
        $response = $this->actingAs($this->authUser)->get(route('admin.company.edit',$company->id));


        $response->assertSee('تعديل شركة');
        $response->assertViewHas('company',$company);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $oldCompany = $this->createRandomCompany();
        $newCompany = $this->createCompanyData();
        
        $response = $this->actingAs($this->authUser)
        ->put(route('admin.company.update',$oldCompany->id),$newCompany);

        $this->assertDatabaseHas('companies',$newCompany);
        $this->assertDatabaseMissing('companies',[
            'name' => $oldCompany->name
        ]);
    }

    public function test_destroy()
    {
        $company = $this->createRandomCompany();

        $response = $this->actingAs($this->authUser)
            ->delete(route('admin.company.destroy',[
                'id' => $company->id,
                'company' => $company
            ]));

            $this->assertSoftDeleted($company);
    }

    public function test_archive()
    {
        $response = $this->actingAs($this->authUser)->get(route('admin.company.archive'));
        $companies = Company::onlyTrashed()->paginate(20);

        $response->assertSee('أرشيف الشركات');
        $response->assertViewHas('companies',$companies);
        $response->assertStatus(200);
    }

    public function test_trash()
    {
        $company = $this->createRandomCompany();
        $company->delete();

        $this->assertSoftDeleted($company);

        $response = $this->actingAs($this->authUser)->delete(route('admin.company.trash'),[
            'id' => $company->id
        ]);

        $this->assertModelMissing($company);
    }

    public function test_restore()
    {
        $company = $this->createRandomCompany();
        $company->delete();

        $this->assertSoftDeleted($company);

        $response = $this->actingAs($this->authUser)->post(route('admin.company.restore'),[
            'id' => $company->id
        ]);

        $this->assertModelExists($company);
    }

    private function createCompanyData()
    {
        $this->setUpFaker();
        return $this->randomCompanyData($this->faker);
    }
}
