<div class="list-group">
	<a href="{{ route('admin.settings.blog') }}"
		class="list-group-item @if(request()->route()->getName() === 'admin.settings.blog') active @endif">
		{{ trans('admin.settings.blog.title') }}
	</a>
	<a href="{{ route('admin.settings.user') }}"
		class="list-group-item @if(request()->route()->getName() === 'admin.settings.user') active @endif">
		{{ trans('admin.settings.user.title') }}
	</a>
	<a href="{{ route('admin.settings.password') }}"
		class="list-group-item @if(request()->route()->getName() === 'admin.settings.password') active @endif">
		{{ trans('admin.settings.password.title') }}
	</a>
</div>