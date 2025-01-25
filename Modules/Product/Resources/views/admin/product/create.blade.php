@extends('admin.layouts.master')

@section('styles')
<style>  
    .image-size {  
        width: 100%;         
        min-height: 100px;       
        max-height: 100px;       
        object-fit: cover;   
    }  

	label {
		margin-bottom: 0;
	}

	.glyphicon-move:before {
		content: none;
	}

</style>  
@endsection

@section('content')
    <div class="page-header">
        <x-breadcrumb :items="[['title' => 'ثبت محصول']]" />
    </div>

	<x-alert-danger/>

    <form id="MainForm" action="{{ route('admin.products.store') }}" method="POST">
		@csrf
		<div class="row">
			<div class="col-xl-8">
				<div class="row">
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">اطلاعات محصول</x-slot>
							<x-slot name="cardOptions"><x-card-options /></x-slot>
							<x-slot name="cardBody">
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-title">نام محصول :<span class="text-danger">&starf;</span></label></div>
									<div class="col-xl-10"><input type="text" placeholder="نام محصول" class="form-control" name="product[title]" id="product-title"></div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-quantity">موجودی :</label></div>
									<div class="col-xl-10"><input type="number" placeholder="موجودی" class="form-control" name="product[quantity]" id="product-quantity"></div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-barcode">بارکد :</label></div>
									<div class="col-xl-10"><input type="text" placeholder="بارکد" class="form-control" name="product[barcode]" id="product-barcode"></div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-SKU">SKU :</label></div>
									<div class="col-xl-10"><input type="text" placeholder="SKU" class="form-control" name="product[SKU]" id="product-SKU"></div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-weight">وزن :</label></div>
									<div class="col-xl-10"><input type="number" placeholder="وزن" class="form-control" id="product-weight"></div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-max-number-purchases">حداکثر تعداد خرید :</label></div>
									<div class="col-xl-10"><input type="number" placeholder="حداکثر تعداد خرید" class="form-control" id="product-max-number-purchases"></div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-brand-id">برند :</label></div>
									<div class="col-xl-10">
										<select name="product[brand_id]" id="product-brand-id" class="form-control">
											<option value="">انتخاب</option>
											@foreach ($brands as $brand)
												<option value="{{ $brand->id }}" {{ old('product.brand_id', '') == $brand->id ? 'selected' : '' }}>
													{{ $brand->name }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-unit-id">واحد :<span class="text-danger">&starf;</span></label></div>
									<div class="col-xl-10">
										<select name="product[unit_id]" id="product-unit-id" class="form-control" required>
											<option value="">انتخاب</option>
											@foreach ($units as $unit)
												<option value="{{ $unit->id }}" {{ old('product.unit_id', '') == $unit->id ? 'selected' : '' }}>
													{{ $unit->name }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
								{{-- <div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="product-tags">تگ ها :</label></div>
									<div class="col-xl-10">
										<select name="product[tags][]" id="product-tags" class="form-control" multiple>
											<option value="">انتخاب</option>
											@foreach ($tags as $tag)
												<option value="{{ $tag->id }}">{{ $tag->name }}</option>
											@endforeach
										</select>
									</div>
								</div> --}}
							</x-slot>
						</x-card>
					</div>
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">توضیحات</x-slot>
							<x-slot name="cardOptions"><x-card-options /></x-slot>
							<x-slot name="cardBody">@include('components.editor',['name' => 'product[description]','required' => 'true','field_name' => 'text'])</x-slot>
						</x-card>
					</div>
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">عکس ها</x-slot>
							<x-slot name="cardOptions"><x-card-options /></x-slot>
							<x-slot name="cardBody">
								<div class="row">
									<button type="button" id="add-image-btn" class="btn btn-outline-primary" onclick="$('#product-images-input').click()">افزودن عکس</button>
									<input type="file" id="product-images-input" name="product[images][]" hidden multiple accept="image/*" onchange="showProductImages(event, $('#show-product-images-section'))">
								</div>
								<div id="show-product-images-section" class="row mt-3"></div>
							</x-slot>
						</x-card>
					</div>
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">تنوع ها</x-slot>
							<x-slot name="cardOptions"><x-card-options /></x-slot>
							<x-slot name="cardBody">
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="categories-select">دسته بندی ها :<span class="text-danger">&starf;</span></label></div>
									<div class="col-xl-10">
										<select id="categories-select" class="form-control" name="product[categories][]" multiple>
											@foreach ($categories as $category)
												<option value="{{ $category->id }}"
													{{ in_array($category->id, old('categories') ?? [0]) ? 'selected' : '' }}>
													{{ $category->title }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-2"><label for="attributes-select">ویژگی ها :<span class="text-danger">&starf;</span></label></div>
									<div class="col-xl-10">
										<select id="attributes-select" class="form-control" multiple>
										</select>
									</div>
								</div>

								<div class="row align-items-center my-2" id="attributesContainer"></div>
								<div class="row" style="margin-top: 25px">
									<x-table-component id="varieties-table">
										<x-slot name="tableTh">
											<tr>
												<th>عنوان</th>
												<th>قیمت (تومان)</th>
												<th>وزن (گرم)</th>
												<th>حداکثر تعداد خرید</th>
												<th>موجودی</th>
												{{-- <th>تنوع مرجع</th> --}}
												<th>عملیات</th>
											</tr>
										</x-slot>
										<x-slot name="tableTd">
											<tr class="d-none glyphicon-move" id="example-tr" style="cursor: move;">
												<td class="title"></td>
												<td class="price"></td>
												<td class="weight"></td>
												<td class="max-number-purchases"></td>
												<td class="quantity"></td>
												{{-- <td class="main-variety"></td> --}}
												<td class="operation"></td>
											</tr>
										</x-slot>
									</x-table-component>
								</div>
							</x-slot>
						</x-card>
					</div>
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">مشخصات محصول</x-slot>
							<x-slot name="cardOptions"><x-card-options /></x-slot>
							<x-slot name="cardBody">
								<div class="row">
									<x-table-component id="specifications-table">
										<x-slot name="tableTh">
											<tr>
												<th>نام</th>
												<th>مقدار</th>
											</tr>
										</x-slot>
										<x-slot name="tableTd">
											@foreach ($specifications as $specification)  
												<tr>  
													<td>  
														<span>{{ $specification->name }}</span>  
														<input hidden value="{{ $specification->id }}" name="product[specifications][{{ $loop->iteration }}][id]">  
													</td>  
													<td >  
														@if ($specification->type === 'text')  
															<input type="text" class="form-control" name="product[specifications][{{ $loop->iteration }}][value]">  
														@else  
															@php  
																$multiple = $specification->type === 'multi_select' ? 'multiple' : '';  
															@endphp  
															<select id="spec-select-{{ $specification->id }}" name="product[specifications][{{ $loop->iteration }}][value]" class="form-control " {{ $multiple }}> 
																<option value=""></option> 
																@foreach ($specification->values as $specValue)  
																	<option value="{{ $specValue->id }}">{{ $specValue->value }}</option>  
																@endforeach  
															</select>  
														@endif  
													</td>  
												</tr>  
											@endforeach
										</x-slot>
									</x-table-component>
								</div>
							</x-slot>
						</x-card>
					</div>
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">اطلاعات سئو</x-slot>
							<x-slot name="cardOptions"><x-card-options /></x-slot>
							<x-slot name="cardBody">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label for="product-meta-title">عنوان متا :</label>
											<input type="text" id="product-meta-title" name="product[meta_title]" class="form-control" placeholder="عنوان متا">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label for="product-meta-description">توضیحات متا :</label>
											<textarea name="product[meta_description]" id="product-meta-description" class="form-control" rows="3" placeholder="توضیحات متا"></textarea>
										</div>
									</div>
								</div>
							</x-slot>
						</x-card>
					</div>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="row">
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">انتشار</x-slot>
							<x-slot name="cardOptions">
								<div class="card-options" class="d-flex" style="gap: 5px;">
									<button type="submit" class="btn btn-info" style="padding-inline: 24px; font-size: 12px;">ثبت محصول</button>
								</div>
							</x-slot>
							<x-slot name="cardBody">
								<div class="row align-items-center my-2">
									<div class="col-xl-3"><label for="product-status">وضعیت :<span class="text-danger">&starf;</span></label></div>
									<div class="col-xl-9">
										<select class="form-control" name="product[status]" id="product-status" required>
											<option value=""></option>
											@foreach(config('product.prdocutStatusLabels') as $name => $label)
												<option value="{{ $name }}">
													{{ config('product.prdocutStatusColors.' . $name) }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-3"><label for="product-published-at">زمان انتشار :</label></div>
									<div class="col-xl-9">
										<input class="form-control fc-datepicker" id="product-published-at" type="text" autocomplete="off" placeholder="انتخاب زمان انتشار" />
										<input name="product[published_at]" id="product-published-at-hide" type="hidden"/>
									</div>
								</div>
							</x-slot>
						</x-card>
					</div>
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">قیمت گذاری</x-slot>
							<x-slot name="cardOptions"><x-card-options/></x-slot>
							<x-slot name="cardBody">
								<div class="row align-items-center my-2">
									<div class="col-xl-4"><label for="product-unit-price">قیمت واحد :<span class="text-danger">&starf;</span></label></div>
									<div class="col-xl-8">
										<input type="text" class="form-control comma" placeholder="قیمت واحد" name="product[unit_price]" id="product-unit-price" required/>
									</div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-4"><label for="product-purchase-price">قیمت خرید :</label></div>
									<div class="col-xl-8">
										<input type="text" class="form-control comma" placeholder="قیمت خرید" name="product[purchase_price]" id="product-purchase-price"/>
									</div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-4"><label for="product-discount-type">نوع تخفیف :</label></div>
									<div class="col-xl-8">
										<select name="product[discount_type]" id="product-discount-type" class="form-control discount-type">
											<option value="">بدون تخفیف</option>
											<option value="flat">قیمت  ثابت</option>
											<option value="percentage">درصد</option>
										</select>
									</div>
								</div>

								<div class="row align-items-center my-2 d-none" id="product-discount-section">
									<div class="col-xl-4"><label for="product-discount-type">تخفیف :</label></div>
									<div class="col-xl-8">
										<input type="text" class="form-control comma" name="product[discount]" id="product-discount"/>
									</div>
								</div>
								<div class="row align-items-center my-2 d-none" id="product-discount-until-section">
									<div class="col-xl-4"><label for="product-discount-until">تخفیف تا زمان :</label></div>
									<div class="col-xl-8">
										<input class="form-control fc-datepicker" id="product-discount-until" type="text" autocomplete="off" placeholder="انتخاب زمان اتمام تخفیف" />
										<input name="product[discount_until]" id="product-discount-until-hide" type="hidden"/>
									</div>
								</div>
								<div class="row align-items-center my-2">
									<div class="col-xl-4"><label for="product-low-stock-quantity-warning">اخطار موجودی :<span class="text-danger">&starf;</span></label></div>
									<div class="col-xl-8">
										<input type="number" class="form-control" placeholder="اخطار موجودی" name="product[low_stock_quantity_warning]" id="product-low-stock-quantity-warning" required/>
									</div>
								</div>
							</x-slot>
						</x-card>
					</div>
					<div class="col-12">
						<x-card>
							<x-slot name="cardTitle">تنظیمات نمایش</x-slot>
							<x-slot name="cardOptions"><x-card-options/></x-slot>
							<x-slot name="cardBody">
								<div class="row">
									@php
										$displaySetting = [
											['name' => 'product[chargeable]', 'label' => 'قابل شارژ'],
											['name' => 'product[new_product_in_home]', 'label' => 'نمایش در لیست محصولات جدید'],
											['name' => 'product[is_package]', 'label' => 'محصولات پکیج'],
											['name' => 'product[is_benibox]', 'label' => 'محصولات بنی باکس'],
											['name' => 'product[is_amazing]', 'label' => 'محصولات شگفت انگیز'],
											['name' => 'product[free_shipping]', 'label' => 'ارسال رایگان'],
										];
									@endphp
									@foreach ($displaySetting as $d)
										<div class="col-12 form-group">
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" name="{{ $d['name'] }}" value="1" />
												<span class="custom-control-label">{{ $d['label'] }}</span>
											</label>
										</div>
									@endforeach
								</div>
							</x-slot>
						</x-card>
					</div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-info" style="padding-inline: 24px; font-size: 12px; margin-bottom: 32px;">ثبت محصول</button>
    </form>


    <div id="example-attribute-value-select" class="col-12 d-none my-2 attribute-value-select">  
		<div class="row">  
			<div class="col-xl-2">  
				<label for=""></label>  
			</div>  
			<div class="col-xl-10 select-box-div">  
			</div>  
		</div>  
	</div>  

    <x-modal id="edit-variety-modal-example" size="md">
        <x-slot name="title">اطلاعات تنوع</x-slot>
        <x-slot name="body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
						<label class="mb-1" for="">قیمت خرید (تومان) :</label>
                        <input type="text" class="form-control purchase-price comma" placeholder="قیمت خرید را به تومان وارد کنید" name="" />
                    </div>
                </div>
				<div class="col-12">
                    <div class="form-group">
						<label class="mb-1" for="">تخفیف :</label>
						<select name="" class="form-control discount-type" onchange="showDiscountAmountInput(event)">
							<option value="">بدون تخفیف</option>
							<option value="flat">قیمت  ثابت</option>
							<option value="percentage">درصد</option>
						</select>
						<input type="text" class="form-control mt-3 discount d-none comma" name="" placeholder="">
                    </div>
                </div>
				<div class="col-12">
                    <div class="form-group">
						<label class="mb-1" for="">بارکد :</label>
                        <input type="text" class="form-control barcode" placeholder="بارکد" name="" />
                    </div>
                </div>
				<div class="col-12">
                    <div class="form-group">
						<label class="mb-1" for="">SKU :</label>
                        <input type="text" class="form-control SKU" placeholder="SKU" name="" />
                    </div>
                </div>
            </div>
        </x-slot>
		<x-slot name="footer">
			<button type="button" class="btn btn-outline-danger" data-dismiss="modal">بستن</button>
		</x-slot>
    </x-modal>

	<x-modal id="select-variety-images-modal-example" size="lg">
        <x-slot name="title"></x-slot>
        <x-slot name="body">
            <div class="row m-5">
				<button 
					type="button" class="btn btn-primary" 
					onclick="$(this).closest('.modal').find('.variety-images-input').click()">
					افزودن عکس
				</button>
				<input 
					type="file" 
					class="variety-images-input" 
					name="" 
					hidden 
					multiple 
					accept="image/*" 
					onchange="showProductImages(event, $(this).closest('.modal').find('.show-variety-images-section'))"
				/>
            </div>
			<div class="row m-4 show-variety-images-section"></div>
        </x-slot>
    </x-modal>

@endsection

@section('scripts')

	@include('core::includes.date-input-script', [
		'dateInputId' => 'product-published-at-hide',
		'textInputId' => 'product-published-at',
	])
	
	@include('core::includes.date-input-script', [
		'dateInputId' => 'product-discount-until-hide',
		'textInputId' => 'product-discount-until',
	])

    <script>
		
		class CustomSelect {  
			constructor(selector, placeholder) {  
				this.selector = selector;  
				this.placeholder = placeholder;  

				this.initSelect2();  
			}  

			initSelect2() {  
				$(this.selector).select2({  
					placeholder: this.placeholder,  
					allowClear: true,  
					dir: 'rtl',
					language: {  
						noResults: () => {  
							return "موردی یافت نشد !";  
						}  
					}  
				});  
			}  
		}  

		new CustomSelect('#product-brand-id', 'انتخاب برند');  
		new CustomSelect('#product-unit-id', 'انتخاب واحد');  
		new CustomSelect('#product-tags', 'انتخاب تگ ها');
		new CustomSelect('#product-status', 'انتخاب وضعیت');
		new CustomSelect('#categories-select', 'انتخاب دسته بندی ها');  
		new CustomSelect('#attributes-select', 'انتخاب ویژگی ها'); 

        const varietiesTable = $('#varieties-table');
        const productDiscountTypeSelectBox = $('#product-discount-type');  
        const varietiesTableBody = varietiesTable.find('tbody');

		const categoriesSelect = $('#categories-select');
		const attributesSelect = $('#attributes-select');

        const allCategories = @json($categories);
        const allAttributes = @json($attributes);

        const option = $('<option value=""></option>');
		let index = 0;

        let exampleTableRow = $('#example-tr').clone(); 
		let exampleEditVarietyModal = $('#edit-variety-modal-example').clone(); 
		let exampleImageVarietyModal = $('#select-variety-images-modal-example').clone();
		let exampleAttributeValueSelect = $('#example-attribute-value-select');

        function loadAttributesFromCategories() {
			
            const selectedCategories = categoriesSelect.val();
            const selectedAttributeIds = new Set();

            attributesSelect.empty().append(option.clone());

            selectedCategories.forEach(categoryId => {

                const category = allCategories.find((c) => c.id === parseInt(categoryId));
                const categoryAttributes = category.attributes;
				console.log(category.attributes);

                if (categoryAttributes && categoryAttributes.length > 0) {
                    categoryAttributes.forEach(attribute => {
                        if (!selectedAttributeIds.has(attribute.id)) {
                            const newAttributeOption = option.clone().attr('value', attribute.id).text(
                                attribute.name);
                            attributesSelect.append(newAttributeOption);
                            selectedAttributeIds.add(attribute.id);
                        }
                    });
                }
            });
        }

        function makeAttributeValueSelectFromAttributes() {  

			const attributeIdsArray = attributesSelect.val();  
			$('#attributesContainer').empty();  
			
			attributeIdsArray.forEach(attributeId => {  
				const attribute = allAttributes.find((a) => a.id === parseInt(attributeId));  

				if (attribute /* && attribute.type === 'select' */) {
					let selectSection = exampleAttributeValueSelect.clone();

					selectSection
						.removeAttr('id')
						.removeClass('d-none')
						.find('label')
						.html(`<span>ویژگی : <b>${attribute.name}</b></span>`);  
						
					let select = $('<select multiple></select>')
						.attr('data-attribute-id', attribute.id)
						.attr('data-attribute-name', attribute.name)
						.addClass('form-control')
						.append(option.clone())
						.select2({
							placeholder: attribute.type === 'text' ? 'مقادیر ویژگی را وارد کنید' : 'انتخاب مقدار ویژگی',  
							tags: attribute.type === 'text' ? true : false
						});

					attribute.values.forEach(value => select.append(`<option value="${value.id}">${value.value}</option>`));
					selectSection.find('.select-box-div').html(select);
					$('#attributesContainer').append(selectSection);  
				}  
			});  

			$('#attributesContainer').find('select').select2({  
				placeholder: 'انتخاب مقدار ویژگی',  
			});  
		
		}

		function updateTable(selectedValues) {

			varietiesTableBody.empty();  

			$('.modal').each(function() {
				$(this).remove()
			});
    
			let groupedValues = {};  
			selectedValues.forEach(item => {  
				if (!groupedValues[item.attributeId]) {  
					groupedValues[item.attributeId] = [];  
				}  
				groupedValues[item.attributeId].push(item);  
			});  

			let valuesArray = Object.values(groupedValues).map(group =>  
				group.map(v => ({  
					valueId: v.valueId,  
					valueName: v.valueName,  
					attributeId: v.attributeId 
				}))  
			);  

			let combinations = generateCombinations(valuesArray);  
			
			if (combinations.length > 0) {
				combinations.forEach(combination => {  

					let newRow = exampleTableRow.clone().removeClass('d-none').removeAttr('id');  
					let title = combination.map(v => v.valueName).join(' - ');  
					let attributeInputs = '';  
					
					index++;

					combination.forEach(v => {  
						attributeInputs += `  
							<input type="hidden" name="product[varieties][${index}][attributes][${v.attributeId}][id]" value="${v.attributeId}">  
							<input type="hidden" name="product[varieties][${index}][attributes][${v.attributeId}][value]" value="${v.valueId}">  
						`;  
					});  

					let editId = 'edit-variety-modal-' + index; 
					let imageId = 'select-variety-images-modal-' + index;  
					let imageBtn = makeVarietyOperationButtons('image', imageId);  
					let editBtn = makeVarietyOperationButtons('edit', editId);  
					let imageModal = makeVarietyImageModal(imageId, index);  
					let editModal = makeVarietyEditModal(editId, index);  

					newRow.find('.title').text(title).append(attributeInputs);  
					newRow.find('.price').html(`<input type="text" name="product[varieties][${index}][price]" class="form-control comma"/>`);
					newRow.find('.weight').html(`<input type="number" name="product[varieties][${index}][weight]" class="form-control"/>`);  
					newRow.find('.max-number-purchases').html(`<input type="number" name="product[varieties][${index}][max_number_purchases]" class="form-control"/>`);  
					newRow.find('.quantity').html(`<input type="number" name="product[varieties][${index}][quantity]" class="form-control"/>`);  
					newRow.find('.operation').append(imageBtn).append(editBtn);  
					
					$('#MainForm').append(imageModal).append(editModal);  
					varietiesTableBody.append(newRow); 

					Sortable.create(document.querySelector('#varieties-table tbody'), {  
						handle: '.glyphicon-move',  
						animation: 150,  
					});  

				});  
				comma($('#varieties-table'));
			} else {  
				varietiesTableBody.append('<tr><td colspan="6" class="text-center">هیچ تنوعی پیدا نشد.</td></tr>');  
			}  
		}

		function generateCombinations(values) {

			if (values.length === 0) return [];
			if (values.length === 1) return values[0].map(v => [v]);

			let result = [];
			let rest = generateCombinations(values.slice(1));
			values[0].forEach(v => {
				rest.forEach(r => {
					result.push([v, ...r]);
				});
			});

			return result;
		}

        function updateAttributeValueSelects() {
            $('#attributesContainer').empty();
            makeAttributeValueSelectFromAttributes();
        }

        function makeVarietyOperationButtons(type, target) {

            const button = $('<button></button>');
            const icon = $('<i></i>');

            icon.addClass('fa');
            button.addClass(['btn', 'btn-sm', 'btn-icon']);
            button.attr('type', 'button');
            button.attr('data-toggle', 'modal');
   			button.attr('data-target', '#' + target);  

            if (type === 'image') {
                icon.addClass('fa-image');
                button.addClass(['btn-success', 'ml-1']);
            }
            else {
                icon.addClass('fa-pencil');
                button.addClass(['btn-warning', 'mr-1']);
            }

            button.append(icon);

            return button;
        }

        function makeVarietyEditModal(modalId, counter) {

			const modal = exampleEditVarietyModal.clone();
			
			modal.attr('id', modalId);
			modal.find('input.purchase-price').attr('name', `product[varieties][${counter}][purchase_price]`);
			modal.find('select.discount-type').attr('name', `product[varieties][${counter}][discount_type]`);
			modal.find('input.discount').attr('name', `product[varieties][${counter}][discount]`);
			modal.find('input.barcode').attr('name', `product[varieties][${counter}][barcode]`);
			modal.find('input.SKU').attr('name', `product[varieties][${counter}][SKU]`);

			comma(modal);

			return modal;
        }

		function makeVarietyImageModal(modalId, counter) {

			let modal = exampleImageVarietyModal.clone();

			modal.attr('id', modalId);
			modal.find('.variety-images-input').attr('name', `product[varieties][${counter}][images][]`);

			return modal;
		}

		function showDiscountAmountInput(e) {

			const discountTypeSelect = $(e.target);
			const discountAmountInput = discountTypeSelect.closest('.modal').find('.discount');

			if (discountAmountInput.hasClass('d-none')) {
				discountAmountInput.removeClass('d-none');
			}

			if (discountTypeSelect.val() === 'flat') {
				discountAmountInput.attr('placeholder', 'مقدار تخفیف را به تومان وارد کنید');
			}else if(discountTypeSelect.val() === 'percentage') {
				discountAmountInput.attr('placeholder', 'درصد تخفیف باید بین 1 تا 100 باشد');
			}else {
				if (!discountAmountInput.hasClass('d-none')) {
					discountAmountInput.addClass('d-none');
				}
			}

		}

		function showProductDiscountSection(e) {
			 
			const discountTypeSelect = $(e.target);  
			const discountSection = $('#product-discount-section');  
			const discountUntilSection = $('#product-discount-until-section');  

			const selectedValue = discountTypeSelect.val();  

			if (selectedValue === 'flat' || selectedValue === 'percentage') {  
				discountSection.removeClass('d-none');  
				discountUntilSection.removeClass('d-none');  
			} else {  
				if (!discountSection.hasClass('d-none')) {  
					discountSection.addClass('d-none');  
					discountSection.find('#product-discount').val(null); 
				}  
				if (!discountUntilSection.hasClass('d-none')) {  
					discountUntilSection.addClass('d-none');  
					discountUntilSection.find('#product-discount-until').val(null); 
				}  
			}  
		}  

		function showProductImages(event, sectionToShowImages) {

            sectionToShowImages.empty();  
            $.each(event.target.files, function(index, file) {  
                const reader = new FileReader();  

                reader.onload = function(e) {  

                    const imgContainer = $('<div>', {  
                        class: 'position-relative col-2 my-2'  
                    });  

                    const img = $('<img>', {  
                        src: e.target.result,  
                        class: 'img-thumbnail image-size',  
                        style: 'width: 100%; height: auto;'  
                    });  

                    const removeBtn = $('<span>', {  
                        class: 'remove-btn',  
                        html: '&times;', 
                        css: {  
                            position: 'absolute',  
                            top: '5px',  
                            right: '5px',  
                            color: 'red',  
                            fontSize: '20px',  
                            cursor: 'pointer',  
                            display: 'none', 
                        }  
                    });   

                    imgContainer.on('mouseenter', () => {  
                        removeBtn.fadeIn(100); 
                    }).on('mouseleave', function() {  
                        removeBtn.fadeOut(100); 
                    });  

                    removeBtn.on('click', () => {  
                        imgContainer.remove();
                    });  

                    imgContainer.append(img).append(removeBtn);  
                    sectionToShowImages.append(imgContainer);  

                };  

                reader.readAsDataURL(file);  
            });  
		}

		function addPlaceholderToSpecificationsSelectBox() {  
			$('#specifications-table').find('tbody tr').each(function(index) {  
				let selectBox = $(this).find('select');  
				if (selectBox.length > 0) {  
					let selectBoxId = selectBox.attr('id');  
					new CustomSelect('#' + selectBoxId, 'انتخاب مقدار'); 
				}  
			});  
		}  

		function comma(el) {  
			el.on("keyup", "input.comma", function (event) {  
				if (event.which >= 37 && event.which <= 40) return;  
				$(this).val(function (index, value) {  
					return value  
						.replace(/\D/g, "")  
						.replace(/\B(?=(\d{3})+(?!\d))/g, ",");  
				});  
			});  
		}  

		addPlaceholderToSpecificationsSelectBox();

		$(document).ready(() => {

			varietiesTableBody.empty();

			productDiscountTypeSelectBox.on('change', (event) => {  
				showProductDiscountSection(event);  
			}); 

			categoriesSelect.on('change', () => {
				loadAttributesFromCategories();
				updateAttributeValueSelects();
			});

			attributesSelect.on('change', () => {
				updateAttributeValueSelects();
			});

			$(document).on('change', '#attributesContainer select', function() {

				let selectedValues = [];

				$('#attributesContainer select').each(function() {

					let attributeId = $(this).attr('data-attribute-id');
					let attributeName = $(this).attr('data-attribute-name');

					$(this).val().forEach(valueId => {
						selectedValues.push({
							attributeId: attributeId,
							attributeName: attributeName,
							valueId: valueId,
							valueName: $(this).find('option[value="'+valueId+'"]').text()
						});
					});

				});

				updateTable(selectedValues);
			});

		});

    </script>

@endsection
