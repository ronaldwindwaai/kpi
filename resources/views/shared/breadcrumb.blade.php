<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <?php $route_name = explode('.',Route::currentRouteName());?>
                    <h5 class="m-b-10">{{ __('admin/breadcrumb.'.$route_name[0]) }}</h5>
                </div>
                <ul class="breadcrumb">
                    <?php $link=''; ?>
                    <li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
                    @foreach(Request::segments() as $segment)
                        <?php $link = $link.'/'.$segment;?>
                        <li class="breadcrumb-item">
                            <a href="{{ $link }}">{{is_numeric($segment) ? $segment : __('admin/breadcrumb.'.$segment)  }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
