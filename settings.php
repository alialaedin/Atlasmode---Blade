<?php

return [
    'auth' => [
        'master_password' => 'atlasshopit9090',
        'password' => [
            'required' => false
        ]
    ],
    'club' => [
        'active' => true
    ],
    'sitemap_address' => '/home/atlasmode/domains/atlasmode.ir/public_html/sitemap.xml',
    'slider' => [
        'status' => true,
        'image' => true,
    ],
    'size_chart' => [
        'type' => true
    ],
    'home' => [
        //HomeService
        'front' => [
            //  'user' => ['enabled' => true], // joda
            //   'post' => ['enabled' => true, 'take' => 6],
            'sliders' => ['enabled' => true],
            'flashes' => ['enabled' => false], // off
            //   'settings' => ['enabled' => true], // joda
            'advertise' => ['enabled' => true],
            'mostSales' => ['enabled' => true, 'take' => 12],
            //   'categories' => ['enabled' => true], // joda
            'suggestions' => ['enabled' => true, 'take' => 12],
            //   'size_values' => ['enabled' => true], // joda
            'new_products' => ['enabled' => true, 'take' => 12],
            'mostDiscount' => ['enabled' => true, 'take' => 12],
            //   'cart_request' => ['enabled' => true], // joda
            'special_categories' => ['enabled' => true, 'take' => 10],
            //   'colors' => ['enabled' => true], // joda
            'vip_unpublished_products' => ['enabled' => true],
            'discount_products' => ['enabled' => true],
            'show_in_home_categories' => ['enabled' => true]
        ],
        'front_light' => [
//            'user' => ['enabled' => true], // joda
//            'post' => ['enabled' => true, 'take' => 6],
//            'sliders' => ['enabled' => true],
//            'flashes' => ['enabled' => false], // off
//            'settings' => ['enabled' => true], // joda
//            'advertise' => ['enabled' => true],
//            'mostSales' => ['enabled' => true, 'take' => 12],
//            'categories' => ['enabled' => true], // joda
//            'suggestions' => ['enabled' => true, 'take' => 12],
//            'size_values' => ['enabled' => true], // joda
//            'new_products' => ['enabled' => true, 'take' => 12],
//            'mostDiscount' => ['enabled' => true, 'take' => 12],
//            'cart_request' => ['enabled' => true], // joda
//            'special_categories' => ['enabled' => true, 'take' => 10],
//            'colors' => ['enabled' => true], // joda
//            'vip_unpublished_products' => ['enabled' => true],
//            'discount_products' => ['enabled' => true]
        ],
    ],
    'order' => [
        'admin' => [
            'pagination' => 50
        ],
        'postal_code_required' => false
    ],
    'product' => [
        'admin' => [
            'pagination' => 50
        ],
        'pagination' => 22,
        'recommendation' => [
            'status' => true,
            'groups' => [
                'new_products',
                'most_sales',
                'suggestions',
                'discount'
            ]
        ],
        'with' => [ #with relation

        ],
    ],
    'search' => [
        'products' => [
            'number_pattern' => 'کد {number}'
        ]
    ],
    'customer' => [
        'has_role' => true
    ],
    'vip' => [
        "enabled" => true
    ],
    'invoice' => [
        'active_drivers' => [
//            'virtual' => [],

            ///////// start gateway
//             'zarinpal' => [
//                 'config' => [
//                     'mode' => 'normal',
//                     'merchantId' => '9a913a8e-75d6-4adc-9788-ef31ea1fa4f9'
//                 ],
//                 'order' => 2
//             ],
            'behpardakht' => [
                'config' => [
                    'terminalId' => '6848406',
                    'username' => 'atlas404',
                    'password' => '91538432',
                ],
                'order' => 0
            ],
           'irankish' => [
               'config' => [
                   'terminalId' => '08142347',
                   'acceptorId' => '992180008142347',
                   'password' => 'D23E66B4C9BDC450',
                   'pubKey' => '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC5agLixMVlAk+bs2EyJbhvMVW6
9XzVC+y5revrLvY7i26T0qRd/Bj4O/7yyNm7yAVDEc/oVSLSyhaBgsxGyqal/8Jb
dhWrOYRAtydQ6jc9NgWAePCPHpoXbw3y1Bd0hax7/KwU+boP00uVJvKHkEbEVc+P
di5whxRQygjxHSnulQIDAQAB
-----END PUBLIC KEY-----'
               ],
               'order' => 1
           ],
//
//            'saman' => [
//                'config' => [
//                    'merchantId' => '12931409',// shomare parizande bedune 0
//
//                ],
//                'order' => 2
//            ],
//            'pasargad' => [
//                'config' => [
//                    'merchantId' => '5144966',
//                    'terminalCode' => '2407978',
//                    'certificate' => '<RSAKeyValue><Modulus>xqzDJe/bqzbPS1sd0/2Q9hiQts99gabfSgfIPAvFrGIz9yR+PpoPU+g6tDjEprqV9JEHQsPrsABrFuH3WTW5DTN4cN9dXpcpAzBNzjaemYgcr+LK2RBni9ZhJ4kepupGtlE5kxnnsEnXno5AS+vHYtysRMVwiDzxsO5Um8e/qV0=</Modulus><Exponent>AQAB</Exponent><P>0gN6tdqBuL6oEzcIeZViCuRcc/IqQjHiJbotL09xIMMNl+JVz7CTQTBDZIxXCObZUzscFn+7pLXU9T4lwq+7yw==</P><Q>8i2tv4IztOt5aVRionIAo1tRud0VJnQfRIM4+xpAg2w8Rmn427J3TLLyR6nLofAaK4r10+rA4Uc7R01eMt5adw==</Q><DP>xF5qe+X/S55CDA12SDFMxkB2zhdOOizodzxZCZavgeHAMRd6A0PovJiDO14Z94HbDX8EqWjwLHe000c0CZFF9w==</DP><DQ>dC0jj55XTbA0kynPE1ybH8J8Byyeq87C/SvyFst2LVWr6J+HqWUIw/uILIaw0CONelv0J9AS7T8tmbvst3xhaw==</DQ><InverseQ>vh63+1QJ3z4u3jQaJa1QxyuE+mYftZu5sGnJZ806QI7FmUUrZXvEQiGTkvkbWRpN/gwWibaHNowhRiFSc2L2oA==</InverseQ><D>e2fsf7ARfrQ45tHeIUOru3Fe0m7nwpTotY9H7SRS0NTe+nCMik4fnzrs2+03GWlko9lB7VLNHzHjUv9hKOSZ4GRqnqxZZLoFuiRyZiSqMMP654iHj9YH/fdV7lLpjEDRY+evQYZ0lo29LzjYnu9baZGl34j0pGosYXSNOGKzsHE=</D></RSAKeyValue>', // can be string (and set certificateType to xml_string) or an xml file path (and set cetificateType to xml_file)
//                    'certificateType' => 'xml_string', // can be: xml_file, xml_string
//                ],
//                'order' => 1
//            ],
//
//            'sadad' => [
//                'config' => [
//                    'key' => '2IQYp05YGfmsz5MeHrpI5AIluuYG3Gy/',
//                    'merchantId' => '140337754',// shomare parizande bedune 0
//                    'terminalId' => '24097291', // 24097
//                    'PaymentIdentity' => '',
//                    'mode' => 'normal',
//
//                ],
//                'order' =>'2',
//            ],

            ///////// start gateway
        ]
    ],
    'sms' => [
        'driver' => 'kavenegar',
        'sender' => '1000596446',
        'api_key' => '6B377A4D4E527932646C4B6C65425044505346622F636F635848706F653665497663336B35776F617661553D',
        'patterns' => [
            'verification_code' => 'shopit-verification',
            'new_order' => 'shopit-neworder',
            'change_status' => 'shopit-changestatus',
            'deposit_wallet' => 'deposit-wallet',
            'success-order'  => 'success-order',
            'success_mini_order' => 'success-mini-order',
            'product-available' =>'product-available',
        ],
        'digits' => 4,
        'new_order' => [
            'keys' => [1]
        ]
    ],
    'linkables' => [
        [
            'model' => \Modules\Blog\Entities\Post::class,
            'label' => 'پست',
            'index' => true,
            'show' => true,
            'api' => '/admin/posts?all=true&searchBy1=title&search1=',
            'key' => 'posts',
        ],
        [
            'model' => \Modules\Category\Entities\Category::class,
            'label' => 'دسته بندی محصول',
            'index' => false,
            'show' => true,
            'title' => 'title',
            'api' => '/admin/categories?all=true&searchBy2=title&search2=',
            'key' => 'categories',
        ],
        [
            'model' => \Modules\Product\Entities\Product::class,
            'label' => 'محصول',
            'index' => true,
            'show' => true,
            'title' => 'title',
            'api' => '/admin/products?all=true&searchBy2=title&search2=',
            'key' => 'products',
        ],
        [
            'model' => \Modules\Flash\Entities\Flash::class,
            'label' => 'فلش',
            'index' => false,
            'show' => true,
            'title' => 'title',
            'api' => '/admin/flashes?all=true&searchBy2=title&search2=',
            'key' => 'flashes',
        ],
        [
            'model' => \Modules\Page\Entities\Page::class,
            'label' => 'صفحه',
            'index' => false,
            'show' => true,
            'title' => 'title',
            'api' => '/admin/pages?all=true&searchBy2=title&search2=',
            'key' => 'pages',
        ],
        [
            'model' => 'Custom\\AboutUs',
            'label' => 'درباره ما',
            'index' => true,
            'show' => false
        ],
        [
            'model' => 'Custom\\ContactUs',
            'label' => 'تماس با ما',
            'index' => true,
            'show' => false
        ]
    ]
];
