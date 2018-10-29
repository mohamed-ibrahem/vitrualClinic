@extends ('layout.app')

@section ('title', 'Home Page')
@section ('description', 'Home Page')

@section ('content')
    <div class="container">
        <div class="portlet box purple ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Horizontal Form Height Sizing </div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Large Input</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-lg" placeholder="Large Input"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Default Input</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Default Input"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Small Input</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-sm" placeholder="Default Input"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Large Select</label>
                            <div class="col-md-9">
                                <select class="form-control input-lg">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Default Select</label>
                            <div class="col-md-9">
                                <select class="form-control">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Small Select</label>
                            <div class="col-md-9">
                                <select class="form-control input-sm">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right1">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="submit" class="btn green">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
