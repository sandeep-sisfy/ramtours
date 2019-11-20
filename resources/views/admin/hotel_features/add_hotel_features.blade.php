@extends('admin.main')

@section('title',$page_title)

@section('title_breadcrumb',$page_title)

@section('admin_head_css')

@parent

    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css"/>

@endsection

@section('admin_container')

@php 

    if(empty($feature))

    $feature='';

@endphp

        <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="body">

                        <form action="{{url('/admin/hotel-features')}}@yield('edit_feature_id')" method="POST" accept-charset="utf-8" id="add_hotel_features" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="hotel_feature" value="{!! get_edit_input_pvr_old_value_with_obj('hotel_feature',$feature,'hotel_feature')!!}">
                                    {!! get_form_error_msg($errors, 'hotel_feature') !!}
                                    <label class="form-label">Hotel Features</label>
                                </div>
                            </div>                            
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20">Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('admin_jscript')

@parent

    <script src="{{ $assets_admin }}/js/pages/forms/editors.js"></script>

    <script src="{{ $assets_admin }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor --> 

    <script type="text/javascript">

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

