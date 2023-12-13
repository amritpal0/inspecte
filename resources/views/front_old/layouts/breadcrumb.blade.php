<section class="breadcrumb_section sports_breadcrumb d-flex align-items-end clearfix" data-background="assets/images/breadcrumb/bg_14.jpg">
    <div class="container">
        <h1 class="sports_page_title mb-0 text-uppercase" data-text-color="#363636">{{$page}}</h1>
    </div>
</section>

<div class="sports_breadcrumb_nav_wrap">
    <div class="container">
        <ul class="sports_breadcrumb_nav ul_li clearfix">
            <li><a href="{{asset('')}}"><i class="fas fa-home"></i></a></li>
            @if(isset($parent))
            <li><a href="{{$parent_url}}">{{$parent}}</a></li>
            @endif
            <li>{{$page}}</li>
        </ul>
    </div>
</div>