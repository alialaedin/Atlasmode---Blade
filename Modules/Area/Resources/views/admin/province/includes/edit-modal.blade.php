@foreach ($provinces as $province)
<x-modal id="editProvinceModal-{{ $province->id }}" size="md">
	<x-slot name="title">ویرایش استان کد - {{ $province->id }}</x-slot>
	<x-slot name="body">
	  <form action="{{ route('admin.provinces.update', $province) }}" method="POST" class="save">
			@csrf
			@method('PUT')
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="name">نام استان :<span class="text-danger">&starf;</span></label>
						<input type="text" id="name" class="form-control" name="name" required value="{{ old('name', $province->name) }}">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="status" id="status" value="1" {{ old('status', $province->status) == 1 ? 'checked' : null }}/>
							<span class="custom-control-label">وضعیت</span>
						</label>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button class="btn btn-warning" type="submit">بروزرسانی</button>
				<button class="btn btn-outline-danger" data-dismiss="modal">انصراف</button>
			</div>
		</form>
	</x-slot>
</x-modal>
@endforeach
