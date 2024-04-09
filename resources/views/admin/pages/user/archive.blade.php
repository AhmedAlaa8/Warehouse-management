@extends('admin.master')

@section('title')
      <title>User Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف المستخدمين</h3>
                  </div>

                  <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                          <th>
                                                استعادة
                                          </th>
                                          <th>
                                                حذف تماما
                                          </th>
                                          <th>
                                                التسلسل
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" id="exact" />
                                                رقم الهوية
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الإسم 
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الهاتف 
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>ادمن أو موظف </p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                البريد الإلكتروني 
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($users as $index => $user)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.user.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.user.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->phone }}</td>
                                                @if ($user->is_admin)
                                                    <td class="text-primary">ادمن أو موظف</td>
                                                @else
                                                      <td class="text-info">عميل</td>
                                                @endif
                                                <td>{{ $user->email }}</td>
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
                  <h1 class="m-0 text-primary">المستخدمين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف المستخدمين</li>
                  </ol>
            </div>
      </div>
@endsection
