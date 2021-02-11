@extends('layouts.app-business')
@section('department-view')
{{-- <h4>Update Department</h4><br> --}}
<form action="{{ LaravelLocalization::localizeUrl(route('department.view')) }}" method="POST" class="form-inline my-3 my-lg-0" style="padding: 20px;">
    {{ csrf_field() }}
    <h4></h4>&emsp;&emsp;
    <input class="form-control mr-sm-4" style="width: 300px;" type="search" name="keywords" id="keywords" placeholder="{{ __('msg.search') }}" aria-label="search">
    <select class="form-control" name="keystatus"  id="keystatus" style="width: 100px">
        {{-- <option value="" selected>{{ __('msg.status') }}</option> --}}
        <option value="A">{{ __('msg.active') }}</option>
        <option value="I">{{ __('msg.inactive') }}</option>
        <option value="D">{{ __('msg.delete') }}</option>
    </select>&emsp;&emsp;
    <button class="btn btn-success" type="submit">{{ __('msg.search') }}</button>
</form>
<br>
    <table class="table table-striped table-hover table-users" style="margin-left:20px">
        <thead>
            {{-- <tr style="background-color: rgb(80, 114, 226)"> --}}
            <tr>    
                <th>{{ __('dept.deptcode') }}</th>
                <th>{{ __('dept.deptname') }}</th>
                <th>{{ __('msg.status') }}</th>
                <th>{{ __('msg.update') }}</th>
                <th>{{ __('msg.delete') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($DepartmentInfo as $deptInfo)
            <tr>
                <td>{{ $deptInfo->DEPTCD }}</td>
                <td>{{ $deptInfo->DEPTNM }}</td>
                <td>@if($deptInfo->DEPTSTATUS == 'A') {{ __('msg.active') }} @elseif($deptInfo->DEPTSTATUS == 'I') {{ __('msg.inactive') }}@elseif($deptInfo->DEPTSTATUS == 'D') {{ __('msg.delete') }}@endif</td>
                <td><a href="{{ route('edit.dept', ['busid'=>$deptInfo->BUSID, 'deptcd'=>$deptInfo->DEPTCD]) }}" class="btn btn-outline-dark btn-sm">{{ __('msg.edit') }}</a></td>
                <td><a href="{{ route('delete.dept', ['deptid'=>$deptInfo->DEPTID]) }}" onclick="return confirm('{{ __('msg.datadelete') }}')" class="btn btn-outline-danger btn-sm">{{ __('msg.delete') }}</a></td>
                {{-- <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h3 id="myModalLabel">Delete</h3>
        </div>
        <div class="modal-body">
            <p></p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
        </div>
    </div> --}}
<script>
    $('#myModal').on('show', function() {
        var tit = $('.confirm-delete').data('title');

        $('#myModal .modal-body p').html("Desea eliminar al usuario " + '<b>' + tit +'</b>' + ' ?');
        var id = $(this).data('id'),
        removeBtn = $(this).find('.danger');
    })

    $('.confirm-delete').on('click', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        $('#myModal').data('id', id).modal('show');
    });

    $('#btnYes').click(function() {
        // handle deletion here
        var id = $('#myModal').data('id');
        $('[data-id='+id+']').parents('tr').remove();
        $('#myModal').modal('hide');
        
    });
</script>
@endsection
