<div class="form-group file-container" id="file-{{ $key }}">
	<label class="control-label col-md-2 col-sm-3" for="{{ $key }}">
		{{ $name }} @if($field->isRequired())*@endif
	</label>

	<div class="col-md-10 col-sm-9">
		<div class="panel">
			@if(!empty($value))
			<div class="panel-heading panel-toggler" data-icon="chevron-down">
				<span class="panel-title">@lang('datasource::fields.file.upload_new')</span>
			</div>
			@endif

			<div class="panel-body padding-sm @if(!empty($value)) panel-spoiler @endif">
				<div class="form-group">
					<div class="col-xs-12">
						{!! Form::file($key, [
							'id' => $key, 'class' => 'form-control upload-input'
						]) !!}
					</div>
				</div>

				<p class="help-block">
					@if(!empty($field->getAllowedTypes()))
						@lang('datasource::fields.file.allowed_types_list', ['types' => implode(', ', $field->getAllowedTypes())])
					@endif
					<br />
					@lang('datasource::fields.file.max_size', ['size' => \KodiCMS\Support\Helpers\Text::bytes($field->getMaxFileSize())])
				</p>

				@if(!empty($value))
				<hr class="no-margin-b"/>
				@endif
			</div>

				@if(!empty($value))
				<div class="panel-body padding-sm">
					{!! HTML::link($value, trans('datasource::fields.file.view_file'), [
						'target' => 'blank',
						'class' => ['btn btn-default'],
						'id' => 'uploaded-' . $key,
						'data-icon' => 'file'
					]) !!}
					&nbsp;&nbsp;&nbsp;
					<div class="checkbox-inline">
						<label>
							{!! Form::checkbox($key . '_remove', 1, false, ['class' => 'remove-file-checkbox']) !!} @lang('datasource::fields.file.remove_file')
						</label>
					</div>
				</div>
				@endif

			<div class="clearfix"></div>
		</div>
	</div>
</div>