@component('layout.partials.components.portlet', [
            'title' => $title
    ])
    @slot ('actions')
        <div class="tool actions">
            <div class="row">
                <div class="col-md-push-6 col-md-6">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn green btn-outline dropdown-toggle"
                                data-toggle="dropdown">
                            @lang('general.datatable.tools.0')
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" id="action_tool">
                            <li>
                                <a href="javascript:;" data-action="0" class="tool-action">
                                    <i class="fa fa-print"></i>
                                    @lang('general.datatable.tools.print')
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-action="1" class="tool-action">
                                    <i class="fa fa-file-pdf"></i>
                                    @lang('general.datatable.tools.pdf')
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-action="2" class="tool-action">
                                    <i class="fa fa-file-excel"></i>
                                    @lang('general.datatable.tools.excel')
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endslot

    @slot ('body')
        {!! $slot !!}
    @endslot
@endcomponent
