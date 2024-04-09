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
                <td>{{ $model->name }}</td>
          </tr>
          <tr>
                <td>البريد الإلكتروني</td>
                <td>{{ $model->email }}</td>
          </tr>
          <tr>
                <td> الهاتف 1</td>
                <td class="{{isset($model->profile->phone1) ? '' : 'text-danger'}}">{{ $model->profile->phone1 ?? " لا يوجد هاتف 1" }}</td>
          </tr>
          <tr>
                <td>الهاتف 2 </td>
                <td class="{{isset($model->profile->phone2) ? '' : 'text-danger'}}">{{ $model->profile->phone2 ?? "لا يوجد هاتف 2" }}</td>
          </tr>
          <tr>
                <td>هاتف المنزل </td>
                <td class="{{isset($model->profile->home_phone) ? '' : 'text-danger'}}">{{ $model->profile->home_phone ?? "لا يوجد هاتف منزل" }}</td>
          </tr>
          <tr>
                <td>العنوان </td>
                <td class="{{isset($model->profile->address) ? '' : 'text-danger'}}">{{ $model->profile->address ?? "لا يوجد عنوان" }}</td>
          </tr>
          <tr>
                <td>الوظيفة </td>
                <td class="{{isset($model->profile->job) ? '' : 'text-danger'}}">{{ $model->profile->job ?? "لا يوجد وظيفة" }}</td>
          </tr>
          <tr>
                <td>النوع </td>
                @isset($model->profile->type)
                <td style="background-color: {{getUserTypes()[$model->profile->type]['color']}}">{{ getUserTypes()[$model->profile->type]['ar'] }}</td>
                @else
                <td class="{{isset($model->profile->type) ? '' : 'text-danger'}}">لا يوجد نوع</td>
                @endisset
          </tr>
          <tr>
                <td>الرصيد </td>
                <td>{{ $model->profile->credit ?? 0}}</td>
          </tr>
          <tr>
                <td>اجمالي ما دفع </td>
                <td>{{ $model->profile->total_paid ?? 0 }}</td>
          </tr>
          <tr>
                <td>اجمالي المكسب </td>
                <td >{{ $model->profile->total_earned ?? 0 }}</td>
          </tr>
    </tbody>
</table>