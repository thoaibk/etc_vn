<?php
$active = isset($active) ? $active : '';
?>

<div class="course-admin-nav navbar navbar-default bg-white mb-3">
    <ul class="nav nav-tabs">
        <li class="nav-item "><a class="nav-link {{ ($active == 'info') ? 'active' : ''}}" href="{{ route('backend.footer.info') }}">Thông tin chung</a></li>
        <li class="nav-item "><a class="nav-link {{ ($active == 'left') ? 'active' : ''}}" href="{{ route('backend.footer.meta_link', ['meta' => 'left']) }}">Link footer trái</a></li>
        <li class="nav-item "><a class="nav-link {{ ($active == 'center') ? 'active' : ''}}" href="{{ route('backend.footer.meta_link', ['meta' => 'center']) }}">Link footer center</a></li>
        <li class="nav-item "><a class="nav-link {{ ($active == 'widget-social') ? 'active' : ''}}" href="{{ route('backend.footer.widget_social') }}">Link social</a></li>
        <li class="nav-item "><a class="nav-link {{ ($active == 'copyright') ? 'active' : ''}}" href="{{ route('backend.footer.copyright') }}">Copyright</a></li>
    </ul>
</div>
