@extends('admin.template')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Religious Amenity
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Religious Amenities</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-8 col-sm-offset-2">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Religious Amenity Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['url' => 'admin/add_religious_amenity', 'class' => 'form-horizontal']) !!}
                        <div class="box-body">
                            <span class="text-danger">(*)Fields are Mandatory</span>
                            <div class="form-group">
                                <label for="input_type" class="col-sm-3 control-label">Type<em
                                            class="text-danger">*</em></label>

                                <div class="col-sm-6">
                                    {!! Form::select('type_id', $types->lists('name', 'id'), '', ['class' => 'form-control', 'id' => 'input_type_id', 'placeholder' => 'Select']) !!}
                                    <span class="text-danger">{{ $errors->first('type_id') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_name" class="col-sm-3 control-label">Name<em
                                            class="text-danger">*</em></label>

                                <div class="col-sm-6">
                                    {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'input_name', 'placeholder' => 'Name']) !!}
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input_description" class="col-sm-3 control-label">Description</label>

                                <div class="col-sm-6">
                                    {!! Form::textarea('description', '', ['class' => 'form-control', 'id' => 'input_description', 'placeholder' => 'Description', 'rows' => 3]) !!}
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                            </div>
                        <!-- <div class="form-group">
                  <label for="input_icon" class="col-sm-3 control-label">Icon</label>

                  <div class="col-sm-6">
                    {!! Form::text('icon', '', ['class' => 'form-control', 'id' => 'input_icon', 'placeholder' => 'Icon']) !!}
                                <span class="text-danger">{{ $errors->first('icon') }}</span>
                  </div>
                </div> -->
                            <div class="form-group">
                                <label for="input_status" class="col-sm-3 control-label">Status<em
                                            class="text-danger">*</em></label>

                                <div class="col-sm-6">
                                    {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'), '', ['class' => 'form-control', 'id' => 'input_status', 'placeholder' => 'Select']) !!}
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right" name="submit" value="submit">Submit
                            </button>
                        </div>
                        <!-- /.box-footer -->
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop