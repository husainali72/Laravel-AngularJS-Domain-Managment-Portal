@extends('adminTheme.default')

@section('title',  __('admin.general.import').' '.__('admin.geo.translation'))

@section('content-header')
    <h1>@lang('admin.general.manage') @lang('admin.geo.translation')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> @lang('admin.general.dashboard')
            </a>
        </li>
        <li>
            <a href="#"> @lang('admin.geo')</a>
        </li>
        <li>
            <a href="{{ route('translations.index') }}"> @lang('admin.geo.translation')</a>
        </li>
        <li class="active"> @lang('admin.general.import') @lang('admin.geo.translation')</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> @lang('admin.general.import') @lang('admin.geo.translation')
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{ route('translations.import.post')  }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <fieldset>

                            <!-- Enter Language Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="file">@lang('admin.geo.translation.language'):</label>
                                <div class="col-md-8">
                                    <select name="language_id" id="language_id" class="form-control">
                                        <option value="">--- @lang('admin.general.select') @lang('admin.geo.translation.language') ---</option>
                                        @php
                                            $sel = old('language_id');
                                        @endphp
                                        @if(!empty($languageList))
                                            @foreach($languageList as $id => $name)
                                                <option value="{{$id}}" {{ $sel == $id ? 'selected' : '' }} readonly="true">{{$name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <!-- Enter File Field -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="file">@lang('admin.general.uploadFile'):</label>
                                <div class="col-md-8">
                                    <input type="file" id="file" name="file" class="form-control" >
                                    <p class="text-warning">You can download sample file of csv from here: <a href="/Modules/GEO/Demo/translate_data_sample.csv">translate_data_sample.csv</a></p>
                                </div>
                            </div>

                            <!-- Submit Field -->
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> @lang('admin.general.save')</button>
                                <a href="{!! route('languages.index') !!}" class="btn btn-danger"><i class="fa fa-fw fa-times"></i> @lang('admin.general.cancel')</a>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </div>
    </div>
@stop
