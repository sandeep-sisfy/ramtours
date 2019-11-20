@extends('admin.main')

@section('admin_head_css')

@parent

    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />

    <link href="{{ $assets_admin }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">

@endsection

@section('title',$page_title)

@section('title_breadcrumb',$page_title)

@section('admin_container')


{!!show_flash_msg()!!}

{{-- empty check for edit purpose and helper use--}}

        <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="body">

                        <form action="{{url('admin/setting/homepage_meta')}}" id="add_homepage_meta" method="POST" accept-charset="utf-8">

                            {{ csrf_field() }}

                           <!--  {{method_field('PUT')}}
 -->
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Homepage Title Text</label>
                                    <input  class="form-control" type="text" name="homepage_title_text" value="{{ get_rami_setting('homepage_title_text') }}">
                                    {!! get_form_error_msg($errors, 'homepage_title_text') !!}
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Homepage header custom code</label>
                                    <br><br>
                                    <textarea name="homepage_header_custom_code" rows="5" style="width:100%;margin-top: -20px" >{!! get_rami_setting('homepage_header_custom_code') !!}</textarea>
                                    {!! get_form_error_msg($errors, 'homepage_header_custom_code') !!}

                                </div>

                            </div>

                            <div class="form-group form-float">

                                <div class="form-line">

                                    <label class="form-label">Homepage footer custom code</label>

                                    <br><br>

                                    <textarea name="homepage_footer_custom_code" rows="5" style="width:100%;margin-top: -20px" >{!! get_rami_setting('homepage_footer_custom_code') !!}</textarea>
                                    {!! get_form_error_msg($errors, 'homepage_footer_custom_code') !!}
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

@endsection