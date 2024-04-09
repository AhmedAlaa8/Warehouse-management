@extends('admin.master')

@section('title')
      <title>Stores Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-store">
                        <h3 class="card-title float-right">جدول المخازن</h3>
                        <a href="{{ route('admin.store.create') }}" class="btn btn-success">إنشاء</a>
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
                                                اسم المخزن
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                العنوان 
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                النوع 
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
                                    @foreach ($stores as $index => $store)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{route('admin.store.show',$store)}}" >{{ $store->id }}</a>
                                                </td>
                                                <td>{{ $store->name }}</td>
                                                <td>{{ $store->address }}</td>

                                                <td style="background-color: {{getStoreTypes()[$store->type]['color']}}">{{ getStoreTypes()[$store->type]['ar'] }}</td>

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.store.show', $store->id) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.store.edit', $store->id) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.store.destroy', $store->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $store->id }}">
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
                        {{ $stores->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> المخازن</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول المخازن</li>
                  </ol>
            </div>
      </div>
@endsection
