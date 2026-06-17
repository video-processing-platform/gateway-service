<?php

return [

    'exception' => [
        'validation' => 'خطای اعتبارسنجی رخ داده است.',
        'token_mismatch' => 'توکن اعتبارسنجی نامعتبر است.',
        'query' => 'در کوئری ارسال‌شده خطایی رخ داده است.',
        'swift_transport' => 'در هنگام ارسال اطلاعات خطایی رخ داده است.',
        'view' => 'در صفحه نمایش خطایی رخ داده است.',
        'internal_server' => 'خطایی در برنامه شما رخ داده است.',
        'bad_request' => 'درخواست نامعتبر است.',
        'model_not_found' => 'موجودیت موردنظر یافت نشد.',
        'record_not_found' => 'رکورد موردنظر یافت نشد.',
        'oauth_server' => 'در هنگام اعتبارسنجی درخواست شما خطایی رخ داده است.',
        'authorization' => 'خطای دسترسی برای درخواست شما رخ داده است.',
        'authentication' => 'خطای احراز هویت برای درخواست شما رخ داده است.',
        'method_not_allowed_http' => 'متد درخواستی مجاز نیست.',
        'not_found_http' => 'مسیر درخواستی در سرور یافت نشد.',
        'missing_scope' => 'شما به این مسیر دسترسی ندارید.',
        'type_error' => 'نوع پارامتر ارسال‌شده نامعتبر است.',
        'throttle_request' => 'تعداد درخواست‌های شما بیش از حد مجاز است. لطفاً چند دقیقه صبر کنید.',
        'backed_enum_case_not_found' => 'مقدار enum مشخص‌شده یافت نشد.',
    ],

    'message' => [
        'succeed' => 'عملیات با موفقیت انجام شد.',
        'created' => 'اطلاعات با موفقیت ذخیره شد.',
        'updated' => 'اطلاعات با موفقیت به‌روزرسانی شد.',
        'deleted' => 'اطلاعات با موفقیت حذف شد.',
        'failed' => 'عملیات ناموفق بود، لطفاً دوباره تلاش کنید.',
        'unauthorized' => 'شما مجوز مشاهده این اطلاعات را ندارید.',
        'forbidden' => 'دسترسی شما به این اطلاعات مجاز نیست.',
        'accepted' => 'عملیات با موفقیت انجام شد.',
    ],
    'enums' => [
        'blog_order' => [
            'latest' => 'جدیدترین',
            'oldest' => 'قدیمی ترین',
        ],
        'project_technology' => [
            'general' => 'مشاوره عمومی / مطمئن نیستم',
            'go_backend' => 'توسعه بک‌‌اند با Go',
            'laravel' => 'توسعه وب با Laravel',
            'react' => 'توسعه فرانت‌اند با React',
            'devops' => 'دواپس و زیرساخت',
        ],
        'project_type' => [
            'technical_consultation' => 'مشاوره فنی کلی',
            'project_scoping' => 'تحلیل و نیازسنجی پروژه',
            'architecture_review' => 'بررسی معماری فعلی',
            'technology_selection' => 'انتخاب تکنولوژی مناسب',

            'api_development' => 'توسعه API و وب‌سرویس با Go',
            'microservices' => 'طراحی و توسعه میکروسرویس‌ ها',
            'backend_refactor' => 'بازنویسی یابهبود بک‌اند موجود',
            'performance_optimization' => 'بهینه ‌سازی عملکرد و سرعت',

            'custom_web_app' => 'توسعه وب‌اپلیکیشن اختصاصی',
            'ecommerce_development' => 'توسعه فروشگاه آنلاین',
            'cms_development' => 'ساخت یا شخصی‌سازی سیستم مدیریت محتوا',
            'api_laravel' => 'توسعه API مبتنی بر Laravel',

            'spa_development' => 'توسعه اپلیکیشن تک‌صفحه‌ای (SPA)',
            'pwa_development' => 'توسعه اپلیکیشن پیش‌رونده (PWA)',
            'ui_component_design' => 'طراحی و ساخت کامپوننت‌های رابط کاربری',
            'frontend_integration' => 'اتصال فرانت‌اند به بک‌اند/API',

            'ci_cd_setup' => 'راه‌اندازی CI/CD',
            'cloud_migration' => 'مهاجرت به فضای ابری',
            'container_orchestration' => 'کانتینرسازی و ارکستریشن (k8s & Docker)',
            'monitoring_setup' => 'راه‌اندازی مانیتورینگ و لاگینگ',
        ],

        'project_expected_timing' => [
            'flexible' => 'مهم نیست / منعطف',
            'asap' => 'خیلی فوری (کمتر از ۱ ماه)',
            'one_to_three_months' => '۱ تا ۳ ماه',
            'three_to_six_months' => '۳ تا ۶ ماه',
            'six_plus_months' => 'بیشتر از ۶ ماه',
        ],

        'project_estimated_budget' => [
            'under_50m' => 'کمتر از ۵۰ میلیون تومان',
            'from_50m_to_100m' => 'بین ۵۰ تا ۱۰۰ میلیون تومان',
            'from_100m_to_200m' => 'بین ۱۰۰ تا ۲۰۰ میلیون تومان',
            'above_200m' => 'بیشتر از ۲۰۰ میلیون تومان',
            'not_sure' => 'هنوز بودجه مشخصی ندارم',
        ],

        'how_to_get_to_know_us' => [
            'google' => 'جستجوی گوگل',
            'social' => 'شبکه‌های اجتماعی',
            'friend' => 'معرفی دوستان',
            'ads' => 'تبلیغات',
            'other' => 'سایر',
        ],

        'status' => [
            'published' => 'فعال',
            'inactivated' => 'غیر فعال',
            'drafted' => 'پیش نویس',
            'archived' => 'آرشیو',
        ],

        'faq_category' => [
            'service' => 'service',
            'laravel' => 'laravel',
            'golang' => 'golang',
            'react' => 'react',
        ],
    ],

];




