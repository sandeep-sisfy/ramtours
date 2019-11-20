@extends('admin.main')
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css"/>
@endsection
@section('admin_container')
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        {!!show_flash_msg()!!}
                        <form action="{{url('/admin/edit_hotel_image/'.$hotel_image->id)}}" method="POST" accept-charset="utf-8" id="add_cat" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title" value="{!! get_edit_input_pvr_old_value_with_obj('title', $hotel_image , 'title')!!}">
                                    {!! get_form_error_msg($errors, 'title') !!}
                                    <label class="form-label">Image Title</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="sequence" value="{!! get_edit_input_pvr_old_value_with_obj('sequence', $hotel_image , 'sequence')!!}">
                                    {!! get_form_error_msg($errors, 'sequence') !!}
                                    <label class="form-label">Image sequence</label>
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="previous">Hotel Image: </label>
                                <img src="{{ rami_get_file_url($hotel_image->image) }}" width="75" height="75" alt="location_image">
                            </div>
                            <div class="form-group">
                                <label for="upload">Hotel Images Here : </label>
                                <input name="hotel_image" type="file" class="form-control list_file" accept="image/*" />
                                {!! get_form_error_msg($errors, 'hotel_image') !!}
                            </div>
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">save
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
       CKEDITOR.replace('location_des', {
        language: '{{get_rami_setting('backend_lang')}}'
        });
       $('#sub_location').change(function(event) {
            if($(this).prop("checked") == true){
                $('.main_location_list').slideDown('slow');
            }else{
               $('.main_location_list').slideUp('slow');
            }
       });

        if($('#sub_location').prop("checked") == true){
                $('.main_location_list').slideDown('slow');
            }else{
               $('.main_location_list').slideUp('slow');
        }
        $("#add_cat").validate({
            rules: {
                cat_name:{
                    required: true,
                    maxlength: 100,
                },
                cat_disc:{
                    required: true,
                    maxlength:500,
                }
            },
            messages: {
                cat_name: {
                    required: "Please enter Category Name here.",
                    maxlength:"Category Name contain only 100 Charecters ."
                },
                cat_disc:{
                    required:"Please enter Category Discription here.",
                    maxlength:"Category Discription contain only 500 Charecters.",

                }
            }
        });
    </script>
@endsection

