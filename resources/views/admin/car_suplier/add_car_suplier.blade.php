@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css"/>
@endsection
@php 
    if(empty($car))
    $car='';
@endphp
@section('admin_container')
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        {!!show_flash_msg()!!}
                        <form action="{{url('/admin/car-suplier')}}@yield('edit_car_suplier_id')" method="POST" accept-charset="utf-8" id="add_car" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_suplier_name" value="{!! get_edit_input_pvr_old_value_with_obj('car_suplier_name', $car , 'car_suplier_name')!!}">
                                    {!! get_form_error_msg($errors, 'car_suplier_name') !!}
                                    <label class="form-label">Car Suplier Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Car Suplier Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor car_suplier_disc" name="car_suplier_disc">{!! get_edit_input_pvr_old_value_with_obj('car_suplier_disc',$car,'car_suplier_disc')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'car_suplier_disc') !!}
                                </div>
                            </div>                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_suplier_email" value="{!! get_edit_input_pvr_old_value_with_obj('car_suplier_email', $car , 'car_suplier_email')!!}">
                                    {!! get_form_error_msg($errors, 'car_suplier_email') !!}
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_suplier_cont_1" value="{!! get_edit_input_pvr_old_value_with_obj('car_suplier_cont_1', $car , 'car_suplier_cont_1')!!}">
                                    {!! get_form_error_msg($errors, 'car_suplier_cont_1') !!}
                                    <label class="form-label">Contact Number 1</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_suplier_cont_2" value="{!! get_edit_input_pvr_old_value_with_obj('car_suplier_cont_2', $car , 'car_suplier_cont_2')!!}">
                                    {!! get_form_error_msg($errors, 'car_suplier_cont_2') !!}
                                    <label class="form-label">Contact Number 2</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_suplier_fax" value="{!! get_edit_input_pvr_old_value_with_obj('car_suplier_fax', $car , 'car_suplier_fax')!!}">
                                    {!! get_form_error_msg($errors, 'car_suplier_fax') !!}
                                    <label class="form-label">Fax</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="car_suplier_website" value="{!! get_edit_input_pvr_old_value_with_obj('car_suplier_website', $car , 'car_suplier_website')!!}">
                                    {!! get_form_error_msg($errors, 'car_suplier_website') !!}
                                    <label class="form-label">Car Suplier Website URL</label>
                                </div>
                            </div>
                            @yield('car_suplier_logo')
                            <div class="form-group">
                                <label for="upload">Logo Images Here : </label>
                                <input name="car_suplier_logo" type="file" class="form-control list_file" accept="image/*" />
                                {!! get_form_error_msg($errors, 'car_suplier_logo') !!}
                            </div>
                            <input type="hidden" name="go_to_next_page" id="go_to_next_page" value="0">
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
                            </button>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 go_to_ext_page_btn m-r-10 m-l-10">Save & Add Car
                            </button>
                        </form>

                    </div>

                </div>               

            </div>            

        </div>

@endsection
@section('admin_jscript')
@parent
    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 
    <script type="text/javascript">
       CKEDITOR.replace('car_suplier_disc', {
        language: '{{get_rami_setting('backend_lang')}}'
        });
       $('.save_form_btn').click(function(event) {
            $('#go_to_next_page').val(0);
        });
        $('.go_to_ext_page_btn').click(function(event) {
            $('#go_to_next_page').val(1);
        });
    </script>
@endsection

