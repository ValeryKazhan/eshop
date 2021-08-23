@props(['name' => 'Products'])

<section class="section-margin calc-60px">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Popular Item in the market</p>
            <h2><span class="section-intro__style">{{$name}}</span></h2>
        </div>
        <div class="row">

            @for($i=0; $i<8; $i++)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <x-product-grid-item/>
                </div>
            @endfor

        </div>
    </div>
</section>
