<section class="breadcrumb-area pt-80px pb-80px pattern-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <div class="section-heading pb-3">
                <h2 class="section__title">{{ $blog->post_title }}</h2>
            </div>
            <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="index.html">Home</a></li>
                <li><a href="blog-no-sidebar.html">Blog</a></li>
                <li>{{ $blog->post_title }}</li>
            </ul>
            <ul
                class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                <li class="d-flex align-items-center">By<a href="#">TechyDevs</a></li>
                <li class="d-flex align-items-center">{{ \Carbon\Carbon::parse($blog->created_at)->format('d-F-Y') }}
                </li>
                <li class="d-flex align-items-center"><a href="#comments" class="page-scroll">4 Comments</a></li>
                <li class="d-flex align-items-center">130 Shares</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
