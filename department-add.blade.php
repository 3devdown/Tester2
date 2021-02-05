@extends('layouts.app-business')

@section('department-add')
{{-- <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes"> --}}
<div class="box-add boder-add">
      <div class="col-md-12">
        <br>
        @if(empty($deptData[0]->deptid))
        <h3>{{ __('Add Department') }}</h3>
        <form action="{{ route('department.add.submit') }}" method="POST">
          @csrf
        <br>
        @if (count($errors) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  @foreach($errors->all() as $error)
                  {{ $error }} <br>
                  @endforeach
                </div>
            </div>
        </div><br>
        @endif
          <div class="form-group mx-sm-3 mb-2">
            <label for="deptcd">{{ __('Department CODE') }}</label>
            <input type="text" class="form-control" id="deptcd" name="deptcd" placeholder="Codes" @error('deptcd') is-invalid @enderror
            value="{{ old('deptcd') }}">
            @error('deptcd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div><br>
          <div class="form-group mx-sm-3 mb-2">
            <label for="deptnm_th">{{ __('Department Name (Thai)') }}</label>
            <input type="text" class="form-control" id="deptnm_th" name="deptnm_th"  placeholder="Name(Th)"
            value="{{ old('deptnm_th') }}">
            @error('deptnm_th')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div><br>
          <div class="form-group mx-sm-3 mb-2">
            <label for="deptnm_en">{{ __('Department Name (English)') }}</label>
            <input type="text" class="form-control" id="deptnm_en" name="deptnm_en" placeholder="Name(En)"
            value="{{ old('deptnm_en') }}">
            @error('deptnm_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div><br>
            <div class="form-group mx-sm-3 mb-2">
              <label for="deptstatus">{{ __('msg.status') }}</label><br>
              <select class="form-control" name="deptstatus" id="deptstatus">
                <option value="A">{{ __('msg.active')}}</option>
              </select>
            </div>
          <br><br>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary ">{{ __('msg.submit') }}</button>&emsp;&emsp;
              <button type="reset" class="btn btn-danger">{{ __('msg.clear') }}</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              <a href="javascript:history.back()" class="btn btn-secondary">{{ __('msg.close') }}</a>
            </div>
        </form>
      </div>
</div>
  @else 
    @if($deptData[0]->deptstatus == 'A' || $deptData[0]->deptstatus == 'I')
     <h3>{{ __('Update Department') }}</h3>
      <form action="{{ route('update.dept', ['deptid'=>$deptData[0]->deptid, 'slanguage'=>$deptData[0]->slanguage]) }}" method="POST">
        @csrf
        <br>
        <div class="form-group mx-sm-3 mb-2">
          <label for="deptcd">{{ __('Department CODE') }}</label>
          <input type="text" class="form-control" id="deptcd" name="deptcd" placeholder="Codes" @error('deptcd') is-invalid @enderror
          value="{{ $deptData[0]->deptcd }}">
          @error('deptcd')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div><br>
        @if($slang[1]->LANGCD == 'TH')
        <div class="form-group mx-sm-3 mb-2">
          <label for="deptnm_th">{{ __('Department Name (Thai)') }}</label>
          <input type="text" class="form-control" id="deptnm_th" name="deptnm_th"  placeholder="Name(Th)"
          value="{{ $deptData[0]->deptnm_th }}">
          @error('deptnm_th')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div><br>
        @endif
          <div class="form-group mx-sm-3 mb-2">
            <label for="deptnm_en">{{ __('Department Name (English)') }}</label>
            <input type="text" class="form-control" id="deptnm_en" name="deptnm_en" placeholder="Name(En)"
            value="{{ $deptData[0]->deptnm_en }}">
            @error('deptnm_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div><br>
          <div class="form-group mx-sm-3 mb-2">
            <label for="deptstatus">{{ __('msg.status') }}</label><br>
            <select class="form-control" name="deptstatus" id="deptstatus">
              <option value="A" @if($deptData[0]->deptstatus == "A") {{ 'selected' }} @endif>{{ __('msg.active')}}</option>
              <option value="I" @if($deptData[0]->deptstatus == "I") {{ 'selected' }} @endif>{{ __('msg.inactive')}}</option>
            </select>
          </div>
        <br><br>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary ">{{ __('msg.submit') }}</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="javascript:history.back()" class="btn btn-secondary">{{ __('msg.close') }}</a>
        </div>
      </form>
      @elseif($deptData[0]->deptstatus == 'D')
        <h3>{{ __('Department') }}</h3>
        <form action="#" method="POST">
          @csrf
          <br>
        <div class="form-group mx-sm-3 mb-2">
          <label for="deptcd">{{ __('Department CODE') }}</label>
          <input type="text" class="form-control" id="deptcd" name="deptcd" placeholder="Codes" @error('deptcd') is-invalid @enderror
          value="{{ $deptData[0]->deptcd }}" readonly>
          @error('deptcd')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div><br>
        @if($slang[1]->LANGCD == 'TH')
        <div class="form-group mx-sm-3 mb-2">
          <label for="deptnm_th">{{ __('Department Name (Thai)') }}</label>
          <input type="text" class="form-control" id="deptnm_th" name="deptnm_th"  placeholder="Name(Th)"
          value="{{ $deptData[0]->deptnm_th }}" readonly>
          @error('deptnm_th')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div><br>
        @endif
          <div class="form-group mx-sm-3 mb-2">
            <label for="deptnm_en">{{ __('Department Name (English)') }}</label>
            <input type="text" class="form-control" id="deptnm_en" name="deptnm_en" placeholder="Name(En)"
            value="{{ $deptData[0]->deptnm_en }}" readonly>
            @error('deptnm_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div><br>
          <div class="form-group mx-sm-3 mb-2">
            <label for="deptstatus">{{ __('msg.status') }}</label><br>
            <select class="form-control" name="deptstatus" id="deptstatus" readonly>
              <option value="{{ $deptData[0]->deptstatus }}">{{ __('msg.delete')}}</option>
            </select>
          </div>
        <br><br>
        <div class="col-md-12">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="javascript:history.back()" class="btn btn-secondary">{{ __('msg.close') }}</a>
        </div>
      </form>
      @endif
  @endif
@endsection
<style>
    .box-add{
      width: 600px;
      height: 600px;
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto;
    }

    .boder-add{
        border: 5px solid black;
        color: white;
        background-color: #023f4a;
        border-radius: 30px;
        align-items: center;
    }

</style>