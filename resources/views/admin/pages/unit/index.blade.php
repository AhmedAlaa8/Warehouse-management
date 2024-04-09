@extends('admin.master')

@section('title')
      <title>Units Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-unit">
                        <h3 class="card-title float-right">جدول الوحدات</h3>
                        <a href="{{ route('admin.unit.create') }}" class="btn btn-success">إنشاء</a>
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
                                                <p>اسم الوحدة</p>
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
                                    @foreach ($units as $index => $unit)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{route('admin.unit.show',$unit)}}" >{{ $unit->id }}</a>
                                                </td>
                                                <td>{{ $unit->name }}</td>

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.unit.show', $unit->id) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.unit.edit', $unit->id) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.unit.destroy', $unit->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $unit->id }}">
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
                        {{ $units->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> الوحدات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول الوحدات</li>
                  </ol>
            </div>
      </div>
@endsection
