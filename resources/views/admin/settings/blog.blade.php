@extends('admin.layout', ['title' => trans('admin.settings.title')])

@section('content')
	<div class="page-header">
		<h2>@lang('admin.settings.title')</h2>
	</div>
	<div class="row">
		<div class="col-sm-3">
			@include('admin.settings.menu')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">@lang('admin.settings.blog.title')</h4>
				</div>
				{!! BootForm::openHorizontal(['md' => [3, 9]]) !!}
					{!! BootForm::bind($options) !!}
					{!! method_field('put') !!}
					<div class="panel-body">
						@include('common.alerts')
						{!! BootForm::text(trans('admin.settings.blog.form.title'), 'title')->autofocus()->required() !!}
						{!! BootForm::textarea(trans('admin.settings.blog.form.description'), 'description')->rows(10) !!}
						{!! BootForm::text(trans('admin.settings.blog.form.footer_text'), 'footer_text')->placeholder(trans('admin.settings.blog.form.footer_text_help')) !!}
						{!! BootForm::text(trans('admin.settings.blog.form.posts_per_page'), 'posts_per_page')->required() !!}
					</div>
					<div class="panel-footer text-right">
						<button type="submit" class="btn btn-primary">{{ trans('app.actions.save') }}</button>
					</div>
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection