@extends('admin.master')

@section('title')
      <title>Orders Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-order">
                        <h3 class="card-title float-right">جدول الاوردرات</h3>
                        <a href="{{ route('admin.order.createOrderPage') }}" class="btn btn-success">إنشاء</a>
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
                                                <p>اسم المستخدم</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>التاريخ</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>العنوان</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>الخصم</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>الإجمالي</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>الإجمالي بعد الخصم</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>المفوع</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>الباقي</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>الحالة</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                <p>النوع</p>
                                          </th>
                                          <th>
                                                تفاصيل
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($orders as $index => $order)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{ route('admin.order.show', $order->id) }}"
                                                            >{{ $order->id }}</a>
                                                </td>
                                                <td>{{ $order->user->name ?? '' }}</td>
                                                <td>{{ $order->date }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ $order->discount }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ $order->total_after_discount }}</td>
                                                <td>{{ $order->paid }}</td>
                                                <td>{{ $order->left }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->type }}</td>

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info" 
                                                            href="{{ route('admin.order.show', $order->id) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $orders->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> الأوردرات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول الأوردرات</li>
                  </ol>
            </div>
      </div>
@endsection
