@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Resellers</h3>
    <p>
        <a href="{{ route('admin.resellers.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default" style="background: white;">
        <div class="panel-heading">
            {{-- @lang('global.app_list') --}}
        </div>

        <div class="panel-body table-responsive">
           
            
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('global.users.fields.name')</th>
                        <th>@lang('global.users.fields.email')</th>
                        <th>Domains</th>
                        
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                    
                        @foreach ($users as $user => $val)

                            @if($val->id!=1)
                            <!-- @if($val->branding != null)  -->
                            <tr data-entry-id="{{ $val->id }}">
                                <td></td>

                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>
                                    <?php
                                    // echo $val->id;
                                    $users  = DB::table('sucuri_user')->where('user_id',$val->id)->where('active',1)->get();
                                // dump($users->name); 
                                foreach($users as $user){
                                // // return "$user->name";
                                $s_key = "$user->s_key";
                                $a_key= "$user->a_key";
                                $url = "$user->url";
                                $id = "$user->id";
                                echo "<p class = 'btn btn-xs btn-dark'>$url</p> <br>";
                                }

?>
                                </td>

                                <td>
                                    <center>
                                    <div style="">
                                    
                                    <a href="{{ route('admin.users.edit',[$val->id]) }}" class="btn btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $val->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-danger')) !!}
                                    {!! Form::close() !!}
                                </div>
                                    </center>
                                </td>

                            </tr>
                            <!-- @endif -->
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>    <br>
    <br>
    <br>    <br>
    <br>
    <br>
@stop


