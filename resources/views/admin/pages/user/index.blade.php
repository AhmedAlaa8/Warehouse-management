@extends('admin.master')

@section('title')
      <title>Users Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-user">
                        <h3 class="card-title float-right">جدول المستخدمين</h3>
                        <a href="{{ route('admin.user.create') }}" class="btn btn-success">إنشاء</a>
                  </div>

                  <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                          <th>
                                                التسلسل
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" id="exact" />
                                                <p>رقم الهوية</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>الإسم</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>العاتف</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>البريد الإلكتروني</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>ادمن أو موظف </p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>الدور</p>
                                          </th>
                                          <th>
                                                تفاصيل
                                          </th>
                                          <th>
                                                تعديل
                                          </th>
                                          <th>
                                                حذف
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($users as $index => $user)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{route('admin.user.show',$user)}}" >{{ $user->id }}</a>
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                
                                                @if ($user->is_admin)
                                                    <td class="text-primary">ادمن أو موظف</td>
                                                @else
                                                      <td class="text-info">عميل</td>
                                                @endif

                                                <td>
                                                      @forelse ($user->roles as $role)
                                                          {{$role->name}} 
                                                      @empty
                                                          <span class="text-danger">لا يوجد دور</span>
                                                      @endforelse
                                                </td>

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.user.show', $user->id) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.user.edit', $user->id) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.user.destroy', $user->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                                            <button type="submit" class="btn btn-outline-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>    
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $users->links() }}
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
                        <li class="breadcrumb-item active">جدول المستخدمين</li>
                  </ol>
            </div>
      </div>
@endsection
