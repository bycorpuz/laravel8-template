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
                        <h2><code>Add permission to role pane</code></h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            
                            <form class="smart-form" method="post" id="form1" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <header>
                                    Add permission to role form
                                </header>
                                <fieldset>
                                    <section>
                                        <label class="label">Role Name</label>
                                        <select multiple="multiple" id="role_id" name="role_id[]" class="form-control select2" style="width: 100%;">
                                            <?php 
                                                $arr = roleList();
                                                foreach ($arr as $row) {
                                                    echo '<option value="'. $row->id .'"> &nbsp; '. $row->name .'</option>';
                                                }
                                            ?>
                                        </select>
                                        <div class="note">
                                            <strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.
                                        </div>
                                    </section>
                                    <section>
                                        <label class="label">Permission Name</label>
                                        <select multiple="multiple" id="permission_id" name="permission_id[]" class="form-control select2" style="width: 100%;">
                                            <?php 
                                                $arr = permissionList();
                                                foreach ($arr as $row) {
                                                    echo '<option value="'. $row->id .'"> &nbsp; '. $row->name .'</option>';
                                                }
                                            ?>
                                        </select>
                                        <div class="note">
                                            <strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.
                                        </div>
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
                                    <h2>Role Permissions Data Table </h2>
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
                                                    <th>Role Name</th>
                                                    <th>Permission Name</th>
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
    <script src="{{ asset('/js/system-scripts/authentication/role-has-permissions.js') }}"></script> 
@stop