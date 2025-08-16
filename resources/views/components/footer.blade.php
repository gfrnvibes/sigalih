@if (Request::is('auth/login'))
@else
    <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
        <!-- Section: Social media -->
        <div class="container">

            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Tetap terhubung bersama kami di Sosial Media:</span>
                </div>
                <!-- Left -->
    
                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
        </div>

        <!-- Section: Links  -->
        <section class="p-3">
            <div class="container text-center text-md-start">
                <div class="row">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">
                            Desa Sirnagalih
                        </h6>
                        <p>
                            Merupakan desa yang terletak di Kecamatan Cisurupan, Kabupaten Garut, Provinsi Jawa Barat.
                        </p>
                    </div>



                    <div class="col-6 col-md-2 col-lg-2 col-xl-2">
                        <h6 class="text-start text-uppercase fw-bold">
                            Aplikasi
                        </h6>
                        <ul class="text-start list-unstyled">
                            <li>
                                <a href="{{ route('layanan') }}" class="text-reset">Layanan Administrasi</a>
                            </li>
                            <li>
                                <a href="{{ route('bankSampah') }}" class="text-reset">Bank Sampah Desa</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-3 col-lg-2 col-xl-2">
                        <h6 class="text-start text-uppercase fw-bold">
                            Organisasi
                        </h6>
                        <ul class="text-start list-unstyled">
                            <li>
                                <a href="#!" class="text-reset">Karang Taruna</a>
                            </li>
                            <li>
                                <a href="#!" class="text-reset">Posyandu</a>
                            </li>
                            <li>
                                <a href="#!" class="text-reset">Siskamling</a>
                            </li>
                            <li>
                                <a href="#!" class="text-reset">Help</a>
                            </li>
                        </ul>
                    </div>


                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0">
                        <h6 class="text-start text-uppercase fw-bold">Kontak</h6>
                        <ul class="text-start list-unstyled">
                            <li>
                                <i class="fas fa-home me-3"></i>Kp. Cipaniis RT. 004 RW. 008
                            </li>
                            <li>
                                <i class="fas fa-envelope me-3"></i>
                                <a href="mailto:sirnagalih@gmail.com" class="text-reset">sirnagalih@gmail.com</a>
                            </li>
                            <li>
                                <i class="fas fa-phone me-3"></i>
                                <a href="tel:+6281234567890" class="text-reset">+62 812 3456 7890</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                {{ date('Y') }} &copy; Desa Sirnagalih Cisurupan. All rights reserved.
        </div>
    </footer>
@endif
