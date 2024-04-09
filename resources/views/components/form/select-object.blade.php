

<div class="form-group row">
    <label for="parent_id" class="col-sm-2 col-form-label">{{$label}}</label>
    <div class="col-sm-10">
          <select class="form-control select2 select2-hidden-accessible parent_id" style="width: 100%;" data-select2-id="1"
          tabindex="-1" aria-hidden="true" name="{{$name}}" id="{{$id}}">
                <option value="0">اختر</option>
                @foreach ($collection as $cat)
                      <option value="{{$cat->id}}" {{old($name) == $cat->id ? "selected" : ""}}>{{$cat->name}}</option>
                @endforeach
          </select>
          @foreach ($errors->get($name) as $message)
                <span class="text-danger">{{ $message }}</span> <br>
          @endforeach
    </div>
</div>
