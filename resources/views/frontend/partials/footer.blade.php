<footer class="fdb-block footer-large custom-footer" style="padding: 50px !important;">
    <div class="container">
        <div class="row align-items-top text-center">
            
            <div class="col-12 col-md-4 col-lg-3 text-md-left mt-5 mt-md-0">
                <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid">
                <p>Official Travel Agency of Euroleague</p>
                <img src="{{ asset('img/visaMastercard.png') }}" alt="" class="img-fluid">
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-sm-left">
                <h3><strong>Terms & Conditions</strong></h3>
                <nav class="nav flex-column">
                    <a class="nav-link" href="{{ action('PageController@show', ['slug' => 'terms-and-conditions']) }}">Terms & Conditions</a>
                    <a class="nav-link" href="{{ action('PageController@show', ['slug' => 'disclaimer']) }}">Disclaimer</a>
                    <a class="nav-link" href="{{ action('PageController@show', ['slug' => 'cookies-policy']) }}">Cookies Policy</a>
                    <a class="nav-link" href="">FAQ</a>
                </nav>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-5 mt-sm-0 text-sm-left">
                <h3><strong>Company Profile</strong></h3>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="">About Us</a>
                    <a class="nav-link" href="">Contact</a>
                </nav>
            </div>

            <div class="col-12 col-lg-2 ml-auto text-lg-left mt-4 mt-lg-0">
                <h3><strong>Follow Us</strong></h3>
                <p class="text-h3">
                    <a href=""><i class="ti-twitter-alt" aria-hidden="true"></i></a>&nbsp;&nbsp;
                    <a href=""><i class="ti-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
                </p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col text-center">
                © 2017 Detur. All Rights Reserved
            </div>
        </div>
    </div>
</footer>