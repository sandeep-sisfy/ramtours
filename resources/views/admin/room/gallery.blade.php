@extends('admin.main')

@section('admin_head_css')

@parent

    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/dropzone/dropzone.css">

    <link href="{{ $assets_admin }}/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

@endsection

@section('title',$page_title)

@section('title_breadcrumb',$page_title)

@section('admin_container')

@php

$tag='';

@endphp

<div class="container-fluid">

    {!!show_flash_msg()!!}

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="card">

                    <div class="body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" onclick="window.location.href='{{url('admin/room/'.$room_id.'/edit')}}'">Room Info</a></li>
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="{{url('admin/room/gallery/'.$room_id)}}" >Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{url('admin/room/'.$room_id.'/room_price')}}" onclick="window.location.href='{{url('admin/room/'.$room_id.'/room_prices')}}'">Room Price</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/room-alert/'.$room_id)}}'">Room Alerts</a></li>
                        </ul> 

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane in active" id="home">

                                <form action="{{url('admin/room/add_image/'.$room_id)}}" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">

                                    <div class="dz-message">
                                        <div class="drag-icon-cph"> <i class="material-icons">touch_app</i>
                                        </div>
                                        <h3 class="drop_files">Drop files here or click to Save Images.</h3>
                                    </div>                                  

                                     {{ csrf_field() }}

                                     {{method_field('PUT')}}

                                    <div class="fallback">

                                        <input name="file" type="file" multiple />

                                    </div>                                    
                                </form>
                                <p class="font col-orange">For multiple Image uploading drop files here or click to Save Images.</p>
                            <div class="form-group" style="text-align:center">

                                <button type="button" class="btn btn-success btn-primary waves-effect m-t-20 upload_comp" onclick="window.location.reload();" >Save Images
                                </button>
                                <button type="button" class="btn btn-success btn-primary waves-effect m-t-20 upload_comp" onclick='window.location.href="{{url('admin/room/'.$room_id.'/room_prices')}}"'>Save & add room prices
                                </button>                              
                            </div>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                @if(!empty($images))
                                @foreach($images as $image)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-20 rami_bk_galerry_box"> <a href="{{ rami_get_file_url($image->image) }}" data-sub-html="{{$image->title}}"> <img class="img-fluid img-thumbnail" src="{{ rami_get_file_url($image->image) }}" alt="{{$image->title}}" style="height:250px; width: 250px"> </a>
                                        <div class="btn-group text-center rami_galerry_btn">
                                          <button type="button" class="btn btn-raised bg-light-blue waves-effect room_img_edit"  img_id="{{ $image->id }}"> <i class="material-icons">mode_edit</i></button>
                                           <button type="button" class="btn btn-raised bg-red waves-effect room_img_delete"  img_id="{{ $image->id }}"> <i class="material-icons">delete_forever</i> </button>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            <form id='del_room_img' method="POST" action="{{url('admin/room/gallery')}}" style="display: none">
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                            </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('admin_jscript')
@parent
<script src="{{ $assets_admin }}/plugins/dropzone/dropzone.js"></script>
<script src="{{ $assets_admin }}/plugins/light-gallery/js/lightgallery-all.js"></script>
<script src="{{ $assets_admin }}/js/pages/medias/image-gallery.js"></script>
<script type="text/javascript">
    Dropzone.options.frmFileUpload={ 
        paramName: "room_image", // The name that will be used to transfer the file
        maxFilesize: 5, // MB
        acceptedFiles:'image/*',
        dictFileTooBig:'File Size Is large please Add image less than 2MB',
        dictInvalidFileType:'Only Image File Allow to Upload',
        error:function(msg, er) {
            alert(er);
        }
    };
    $('.room_img_edit').click(function(event) {
        if(confirm('Are you sure to edit this image.')){
            var image_id=$(this).attr('img_id');
            var url='/admin/room/'+image_id+'/edit_image';
            window.location.href='{{ url('') }}'+'/'+url;
        }
    });
    $('.room_img_delete').click(function(event) {       
            var id= $(this).attr('img_id');
        if(confirm('Are you sure to delete this image.')){   
            var action=$('#del_room_img').attr('action');
            $('#del_room_img').attr('action', action+'/'+id);
            $('#del_room_img').submit();
        }        
    });
/*image validation*/
        $("#frmFileUpload").validate({
            rules: {
                file:{
                    image: true,
                },
            },
            messages: {
                file:{
                   image:"Please upload image file."
                }
            }
        });
    </script>
@endsection