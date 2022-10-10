<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-12">
                <h1 class="text-white mb-4"><img class="img-fluid me-3" src="img/icon/icon-02-light.png" alt="">KBB-Staj</h1>
                <!--
                <span>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</span>
            -->
            </div>
            <!--
            <div class="col-md-6">
                <h5 class="text-light mb-4">Newsletter</h5>
                <p>Clita erat ipsum et lorem et sit, sed stet lorem sit clita.</p>
                <div class="position-relative">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        -->
            <div class="col-lg-3 col-md-6" style="margin-left: 100px;">
                <h5 class="text-light mb-4">İletişim Bilgileri</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>{{$iletisim[0]->adres}}</p>
                <p><i class="fa fa-envelope me-3"></i>{{$iletisim[0]->email}}</p>
            </div>
            <div class="col-lg-3 col-md-6" style="margin-left: 100px;">
                <h5 class="text-light mb-4">Hizmetler</h5>
                <a class="btn btn-link" href="">Haberler</a>
                <a class="btn btn-link" href="">Duyurular</a>
                <a class="btn btn-link" href="">Projeler</a>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>  Distributed by <a href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->