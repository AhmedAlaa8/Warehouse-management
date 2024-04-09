@extends('admin.master')

@section('title')
      <title>Role Permission Table | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <form method="POST" action="{{route('admin.permission.addRolePermission')}}">
                  @csrf
                  <div class="card">
                        <div class="card-header bg-rolePermission">
                              <h3 class="card-title float-right">صلاحيات الأدوار</h3>
                        </div>

                        <div class="container px-5 mt-5">
                              <div class="form-group row">
                                    <label for="role_id" class="col-sm-2 col-form-label">اختر الدور</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible role_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="role_id" id="role_id">
                                                <option value="0">اختر</option>
                                                @foreach ($roles as $role)
                                                      <option value="{{ $role->id }}"
                                                            {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                            {{ $role->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('role_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>
                        </div>

                        <div class="card-body">
                              <table id="" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>
                                                      الجدول
                                                </th>
                                                <th class="text-center">
                                                      قرائة
                                                </th>
                                                <th class="text-center">
                                                      انشاء
                                                </th>
                                                <th class="text-center">
                                                      تعديل
                                                </th>
                                                <th class="text-center">
                                                      حذف
                                                </th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                                @foreach ($tablesPermission as $table => $tablePermissionsArray)
                                                      <tr>
                                                            <td class="bg-dark">{{$table}}</td>
                                                            @foreach ($tablePermissionsArray as $tablePermission)
                                                                  <td>
                                                                        <input class="form-control" type="checkbox" name="permission[]" value="{{$tablePermission['name']}}" >
                                                                  </td>
                                                            @endforeach
                                                      </tr>
                                                @endforeach
                                                
                                    </tbody>
                              </table>
                                    
                        </div>
                        <div class="card-footer">
                              <button type="submit" class="btn btn-info">تأكيد</button>
                        </div>
                  </div>
            </form>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary">صلاحيات الأدوار</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول صلاحيات الأدوار</li>
                  </ol>
            </div>
      </div>
@endsection


@section('javascript')
      <script>

            $(document).ready(function() {
                  $('.select2').select2()
            });


            $('#role_id').on('change',function(){
                  let id = $(this).val();
                  if(id == 0)
                  {
                        $(`input[type='checkbox']`).prop('checked', false)
                  }
                  else
                  {
                        $.ajax({
                              url: "../permission/getRolePermissions/" + id,
                              type: 'get',
                              success: function (res) {
                                    $(`input[type='checkbox']`).prop('checked', false)
                                    res.forEach(element => {
                                          $(`input[value='${element.name}']`).prop('checked', true)
                                    });
                              }
                        });
                  }
            })
      </script>
@endsection