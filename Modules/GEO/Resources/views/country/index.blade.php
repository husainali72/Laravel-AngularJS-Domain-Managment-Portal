@extends('adminTheme.default')

@section('title', __('admin.general.manage').' '.__('admin.geo.country'))

@section('content-header')
	<h1>@lang('admin.general.manage') @lang('admin.geo.country')</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> @lang('admin.general.dashboard')
			</a>
		</li>
		<li>
			<a href="#">  @lang('admin.geo')</a>
		</li>
		<li class="active"> @lang('admin.geo.country')</li>
	</ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box primary">
				<div class="portlet-title">
					<div class="caption">
						<i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>  @lang('admin.general.managedata',['name'=> __('admin.geo.country')])
					</div>
				</div>
				<div class="portlet-body">

					<div class="row">
						<div class="col-md-5">
							<form action="{{ route('countries.index') }}">
								<div class="form-group input-group">
									<input type="text" class="form-control" placeholder="{{ __('admin.general.search') }}..." name="search" value="{{ request()->get('search') }}">
									<span class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</span>
								</div>
							</form>
						</div>
						<div class="col-md-7">
							<div class="pull-right">
							<a class="btn btn-success btn-margin-bt" href="{{ route('countries.create') }}"><i class="fa fa-fw fa-plus"></i> @lang('admin.general.create') @lang('admin.geo.country')</a>
							<a class="btn btn-warning btn-margin-bt" href="{{ route('countries.export') }}"><i class="fa fa-fw fa-download"></i>  @lang('admin.general.export')</a>
							<a class="btn btn-info btn-margin-bt" href="{{ route('countries.import') }}"><i class="fa fa-fw fa-file-excel-o"></i> @lang('admin.general.import')</a>
							</div>
						</div>

						<div class="col-md-12">
							<div class="table-scrollable">
								<table class="table table-hover table-bordered">
									<thead>
									<tr>
										<th>#</th>
										<th>@lang('admin.geo.country.name')</th>
										<th>@lang('admin.geo.country.IsoAlphaCode2')</th>
										<th>@lang('admin.geo.country.code')</th>
										<th>@lang('admin.geo.country.Tld')</th>
										<th width="190px">@lang('admin.general.action')</th>
									</tr>
									</thead>
									<tbody>
									@if($countries->count() > 0)
										@foreach($countries as $country)
											<tr>
												<td>{{ $country->id }}</td>
												<td>{{ $country->name }}</td>
												<td>{{ $country->iso_alpha_2_code }}</td>
												<td>{{ $country->code }}</td>
												<td>{{ $country->tld }}</td>
												<td>
													<form action="{{ route('countries.destroy', $country->id)  }}" method="POST">
														<a href="{{ route('countries.show', $country->id)  }}" class="btn btn-info" data-toggle="tooltip" title="View"><i class="fa fa-fw fa-eye"></i></a>
														<a href="{{ route('countries.edit', $country->id)  }}" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></a>
														@method('DELETE')
														@csrf
														<button type="submit" class="btn btn-danger remove-item" data-toggle="tooltip" title="Delete"><i class="fa fa-fw fa-trash-o"></i></button>
													</form>
												</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="8" class="text-center">@lang('admin.general.nodata',['name'=> __('admin.geo.country')])</td>
										</tr>
									@endif
									</tbody>
								</table>
								{{ $countries->links() }}
							</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@stop
