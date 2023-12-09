@if(auth()->user()->sub_role == \App\Enumeration\SubRole::$ADMIN)
<?php
$subMenu = [
    'add.unmarriage.certificate.bn', 'unmarriage.certificate_bn.edit', 'unmarriage.certificate_bn.print', 'show.unmarriage-bn.certificate',
    'add.unmarriage.certificate.en','unmarriage.certificate_en.edit','unmarriage.certificate_en.print','show.unmarriage-en.certificate',
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            অবিবাহিত
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.unmarriage.certificate.bn') }}" class="nav-link {{ Route::currentRouteName() == 'add.unmarriage.certificate.bn' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'add.unmarriage.certificate.bn' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>অবিবাহিত সনদ পত্র </p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.unmarriage-bn.certificate','unmarriage.certificate_bn.edit','unmarriage.certificate_bn.print'

        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.unmarriage-bn.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল অবিবাহিত সনদ পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'add.unmarriage.certificate.en'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('add.unmarriage.certificate.en') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>Add Unmarried Certificate</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.unmarriage-en.certificate','unmarriage.certificate_en.edit','unmarriage.certificate_en.print'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.unmarriage-en.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>All Unmarriage Certificate</p>
            </a>
        </li>
    </ul>
</li>

<?php
$subMenu = [
    'add.remarriage.certificate.bn','show.remarriage-bn.certificate','add.remarriage.certificate.en','show.remarriage-en.certificate','remarriage.certificate_bn.edit','remarriage.certificate_bn.print',
    'remarriage.certificate_en.print','remarriage.certificate_en.edit'
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            পুনর্বিবাহ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.remarriage.certificate.bn') }}" class="nav-link {{ Route::currentRouteName() == 'add.remarriage.certificate.bn' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'add.remarriage.certificate.bn' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>পুনর্বিবাহ সনদ পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.remarriage-bn.certificate','remarriage.certificate_bn.edit','remarriage.certificate_bn.print',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.remarriage-bn.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল পুনর্বিবাহ সনদ পত্র </p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'add.remarriage.certificate.en',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('add.remarriage.certificate.en') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>Add Remarriage Certificate</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.remarriage-en.certificate','remarriage.certificate_en.edit','remarriage.certificate_en.print'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.remarriage-en.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>All Remarriage Certificate</p>
            </a>
        </li>
    </ul>
</li>


<?php
$subMenu = [
    'add.income.certificate.bn', 'show.income-bn.certificate','income.certificate_bn.edit','income.certificate_bn.print'
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            আয় বিষয়ক প্রত্যয়ন
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.income.certificate.bn') }}" class="nav-link {{ Route::currentRouteName() == 'add.income.certificate.bn' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'add.income.certificate.bn' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>আয় বিষয়ক প্রত্যয়ন পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.income-bn.certificate','income.certificate_bn.edit','income.certificate_bn.print'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.income-bn.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল আয় বিষয়ক  প্রত্যয়ন</p>
            </a>
        </li>
    </ul>
</li>


<?php
$subMenu = [
    'add.certificate', 'show.certificate','certificate.edit'
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            প্রত্যয়ন পত্র
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.certificate') }}" class="nav-link {{ Route::currentRouteName() == 'add.certificate' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'add.certificate' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>প্রত্যয়ন পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.certificate','certificate.edit'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল প্রত্যয়ন পত্র</p>
            </a>
        </li>
    </ul>
</li>


<?php
$subMenu = [
    'landlessCertificate', 'addLandlessCertificate', 'editLandlessCertificate', 'landless_certificate.print',
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            ভূমিহীন সনদ পত্র
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php
        $subSubMenu = [
            'addLandlessCertificate'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('addLandlessCertificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>ভূমিহীন সনদ পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'landlessCertificate','editLandlessCertificate','landless_certificate.print'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('landlessCertificate') }}" class="nav-link {{ Route::currentRouteName() == 'landlessCertificate' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'landlessCertificate' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল ভূমিহীন সনদ পত্র</p>
            </a>
        </li>
    </ul>
</li>


<?php
$subMenu = [
    'add.family_certificate', 'show.family_certificate', 'add.family_certificate.english', 'show.family_certificate.english','family.certificate.edit','family.certificate.print'
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            ওয়ারিশ সনদপত্র
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.family_certificate') }}" class="nav-link {{ Route::currentRouteName() == 'add.family_certificate' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'add.family_certificate' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>ওয়ারিশ সনদ (বাংলা)</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.family_certificate','family.certificate.edit','family.certificate.print'
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.family_certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল ওয়ারিশ সনদ </p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'add.family_certificate.english',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('add.family_certificate.english') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>Warish Certificate</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.family_certificate.english',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.family_certificate.english') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>All Warish Certificate</p>
            </a>
        </li>
    </ul>
</li>

<?php
$subMenu = [
    'add.character.certificate', 'show.character.certificate',
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            চারিত্রিক সনদ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.character.certificate') }}" class="nav-link {{ Route::currentRouteName() == 'add.character.certificate' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'add.character.certificate' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>চারিত্রিক সনদ পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.character.certificate',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.character.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল চারিত্রিক সনদ পত্র</p>
            </a>
        </li>
    </ul>
</li>


<?php
$subMenu = [
    'add.nationality.certificate', 'show.nationality.certificate', 'add.nationality.certificate_eng', 'show.nationality.certificate_eng'
];
?>
<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marked"></i>
        <p>
            নাগরিকত্ব সনদ
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('add.nationality.certificate') }}" class="nav-link {{ Route::currentRouteName() == 'add.nationality.certificate' ? 'active' : '' }}">
                <i class="far {{ Route::currentRouteName() == 'add.nationality.certificate' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>নাগরিকত্ব সনদ পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.nationality.certificate',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.nationality.certificate') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>সকল চারিত্রিক সনদ পত্র</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'add.nationality.certificate_eng',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('add.nationality.certificate_eng') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>Nationality Certificate</p>
            </a>
        </li>

        <?php
        $subSubMenu = [
            'show.nationality.certificate_eng',
        ];
        ?>
        <li class="nav-item">
            <a href="{{ route('show.nationality.certificate_eng') }}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                <p>All Nationality Certificate</p>
            </a>
        </li>
    </ul>
</li>
@endif

{{--<?php--}}
{{--$subMenu = [--}}
{{--    'user', 'user.add', 'user.edit'--}}
{{--];--}}
{{--?>--}}
{{--<li class="nav-item">--}}
{{--    <a href="{{ route('user') }}"--}}
{{--       class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">--}}
{{--        <i class="nav-icon fas fa-users"></i>--}}
{{--        <p>লগআউট করুন</p>--}}
{{--    </a>--}}
{{--</li>--}}

{{--<?php--}}
{{--$subMenu = [--}}
{{--    'collection.report.summary','collection.report.collection','collection.report.user_log'--}}
{{--];--}}
{{--?>--}}
{{--<li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">--}}
{{--    <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">--}}
{{--        <i class="nav-icon fas fa-address-card"></i>--}}
{{--        <p>--}}
{{--            রিপোর্টস--}}
{{--            <i class="right fas fa-angle-left"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('collection.report.summary') }}" class="nav-link {{ Route::currentRouteName() == 'collection.report.summary' ? 'active' : '' }}">--}}
{{--                <i class="far {{ Route::currentRouteName() == 'collection.report.summary' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                <p>আদায় সারসংক্ষেপ</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('collection.report.collection') }}" class="nav-link {{ Route::currentRouteName() == 'collection.report.collection' ? 'active' : '' }}">--}}
{{--                <i class="far {{ Route::currentRouteName() == 'collection.report.collection' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                <p>আদায় রিপোর্ট</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('collection.report.user_log') }}" class="nav-link {{ Route::currentRouteName() == 'collection.report.user_log' ? 'active' : '' }}">--}}
{{--                <i class="far {{ Route::currentRouteName() == 'collection.report.user_log' ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>--}}
{{--                <p>ব্যবহারকারী লগ রিপোর্ট</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
