<div class="form-group row">
    <label for="type" class="col-sm-2 col-form-label">نوع المخزن</label>
    <div class="col-sm-10">
          <select class="form-control select2 select2-hidden-accessible type" style="width: 100%;" data-select2-id="1"
          tabindex="-1" aria-hidden="true" name="{{$name}}" id="{{$id}}">
                <option> {{$label}}</option>
                @foreach (getStoreTypes() as $en => $info)
                      <option value="{{$en}}" {{old('type') == $en ? "selected" : ""}}>{{$info['ar']}}</option>
                @endforeach
          </select>
          @foreach ($errors->get($name) as $message)
                <span class="text-danger">{{ $message }}</span> <br>
          @endforeach
    </div>
</div>
