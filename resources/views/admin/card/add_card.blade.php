@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/bootstrap-select/css/bootstrap-select.css" />
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
@php
   if(empty($card))
    $card='';
@endphp
 {!!show_flash_msg()!!}
{{-- empty check for edit purpose and helper use--}}
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">                        
                        <form action="{{url('admin/card')}}@yield('edit_card_id')" id="add_card" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @section('method_field')
                            @show
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="card_title" value="{!! get_edit_input_pvr_old_value_with_obj('card_title',$card, 'card_title')!!}">
                                    {!! get_form_error_msg($errors, 'card_title') !!}
                                    <label class="form-label">Card Title</label>
                                </div>
                            </div>                       
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Card Discription</label>
                                    <br><br>
                                    <textarea class="ckeditor" name="card_desc">{!! get_edit_input_pvr_old_value_with_obj('card_desc',$card,'card_desc')!!}</textarea>
                                    {!! get_form_error_msg($errors, 'card_desc') !!}
                                </div>
                            </div>
                            <!-- <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="price" value="{!! get_edit_input_pvr_old_value_with_obj('price',$card, 'price')!!}">
                                        {!! get_form_error_msg($errors, 'price') !!}
                                        <label class="form-label">Card Price</label>
                                    </div>
                                </div> -->
                               <!--  <div class="form-group form-float">
                                <div class="form-line"> 
                                    <select class="form-control show-tick price_currency" name="price_currency">
                                        <option value="1" {{get_edit_select_check_pvr_old_value_with_obj('price_currency', $card, 's', 1, 'select')}} >USD</option>
                                        <option value="2" {{get_edit_select_check_pvr_old_value_with_obj('price_currency', $card, 'price_currency', 2, 'select')}} >Euro </option>
                                        <option value="3" {{get_edit_select_check_pvr_old_value_with_obj('price_currency', $card, 'price_currency', 3, 'select')}} >Swiss Franc</option>
                                        <option value="4" {{get_edit_select_check_pvr_old_value_with_obj('price_currency', $card, 'price_currency', 4, 'select')}}>Shekel</option>
                                    </select>
                                    <label class="form-label">Price Currency</label>
                                </div>
                                {!! get_form_error_msg($errors, 'price_currency') !!}
                            </div> -->
                           <!--  <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick max_people" name="max_people"  data-header="Select a Max Peoples" required="true">
                                         @for($i=1;$i<=6;$i++)
                                            <option value="{{ $i }}" {{get_edit_select_check_pvr_old_value_with_obj('max_people', $card, 'max_people', $i, 'select')}} >{{$i}} People </option>
                                         @endfor
                                    </select>
                                    <label class="form-label">Max People Per Card</label>
                                </div>
                                {!! get_form_error_msg($errors, 'max_people') !!}
                            </div> -->
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="link" value="{!! get_edit_input_pvr_old_value_with_obj('link',$card, 'link')!!}">
                                    {!! get_form_error_msg($errors, 'link') !!}
                                    <label class="form-label">Link</label>
                                </div>
                            </div>                                
                            @yield('card_img')
                            <div class="form-group">
                                <label for="upload">Upload Image Here : </label>
                                <input type="file" name="card_img" class="form-control list_file" accept="image/*" />
                                {!! get_form_error_msg($errors, 'card_img') !!}
                            </div>                 
                            <button type="submit" class="btn btn-success btn-primary waves-effect m-t-20 save_form_btn m-r-10 m-l-10">Save
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
        $("#add_car").validate({
            rules: {
                title:{
                    required: true,
                    maxlength: 100,
                },
                contact_no:{
                    required: true,
                }
            },
            messages: {
                title: {
                    required: "Please enter Name here.",
                    maxlength:"Sub Category Name contain only 100 Charecters .",
                },
                contact_no:{
                    required:"Please enter cotact number here.",
                }       
            }
        });
        @if($price_currency==0)
            $('.profit_currency').val(4);
        @else
            $('.profit_currency').val({{$price_currency}});
        @endif
    </script>
        
@endsection