<?php get_header(); ?>

<style>

.blog-single .sidebar-box{
    border:1px solid #e5e5e5;
    padding:24px;
    margin-bottom:24px;
}

.blog-single .sidebar-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:20px;
}

.blog-single .category-item{
    display:flex;
    justify-content:space-between;
    padding:12px 0;
    border-bottom:1px solid #eee;
}

.blog-single .post-mini{
    display:flex;
    gap:12px;
    margin-bottom:18px;
}

.blog-single .post-mini img{
    width:70px;
    height:70px;
    object-fit:cover;
}

.blog-single .related-box{
    border:1px solid #e5e5e5;
    padding:24px;
}

.blog-single .related-box img{
    height:120px;
    object-fit:cover;
}

.blog-single .article-meta{
    display:flex;
    gap:28px;
    color:#777;
    margin-bottom:24px;
}

.blog-single .meta-item{
    display:flex;
    gap:8px;
    align-items:center;
}

.blog-single .meta-item svg{
    width:18px;
    height:18px;
}

.blog-single .article-cover{
    width:100%;
    height:360px;
    object-fit:cover;
    margin-bottom:28px;
}

.blog-single .article-image{
    width:100%;
    height:240px;
    object-fit:cover;
}

</style>

<main class="container p-3 blog-single">

<div class="bg-white shadow-sm p-4">

<nav class="small text-muted mb-4">

<a href="#"
class="text-decoration-none text-muted">

Trang chủ

</a>

<span class="mx-2">›</span>

<a href="#"
class="text-decoration-none text-muted">

Blog

</a>

<span class="mx-2">›</span>

<span>

Top 10 địa điểm đẹp ở Đà Nẵng không thể bỏ lỡ

</span>

</nav>


<div class="row g-4">


<!-- CONTENT -->

<div class="col-lg-8">

<div class="text-uppercase small fw-semibold mb-2">

Du lịch

</div>

<h1 class="fw-bold mb-4">

Top 10 địa điểm đẹp ở Đà Nẵng không thể bỏ lỡ

</h1>


<div class="article-meta">

<div class="meta-item">

<svg xmlns="http://www.w3.org/2000/svg"
fill="none"
stroke="currentColor"
stroke-width="1.8"
viewBox="0 0 24 24">

<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>

<circle cx="12"
cy="7"
r="4"/>

</svg>

Admin

</div>


<div class="meta-item">

<svg xmlns="http://www.w3.org/2000/svg"
fill="none"
stroke="currentColor"
stroke-width="1.8"
viewBox="0 0 24 24">

<circle cx="12"
cy="12"
r="9"/>

<path d="M12 7v5l3 2"/>

</svg>

3 ngày trước

</div>

</div>



<img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80"
class="article-cover">



<p>

Đà Nẵng – thành phố biển xinh đẹp của miền Trung Việt Nam –
luôn là điểm đến lý tưởng cho mọi du khách.

</p>

<p>

Không chỉ nổi tiếng với biển xanh,
cát trắng, Đà Nẵng còn sở hữu nhiều điểm du lịch hấp dẫn.

</p>

<p>

Dưới đây là top 10 địa điểm đẹp ở Đà Nẵng
mà bạn không nên bỏ lỡ.

</p>


<h3 class="fw-bold mt-5 mb-4">

1. Bà Nà Hills

</h3>

<p>

Bà Nà Hills được mệnh danh là
“chốn bồng lai tiên cảnh”
với khí hậu mát mẻ quanh năm.

</p>

<p>

Nơi đây nổi tiếng với Cầu Vàng,
Làng Pháp,
Fantasy Park...

</p>


<img src="https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=1200&q=80"
class="article-image mb-5">



<div class="related-box">

<h4 class="fw-bold mb-4">

Bài viết liên quan

</h4>


<div class="row g-4">

<?php for($i=1;$i<=3;$i++): ?>

<div class="col-md-4">

<img src="https://images.unsplash.com/photo-1493558103817-58b2924bce98?auto=format&fit=crop&w=800&q=80"
class="img-fluid mb-3">

<div>

Kinh nghiệm du lịch Hội An chi tiết từ A-Z

</div>

</div>

<?php endfor; ?>

</div>

</div>

</div>



<!-- SIDEBAR -->

<div class="col-lg-4">


<div class="sidebar-box">

<div class="sidebar-title">

Tìm kiếm

</div>

<div class="input-group">

<input type="text"
class="form-control border-end-0"
placeholder="Nhập từ khóa...">

<span class="input-group-text bg-white border-start-0">

<svg xmlns="http://www.w3.org/2000/svg"
width="18"
height="18"
fill="none"
stroke="currentColor"
stroke-width="2"
viewBox="0 0 24 24">

<circle cx="11"
cy="11"
r="8"/>

<path d="m21 21-4.3-4.3"/>

</svg>

</span>

</div>

</div>



<div class="sidebar-box">

<div class="sidebar-title">

Danh mục

</div>

<?php
$cats=[
"Du lịch",
"Kinh nghiệm",
"Ẩm thực",
"Điểm đến",
"Tin tức"
];

foreach($cats as $cat):
?>

<div class="category-item">

<span>

<?= $cat ?>

</span>

<span>

›

</span>

</div>

<?php endforeach; ?>

</div>



<div class="sidebar-box">

<div class="sidebar-title">

Bài viết nổi bật

</div>

<?php for($i=1;$i<=4;$i++): ?>

<div class="post-mini">

<img src="https://images.unsplash.com/photo-1493558103817-58b2924bce98?auto=format&fit=crop&w=400&q=80">

<div>

Kinh nghiệm du lịch Đà Lạt tự túc chi tiết nhất

</div>

</div>

<?php endfor; ?>

</div>



<div class="sidebar-box">

<div class="sidebar-title">

Bài viết liên quan

</div>

<?php for($i=1;$i<=3;$i++): ?>

<div class="post-mini">

<img src="https://images.unsplash.com/photo-1493558103817-58b2924bce98?auto=format&fit=crop&w=400&q=80">

<div>

Kinh nghiệm săn vé máy bay giá rẻ

</div>

</div>

<?php endfor; ?>

</div>


</div>

</div>

</div>

</main>

<?php get_footer(); ?>