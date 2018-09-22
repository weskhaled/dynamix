<footer>
    <div class="footer-container">
        <div class="container container-inner">
            <div class="row">
                <div class="col-sm-3">
                    <section class="widget text-4 widget_text">
                            @php dynamic_sidebar('sidebar-footer-col-1') @endphp
                    </section> <!-- /.widget -->
                </div>
                <div class="col-sm-3">
                    <section class="widget">
                            @php dynamic_sidebar('sidebar-footer-col-2') @endphp
                    </section>
                </div>
                <div class="col-sm-3">
                    <section class="widget text-2 widget_text">
                        <div class="textwidget">
                            @php dynamic_sidebar('sidebar-footer-col-3') @endphp
                            <!-- /.widget -->
                        </div>
                    </section>
                </div>
                <div class="col-sm-3">
                    <section class="widget tag_cloud">
                        @php dynamic_sidebar('sidebar-footer-col-4') @endphp
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    @php dynamic_sidebar('sub-footer-text') @endphp
                </div>
                <div class="col-sm-6">
                    <div class="social-icons text-right clearfix">
                        <a href="#" class="social-icon si-small si-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-small si-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-small si-github">
                            <i class="fa fa-github"></i>
                        </a>
                        <a href="#" class="social-icon si-small si-linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>