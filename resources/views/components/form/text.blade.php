

<div class="form-group row">
    <label for="manager_phone" class="col-sm-2 col-form-label">{{ $label }}</label>
    <div class="col-sm-10">
          <input type="text" class="form-control @error($name) {{ 'is-invalid' }} @enderror" name="{{ $name }}" id="{{ $id }}" value="{{old($name)}}">
          @foreach ($errors->get($name) as $message)
          <span class="text-danger">{{ $message }}</span> <br>
          @endforeach
    </div>
</div>
