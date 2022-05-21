@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.employe.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employes.update", [$employe->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="last_name">{{ trans('cruds.employe.fields.last_name') }}</label>
                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $employe->last_name) }}" required>
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.employe.fields.last_name_helper') }}</span>
                </div>
            <div class="form-group col-md-6">
                <label for="first_name">{{ trans('cruds.employe.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $employe->first_name) }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="birthday">{{ trans('cruds.employe.fields.birthday') }}</label>
                <input class="form-control date {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text" name="birthday" id="birthday" value="{{ old('birthday', $employe->birthday) }}">
                @if($errors->has('birthday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birthday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.birthday_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="address">{{ trans('cruds.employe.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $employe->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.address_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="mobile">{{ trans('cruds.employe.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $employe->mobile) }}" required>
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="cin">{{ trans('cruds.employe.fields.cin') }}</label>
                <input class="form-control {{ $errors->has('cin') ? 'is-invalid' : '' }}" type="text" name="cin" id="cin" value="{{ old('cin', $employe->cin) }}">
                @if($errors->has('cin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.cin_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label>{{ trans('cruds.employe.fields.bank') }}</label>
                <select class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}" name="bank" id="bank">
                    <option value disabled {{ old('bank', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employe::BANK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('bank', $employe->bank) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('bank'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.bank_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="rib">{{ trans('cruds.employe.fields.rib') }}</label>
                <input class="form-control {{ $errors->has('rib') ? 'is-invalid' : '' }}" type="text" name="rib" id="rib" value="{{ old('rib', $employe->rib) }}" required>
                @if($errors->has('rib'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rib') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.rib_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="salary">{{ trans('cruds.employe.fields.salary') }}</label>
                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="number" name="salary" id="salary" value="{{ old('salary', $employe->salary) }}" step="0.01">
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.salary_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required">{{ trans('cruds.employe.fields.salary_type') }}</label>
                <select class="form-control {{ $errors->has('salary_type') ? 'is-invalid' : '' }}" name="salary_type" id="salary_type" required>
                    <option value disabled {{ old('salary_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employe::SALARY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('salary_type', $employe->salary_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.salary_type_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="job_id">{{ trans('cruds.employe.fields.job') }}</label>
                <select class="form-control select2 {{ $errors->has('job') ? 'is-invalid' : '' }}" name="job_id" id="job_id">
                    @foreach($jobs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('job_id') ? old('job_id') : $employe->job->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.job_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label>{{ trans('cruds.employe.fields.contract_type') }}</label>
                <select class="form-control {{ $errors->has('contract_type') ? 'is-invalid' : '' }}" name="contract_type" id="contract_type">
                    <option value disabled {{ old('contract_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Employe::CONTRACT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('contract_type', $employe->contract_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('contract_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.contract_type_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="job_start">{{ trans('cruds.employe.fields.job_start') }}</label>
                <input class="form-control date {{ $errors->has('job_start') ? 'is-invalid' : '' }}" type="text" name="job_start" id="job_start" value="{{ old('job_start', $employe->job_start) }}">
                @if($errors->has('job_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.job_start_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="job_end">{{ trans('cruds.employe.fields.job_end') }}</label>
                <input class="form-control date {{ $errors->has('job_end') ? 'is-invalid' : '' }}" type="text" name="job_end" id="job_end" value="{{ old('job_end', $employe->job_end) }}">
                @if($errors->has('job_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.job_end_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="picture">{{ trans('cruds.employe.fields.picture') }}</label>
                <div class="needsclick dropzone {{ $errors->has('picture') ? 'is-invalid' : '' }}" id="picture-dropzone">
                </div>
                @if($errors->has('picture'))
                    <div class="invalid-feedback">
                        {{ $errors->first('picture') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employe.fields.picture_helper') }}</span>
            </div>
            <div class="form-group col-md-8">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.pictureDropzone = {
    url: '{{ route('admin.employes.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 1000,
      height: 1000
    },
    success: function (file, response) {
      $('form').find('input[name="picture"]').remove()
      $('form').append('<input type="hidden" name="picture" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="picture"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($employe) && $employe->picture)
      var file = {!! json_encode($employe->picture) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="picture" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection