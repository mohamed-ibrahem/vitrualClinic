@if(! isset($no_footer) || !$no_footer)
<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 footer-block">
                <h2>About</h2>
                <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore. </p>
            </div>

            <div class="col-sm-3 footer-block">
                <h2>Follow Us On</h2>
                <ul class="social-icons">
                    <li>
                        <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                    </li>
                    <li>
                        <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                    </li>
                    <li>
                        <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                    </li>
                    <li>
                        <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->
@endif
<!-- BEGIN INNER FOOTER -->
<div class="page-footer">
    <div class="container">
        <div class="copyright"> 2018 © {{ config('app.name') }}.</div>
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->
