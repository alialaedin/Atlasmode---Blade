<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div class="dropdown user-pro-body text-center">
      <div class="user-info">
        <span class="text-light fs-18">اطلس مد</span>
      </div>
    </div>
  </div>
  <div class="app-sidebar3 mt-0">
    <ul class="side-menu">

      <li class="slide">
        <a class="side-menu__item" href="{{route("admin.dashboard")}}">
          <i class="fe fe-home sidemenu_icon"></i>
          <span class="side-menu__label">داشبورد</span>
        </a>
      </li>

      @canany(['read_area', 'read_color', 'read_unit', 'read_size_chart', 'read_brand'])
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#">
            <i class="feather sidemenu_icon feather-clipboard"></i>
            <span class="side-menu__label">اطلاعات پایه</span>
            <i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            {{-- @can('read_area')
              <li><a href="{{ route('admin.provinces.index') }}" class="slide-item">استان</a></li>
              <li><a href="{{ route('admin.cities.index') }}" class="slide-item">شهر</a></li>
            @endcan --}}
            {{-- @can(abilities: 'read_color')
              <li><a href="{{ route('admin.colors.index') }}" class="slide-item">رنگ ها</a></li>
            @endcan --}}
            @can('read_unit')
              <li><a href="{{ route('admin.units.index') }}" class="slide-item"><span>واحد</span></a></li>
            @endcan
            {{-- @can('read_size_chart')
            <li><a href="#" class="slide-item"><span>سایز چارت</span></a></li>
            @endcan --}}
            @can('read_brand')
            <li><a href="{{ route('admin.brands.index') }}" class="slide-item"><span>برند ها</span></a></li>
            @endcan
          </ul>
        </li>
      @endcanany

      @canany(['read_product', 'read_category', 'read_attribute', 'read_specification', 'read_coupon', 'read_specificDiscount', 'recommendation', 'read_gift_package'])
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#">
            <i class="fe fe-shopping-bag sidemenu_icon"></i>
            <span class="side-menu__label">محصولات</span><i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            @can('read_product')
              <li><a href="{{ route('admin.products.index') }}" class="slide-item">محصولات</a></li>
            @endcan
            @can('read_category')
              <li><a href="{{ route('admin.categories.index')}}" class="slide-item">دسته بندی</a></li>
            @endcan
            @can('read_attribute')
              <li><a href="{{ route('admin.attributes.index') }}" class="slide-item">ویژگی ها</a></li>
            @endcan
            @can('read_specification')
              <li><a href="{{ route('admin.specifications.index') }}" class="slide-item">مشخصات</a></li>
            @endcan
            {{-- @can('read_coupon')
              <li><a href="{{ route('admin.coupons.index') }}" class="slide-item">کد تخفیف</a></li>
            @endcan --}}
            {{-- @can('read_specificDiscount')
              <li><a href="{{ route('admin.specific-discounts.index') }}" class="slide-item">تخفیفات ویژه</a></li>
            @endcan --}}
            {{-- @can('recommendation')
              <li><a href="{{ route('admin.recommendations.groups') }}" class="slide-item">محصولات پیشنهادی</a></li>
            @endcan --}}
            {{-- @can('read_gift_package')
              <li><a href="{{ route('admin.gift-packages.index') }}" class="slide-item">بسته بندی هدیه</a></li>
            @endcan --}}
          </ul>
        </li>
      @endcanany

      {{-- @canany(['read_post', 'read_post', 'read_slider', 'read_menu', 'read_position', 'read_page', 'read_faq'])
        <li class="slide">
          <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
            <i class="fe fe-layers sidemenu_icon"></i>
            <span class="side-menu__label">محتوا</span>
            <i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            @can('read_post')
              <li><a href="{{ route('admin.posts.index') }}" class="slide-item">مطالب</a></li>
            @endcan
            @can('read_post-category')
              <li><a href="{{ route('admin.post-categories.index') }}" class="slide-item">دسته بندی مطالب</a></li>
            @endcan
            @can('read_slider')
              <li><a href="{{ route('admin.sliders.groups') }}" class="slide-item">اسلایدر</a></li>
            @endcan
            @can('read_menu')
              <li><a href="{{ route('admin.menu.groups')}}" class="slide-item">منو</a></li>
            @endcan
            @can('read_advertise')
              <li><a href="{{ route('admin.positions.index') }}" class="slide-item">بنر</a></li>
            @endcan
            @can('read_page')
              <li><a href="{{ route('admin.pages.index') }}" class="slide-item">صفحات</a></li>
            @endcan
            @can('read_faq')
              <li><a href="{{ route('admin.faqs.index') }}" class="slide-item">سوالات متداول</a></li>
            @endcan
          </ul>
        </li>
      @endcanany

      @canany(['read_comment', 'read_productComment', 'read_contact'])
        <li class="slide">
          <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
            <i class="fe fe-message-square sidemenu_icon"></i>
            <span class="side-menu__label">نظرات</span>
            <i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            @can('read_comment')
              <li><a href="{{ route('admin.post-comments.all') }}" class="slide-item">نظرات مطالب</a></li>
            @endcan
            @can('read_productComment')
              <li><a href="{{ route('admin.product-comments.index') }}" class="slide-item">نظرات محصول</a></li>
            @endcan
            @can('read_contact')
              <li><a href="{{ route('admin.contacts.index') }}" class="slide-item">تماس با ما</a></li>
            @endcan
          </ul>
        </li>
      @endcanany

      @can('read_customer')
        <li class="slide">
          <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
            <i class="fe fe-users sidemenu_icon"></i>
            <span class="side-menu__label">کاربران</span>
            <i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            @role('super_admin')
              <li class="sub-slide">
                <a class="sub-side-menu__item" data-toggle="sub-slide" style="cursor: pointer">
                  <span class="sub-side-menu__label">مدیران</span>
                  <i class="sub-angle fa fa-angle-left"></i>
                </a>
                <ul class="sub-slide-menu">
                  <li><a href="{{ route('admin.roles.index') }}" class="slide-item">مدیریت نقش ها</a></li>
                  <li><a href="{{ route('admin.admins.index') }}" class="slide-item">مدیریت ادمین ها</a></li>
                </ul>
              </li>
            @endrole
            <li><a href="{{ route('admin.customers.index') }}" class="slide-item">مشتریان</a></li>
            <li><a href="{{ route('admin.customer-roles.index') }}" class="slide-item">نقش مشتریان</a></li>
          </ul>
        </li>
      @endcan

      @canany(['read_transaction', 'read_withdraw'])
        <li class="slide">
          <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
            <i class="fa fa-google-wallet sidemenu_icon"></i>
            <span class="side-menu__label">کیف پول</span>
            <i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            @can('read_transaction')
              <li><a href="{{ route('admin.transactions.index') }}" class="slide-item">تراکنش های کیف پول</a></li>
            @endcan
            @can('read_withdraw')
              <li><a href="{{ route('admin.withdraws.index') }}" class="slide-item">برداشت های کیف پول</a></li>
            @endcan
          </ul>
        </li>
      @endcanany

      @can('read_shipping')
        <li class="slide">
          <a class="side-menu__item" href="{{route("admin.shippings.index")}}">
            <i class="fe fe-truck sidemenu_icon"></i>
            <span class="side-menu__label">حمل و نقل</span>
          </a>
        </li>
      @endcan

      @can('read_store')
        <li class="slide">
          <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
            <i class="fe fe-database sidemenu_icon"></i>
            <span class="side-menu__label">انبار</span>
            <i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            <li><a href="{{ route('admin.stores.index') }}" class="slide-item">محصولات</a></li>
            <li><a href="{{ route('admin.stores.transactions') }}" class="slide-item">تراکنش ها</a></li>
          </ul>
        </li>
      @endcan

      @can('read_shipping')
        <li class="slide">
          <a class="side-menu__item" href="{{route("admin.shipping-excels.index")}}">
            <i class="fe fe-aperture sidemenu_icon"></i>
            <span class="side-menu__label">اکسل پست</span>
          </a>
        </li>
      @endcan

      @can('read_order')
        <li class="slide">
          <a class="side-menu__item" href="{{route("admin.orders.index")}}">
            <i class="fe fe-package sidemenu_icon"></i>
            <span class="side-menu__label">سفارشات</span>
          </a>
        </li>
      @endcan

      @can('read_newsletters')
        <li class="slide">
          <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
            <i class="fe fe-file-text sidemenu_icon"></i>
            <span class="side-menu__label">خبرنامه</span>
            <i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            <li><a href="{{ route('admin.newsletters.index')}}" class="slide-item">خبرنامه</a></li>
            <li><a href="{{ route('admin.newsletters.users.index') }}" class="slide-item">اعضا خبرنامه</a></li>
          </ul>
        </li>
      @endcan

      @can('read_setting')
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#">
            <i class="fe fe-sliders sidemenu_icon"></i>
            <span class="side-menu__label">تنظیمات</span><i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            @foreach ($settingGroups as $group)
              <li><a href="{{ route('admin.settings.show', ['group_name' => $group->name]) }}" class="slide-item">{{ $group->label }}</a></li>
            @endforeach
          </ul>
        </li> 
      @endcan --}}

      {{-- <li class="slide">
        <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
          <i class="fe fe-layers sidemenu_icon"></i>
          <span class="side-menu__label">محتوا</span>
          <i class="angle fa fa-angle-left"></i>
        </a>
        <ul class="slide-menu">
          <li class="sub-slide">
            <a class="sub-side-menu__item" data-toggle="sub-slide" style="cursor: pointer">
              <span class="sub-side-menu__label">مطلب</span>
              <i class="sub-angle fa fa-angle-left"></i>
            </a>
            <ul class="sub-slide-menu">
              <li><a href="{{ route('admin.posts.index') }}" class="slide-item">مطالب</a></li>
              <li><a href="{{ route('admin.post-categories.index') }}" class="slide-item">دسته بندی</a></li>
            </ul>
          </li>
          <li class="sub-slide">
            <a class="sub-side-menu__item" data-toggle="sub-slide" style="cursor: pointer">
              <span class="sub-side-menu__label">خبرنامه</span>
              <i class="sub-angle fa fa-angle-left"></i>
            </a>
            <ul class="sub-slide-menu">
              <li><a href="{{route('admin.newsletters.index')}}" class="slide-item">خبرنامه</a></li>
              <li><a href="{{ route('admin.newsletters.users.index') }}" class="slide-item">اعضا خبرنامه</a></li>
            </ul>
          </li>
          <li><a href="{{ route('admin.sliders.groups') }}" class="slide-item">اسلایدر</a></li>
          <li><a href="{{ route('admin.campaigns.index') }}" class="slide-item">کمپین پرسشی</a></li>
          <li><a href="{{ route('admin.menu.groups')}}" class="slide-item">منو</a></li>
          <li><a href="{{ route('admin.positions.index') }}" class="slide-item">بنر</a></li>
          @can('read_page')
          <li><a href="{{ route('admin.pages.index') }}" class="slide-item">صفحات</a></li>
          @endcan
          @can('read_faq')
          <li><a href="{{ route('admin.faqs.index') }}" class="slide-item">سوالات متداول</a></li>
          @endcan
          <li><a href="{{ route('admin.notifications_public.index') }}" class="slide-item">پیام ها</a></li>
          <li><a href="{{ route('admin.valid-customers.index') }}" class="slide-item">مشتریان معتبر</a></li>
        </ul>
      </li>
      <li class="slide">
        <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
          <i class="feather sidemenu_icon fa fa-users"></i>
          <span class="side-menu__label">باشگاه مشتریان</span>
          <i class="angle fa fa-angle-left"></i>
        </a>
        <ul class="slide-menu">
            <li><a href="{{ route('admin.customersClub.getBeforeAfterImages') }}" class="slide-item">تصاویر قبل و بعد</a></li>
            <li><a href="{{ route('admin.customersClub.getBonConvertRequestAdminList') }}" class="slide-item">درخواست تبدیل بن</a></li>
            <li><a href="{{ route('admin.customersClub.pageMinStoryHours') }}" class="slide-item">مدیریت استوری اینستاگرام </a></li>
            <li><a href="{{ route('admin.customersClub.pageEnamadScore') }}" class="slide-item">مدیریت نظرسنجی اینماد</a></li>
            <li class="sub-slide">
                <a class="sub-side-menu__item" data-toggle="sub-slide" style="cursor: pointer">
                    <span class="sub-side-menu__label">گزارشات</span>
                    <i class="sub-angle fa fa-angle-left"></i>
                </a>
                <ul class="sub-slide-menu">
                    <li><a href="{{ route('admin.customersClub.getClubScoreList') }}" class="slide-item">امتیازات کسب شده</a></li>
                    <li><a href="{{ route('admin.customersClub.getLevelUsers') }}" class="slide-item">سطح و امتیاز</a></li>
                </ul>
            </li>
            <li class="sub-slide">
                <a class="sub-side-menu__item" data-toggle="sub-slide" style="cursor: pointer">
                    <span class="sub-side-menu__label">تنظیمات</span>
                    <i class="sub-angle fa fa-angle-left"></i>
                </a>
                <ul class="sub-slide-menu">
                    <li><a href="{{ route('admin.customersClub.getClubScores') }}" class="slide-item">مدیریت امتیازات</a></li>
                    <li><a href="{{ route('admin.customersClub.getUserLevels') }}" class="slide-item">مدیریت سطح مشتریان</a></li>
                    <li><a href="{{ route('admin.customersClub.getPurchaseScores') }}" class="slide-item">مدیریت امتیازات خرید</a></li>
                    <li><a href="{{ route('admin.customersClub.getBonValues') }}" class="slide-item">مدیریت ارزش بن</a></li>
                    <li><a href="{{ route('admin.customersClub.getBirthdateSettings') }}" class="slide-item">مدیریت تخفیف تولد</a></li>
                </ul>
        </li>
        </ul>
      </li>
      <li class="slide">
        <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
          <i class="fa fa-google-wallet sidemenu_icon"></i>
          <span class="side-menu__label">کیف پول</span>
          <i class="angle fa fa-angle-left"></i>
        </a>
        <ul class="slide-menu">
          <li><a href="{{ route('admin.transactions.index') }}" class="slide-item">تراکنش های کیف پول</a></li>
          <li><a href="{{ route('admin.withdraws.index') }}" class="slide-item">برداشت های کیف پول</a></li>
        </ul>
      </li>
      <li class="slide">
        <a class="side-menu__item" href="{{route("admin.shippings.index")}}">
          <i class="fe fe-truck sidemenu_icon"></i>
          <span class="side-menu__label">حمل و نقل</span>
        </a>
      </li>
      <li class="slide">
        <a class="side-menu__item" style="cursor: pointer" data-toggle="slide">
          <i class="fe fe-database sidemenu_icon"></i>
          <span class="side-menu__label">انبار</span>
          <i class="angle fa fa-angle-left"></i>
        </a>
        <ul class="slide-menu">
          @if (\Modules\Core\Classes\CoreSettings::featureChecker('multiStores', false))
            <li><a href="{{ route('admin.store-manager.index') }}" class="slide-item">مدیریت انواع فروش</a></li>
            <li><a href="{{ route('admin.stores.index') }}" class="slide-item">مدیریت انبار ها</a></li>
            <li><a href="{{ route('admin.storeTransfers.index') }}" class="slide-item">انبار گردانی</a></li>
          @else
            <li><a href="{{ route('admin.stores.transactions', ['store_id' => $storeId]) }}" class="slide-item">تراکنش ها</a></li>
            <li><a href="{{ route('admin.stores.show', ['store_id' => $storeId]) }}" class="slide-item">محصولات</a></li>
          @endif
        </ul>
      </li>
      @can('read_order')
        <li class="slide">
          <a class="side-menu__item" href="{{route("admin.orders.index")}}">
            <i class="fe fe-package sidemenu_icon"></i>
            <span class="side-menu__label">سفارشات</span>
          </a>
        </li>
      @endcan
      @if(\Modules\Core\Classes\CoreSettings::featureChecker('realOrder', false))
          @can('read_order')
          <li class="slide">
            <a class="side-menu__item" href="{{route("admin.realOrders.index")}}">
              <i class="fe fe-slack sidemenu_icon"></i>
              <span class="side-menu__label">فروشگاه حضوری</span>
            </a>
          </li>
          @endcan
      @endif
      @role('super_admin')
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#">
            <i class="fe fe-bar-chart-2 sidemenu_icon"></i>
            <span class="side-menu__label">گزارشات</span><i class="angle fa fa-angle-left"></i>
          </a>
          <ul class="slide-menu">
            <li><a href="{{ route('admin.reports.siteviews') }}" class="slide-item">بازدید ها</a></li>
            <li><a href="{{ route('admin.reports.customers') }}" class="slide-item">مشتریان</a></li>
            <li><a href="{{ route('admin.reports.products') }}" class="slide-item">محصولات</a></li>
            <li><a href="{{ route('admin.reports.varieties-balance') }}" class="slide-item">موجودی تنوع ها</a></li>
            <li><a href="{{ route('admin.reports.wallets') }}" class="slide-item">کیف پول</a></li>
            <li><a href="{{ route('admin.reports.orders')}}" class="slide-item">گزارش ریالی سفارشات</a></li>
            <li><a href="{{ route('admin.reports.varieties') }}" class="slide-item">گزارش تعدادی حسابداری</a></li>
            <li><a href="{{ route('admin.reports.payments') }}" class="slide-item">گزارش پرداخت ها</a></li>
          </ul>
        </li>
      @endrole
      <li class="slide">
        <a class="side-menu__item" href="{{route("admin.shipping-excels.index")}}">
          <i class="fe fe-aperture sidemenu_icon"></i>
          <span class="side-menu__label">اکسل پست</span>
        </a>
      </li>
      <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#">
          <i class="fe fe-sliders sidemenu_icon"></i>
          <span class="side-menu__label">تنظیمات</span><i class="angle fa fa-angle-left"></i>
        </a>
        <ul class="slide-menu">
          <li><a href="{{ route('admin.gateways.index') }}" class="slide-item">مدیریت درگاه ها</a></li>
          @foreach ($settingGroups as $group)
            <li><a href="{{ route('admin.settings.show', ['group_name' => $group->name]) }}" class="slide-item">{{ $group->label }}</a></li>
          @endforeach
        </ul>
      </li> --}}
    </ul>
  </div>
</aside>
