@extends('admin.layouts.master')
@section('content')
    <div class="page-header">
        @php
            $items = [['title' => 'لیست نقش ها', 'route_link' => 'admin.roles.index'], ['title' => 'ثبت نقش جدید']];
        @endphp
        <x-breadcrumb :items="$items" />
    </div>

    <x-card>
        <x-slot name="cardTitle">ثبت نقش جدید</x-slot>
        <x-slot name="cardOptions"><x-card-options /></x-slot>
        <x-slot name="cardBody">
            @include('components.errors')
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="name" class="control-label">نام (به انگلیسی) <span
                                    class="text-danger">&starf;</span></label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="نام را به انگلیسی اینجا وارد کنید" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="label" class="control-label">نام قابل مشاهده (به فارسی) <span
                                    class="text-danger">&starf;</span></label>
                            <input type="text" class="form-control" name="label" id="label"
                                placeholder="نام قابل مشاهده را به فارسی اینجا وارد کنید" value="{{ old('label') }}"
                                required>
                        </div>
                    </div>
                </div>
                <h4 class="header font-weight-bold text-center fs-20 p-2 mb-5">مجوزها</h4>
                @foreach ($permissions->chunk(4) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $permission)
                            <div class="col-12 col-xl-3 col-lg-6">
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="permissions[]"
                                            value="{{ $permission->id }}" />
                                        <span class="custom-control-label">{{ $permission->label }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <button class="btn btn-pink" type="submit">ثبت و ذخیره</button>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-card>
@endsection