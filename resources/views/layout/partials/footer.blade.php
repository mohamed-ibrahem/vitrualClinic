@if(! isset($no_footer) || !$no_footer)
<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 footer-block">
                <h2>@lang('general.footer.title')</h2>
                <p>@lang('general.footer.content')</p>
            </div>

            <div class="col-sm-3 footer-block">
                <h2>@lang('general.footer.social')</h2>
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
        <div class="copyright">@lang('general.footer.copyright', ['app' => config('app.name')])</div>
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->
