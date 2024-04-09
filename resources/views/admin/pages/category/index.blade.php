@extends('admin.master')

@section('title')
      <title>Category Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-category">
                        <h3 class="card-title float-right">جدول التصنيفات</h3>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success">إنشاء</a>
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
                                                رقم الهوية
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                اسم التصنيف 
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الأب 
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
                                    @foreach ($categories as $index => $category)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{route('admin.category.show',$category)}}" >{{ $category->id }}</a>
                                                </td>
                                                <td>{{ $category->name }}</td>
                                                @isset($category->parent)
                                                      <td>{{ $category->parent->name }}</td>
                                                @else
                                                      <td class="bg-primary">التصنيف جذر</td>
                                                @endisset

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.category.show', $category->id) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.category.edit', $category->id) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.category.destroy', $category->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $category->id }}">
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
                        <li class="breadcrumb-item active">جدول التصنيفات</li>
                  </ol>
            </div>
      </div>
@endsection
