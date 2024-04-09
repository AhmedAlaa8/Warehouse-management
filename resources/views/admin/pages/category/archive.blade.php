@extends('admin.master')

@section('title')
      <title>Category Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف التصنيفات</h3>
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
                                                التصنيف
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                التصنيف الأب
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($categories as $index => $category)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.category.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.category.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                
                                                @isset($category->parent)
                                                <td>{{ $category->parent->name }}</td>
                                                @else
                                                      <td class="bg-primary">التصنيف جذر</td>
                                                @endisset
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $categories->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> التصنيفات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف التصنيفات</li>
                  </ol>
            </div>
      </div>
@endsection
