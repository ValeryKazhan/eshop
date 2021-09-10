@props(['header', 'pageName'])


<section
    class="blog-banner-area"
    id="category"
>
    <img src="/img/back.png" alt="" style="width: 100%;height: 100%;">
    <div class="container h-20">
        <div class="blog-banner">
            <div class="text-center">

                <h1 style="color: aliceblue">{{$header}}</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a  style="color: aliceblue" href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: aliceblue" >{{$pageName}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

