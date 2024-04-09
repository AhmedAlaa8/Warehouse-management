@extends('admin.master')

@section('title')
    <title>Roles Table | Dashboard</title>
@endsection


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-role">
                <h3 class="card-title float-right">جدول الأدوار</h3>
                <a href="{{ route('admin.role.create') }}" class="btn btn-success">إنشاء</a>
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
                                اسم الدور
                            </th>
                            <th>
                                <input type="text" style="min-width:200px" />
                                الاسم المعروض
                            </th>
                            <th>
                                <input type="text" style="min-width:200px" />
                                الوصف
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
                        @foreach ($roles as $index => $role)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>
                                    <a href="{{ route('admin.role.show', $role) }}">{{ $role->id }}</a>
                                </td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>

                                <td class="text-center">
                                    <a class="btn btn-outline-info" href="{{ route('admin.role.show', $role->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" href="{{ route('admin.role.edit', $role->id) }}">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <form method="POST" action="{{ route('admin.role.destroy', $role->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $role->id }}">
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
                {{ $roles->links() }}
            </div>
        </div>
    </div>
@endsection




@section('bread')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-primary"> الأدوار</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active">جدول الأدوار</li>
            </ol>
        </div>
    </div>
@endsection
