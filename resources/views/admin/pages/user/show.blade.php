@extends('admin.master')

@section('title')
      <title>User | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-info">
                        <h3 class="card-title float-right">تفاصيل مستخدم {{$user->name}}</h3>
                  </div>

                  <div class="card-body d-right">
                        <div class="row">
                              <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                    <div class="row">
                                          <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                      {{-- <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">عدد الموردين</span>
                                                            <span class="info-box-number text-center text-muted mb-0">{{ $company->suppliers->count() }}</span>
                                                      </div> --}}
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-12">
                                                <div class="d-flex justify-content-between mb-3">
                                                      <h4 class="user">بيانات المستخدم</h4>
                                                      <a href="{{route('admin.userProfile.create',$user)}}" class="btn btn-info">تعديل بيانات المستخدم</a>
                                                </div>
                                                <div class="post">
                                                      <table class="table table-bordered">
                                                            <thead>
                                                                  <tr>
                                                                        <th>key</th>
                                                                        <th>value</th>
                                                                  </tr>
                                                            </thead>
                                                            <tbody>
                                                                  <tr>
                                                                        <td>الاسم</td>
                                                                        <td>{{ $user->name }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>البريد الإلكتروني</td>
                                                                        <td>{{ $user->email }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td> الهاتف 1</td>
                                                                        <td class="{{isset($user->profile->phone1) ? '' : 'text-danger'}}">{{ $user->profile->phone1 ?? " لا يوجد هاتف 1" }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>الهاتف 2 </td>
                                                                        <td class="{{isset($user->profile->phone2) ? '' : 'text-danger'}}">{{ $user->profile->phone2 ?? "لا يوجد هاتف 2" }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>هاتف المنزل </td>
                                                                        <td class="{{isset($user->profile->home_phone) ? '' : 'text-danger'}}">{{ $user->profile->home_phone ?? "لا يوجد هاتف منزل" }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>العنوان </td>
                                                                        <td class="{{isset($user->profile->address) ? '' : 'text-danger'}}">{{ $user->profile->address ?? "لا يوجد عنوان" }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>الوظيفة </td>
                                                                        <td class="{{isset($user->profile->job) ? '' : 'text-danger'}}">{{ $user->profile->job ?? "لا يوجد وظيفة" }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>النوع </td>
                                                                        @isset($user->profile->type)
                                                                        <td style="background-color: {{getUserTypes()[$user->profile->type]['color']}}">{{ getUserTypes()[$user->profile->type]['ar'] }}</td>
                                                                        @else
                                                                        <td class="{{isset($user->profile->type) ? '' : 'text-danger'}}">لا يوجد نوع</td>
                                                                        @endisset
                                                                  </tr>
                                                                  <tr>
                                                                        <td>الرصيد </td>
                                                                        <td class="{{isset($user->profile->credit) ? '' : 'text-danger'}}">{{ $user->profile->credit ?? "لا يوجد رصيد" }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>اجمالي ما دفع </td>
                                                                        <td class="{{isset($user->profile->total_paid) ? '' : 'text-danger'}}">{{ $user->profile->total_paid ?? "لا يوجد اجمالي مدفوعات" }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>اجمالي المكسب </td>
                                                                        <td class="{{isset($user->profile->total_earned) ? '' : 'text-danger'}}">{{ $user->profile->total_earned ?? "لا يوجد مكسب" }}</td>
                                                                  </tr>
                                                            </tbody>
                                                      </table>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> المستخدمين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">جدول المستخدمين</a></li>
                        <li class="breadcrumb-item active">معلومات المستخدم</li>
                  </ol>
            </div>
      </div>
@endsection
