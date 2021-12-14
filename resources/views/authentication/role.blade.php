@extends('layouts.home')

@section('content')
    <section>
        <div class="row">
            <article class="col-sm-12 col-md-3 col-lg-3">
                <div class="jarviswidget" id="wid-id-0"
                    data-widget-editbutton="false"
                    data-widget-colorbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>				
                        <h2><code>Role pane</code></h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            
                            <form class="smart-form" method="post" id="form1" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <header>
                                    Role form
                                </header>
                                <fieldset>
                                    <section>
                                        <label class="input">
                                            <input type="text" name="name" id="name" placeholder="Role Name" required>
                                            <b class="tooltip tooltip-bottom-right">Enter role name</b> </label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <input type="hidden" name="hidden_id" id="hidden_id" />
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Create">
                                </footer>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
            <article class="col-sm-12 col-md-9 col-lg-9">
                <section>
                    <div class="row">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-1"
                                data-widget-editbutton="false"
                                data-widget-colorbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                            >
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                    <h2>Roles Data Table </h2>
                                </header>
                                <div>
                                    <div class="jarviswidget-editbox">
                                    </div>
                                    <div class="widget-body no-padding">
                                        <table id="table1" class="table table-striped table-bordered table-hover" width="100%">
                                            <thead>			                
                                                <tr>
                                                    <th>Action</th>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </article>
        </div>
    </section>
@endsection

@section('systemJsFile')
    <script src="{{ asset('/js/system-scripts/authentication/roles.js') }}"></script> 
@stop