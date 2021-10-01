<section class="subscribe-position">
    <div class="container">
        <div class="subscribe text-center">
            <h3 class="subscribe__title">Get Update From Anywhere</h3>
            <p>Bearing Void gathering light light his eavening unto dont afraid</p>
            <div>
                <form method="POST"  action="/newsletter" class="subscribe-form form-inline mt-5 pt-1">
                    @csrf
                    <div class="form-group ml-sm-auto">
                        <input class="form-control mb-1" id="email" name="email" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
                        <div class="info"></div>
                    </div>
                    <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
