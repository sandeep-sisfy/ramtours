@extends('admin.main')
@section('admin_head_css')
@parent
    <link rel="stylesheet" href="{{ $assets_admin }}/plugins/dropzone/dropzone.css">
    <link href="{{ $assets_admin }}/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
@endsection
@section('title',$page_title)
@section('title_breadcrumb',$page_title)
@section('admin_container')
<div class="container-fluid">
    {!!show_flash_msg()!!}
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">                       
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="home">
                                <form action="{{url('admin/gallery')}}" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                    <div class="dz-message">
                                        <div class="drag-icon-cph"><i class="material-icons">touch_app</i>
                                        </div>
                                        <h3 class="drop_files">Drop files here or click to Save File here.</h3>
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
                            </div>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix image_with_url_div">
                                @if(!empty($gallery))
                                @foreach($gallery as $image)
                                   <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 m-b-20 rami_bk_galerry_box"> <a href="{{ rami_get_file_url($image->image) }}" data-sub-html="{{$image->title}}"> <img class="img-fluid img-thumbnail" src="{{ rami_get_file_url($image->image) }}" alt="{{$image->title}}" style="height:250px; width: 250px"> </a>
                                       <div class="btn-group text-center rami_galerry_btn">
                                            <button type="button" class="btn btn-raised bg-light-blue waves-effect edit_hotel_gallery" image_id="{{$image->id}}"><i class="material-icons">mode_edit</i></button>
                                            <button type="button" class="btn btn-raised bg-red waves-effect del_hotel_gallery" image_id="{{$image->id}}"> <i class="material-icons">delete_forever</i> </button>
                                        </div>
                                        <span>Image Link: </span>
                                        <input type="text" class="form-control image-box-url" id="image_url_input" value="{{ rami_get_file_url($image->image) }}"><button type="button" class="btn btn-raised bg-light-blue waves-effect image_url_btn" image_url="{{ rami_get_file_url($image->image) }}">copy url</button>
                                   </div>                                    
                                @endforeach
                                @endif
                            </div>
                          </div>
                        </div>
                        <form id='del_hotel_img_form' method="POST" action="{{url('admin/gallery/')}}" style="display: none">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                        </form>
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
        paramName: "gallery_image", // The name that will be used to transfer the file
        maxFilesize: 5, // MB
        dictFileTooBig:'File Size Is large please Add image less than 5MB',
        dictInvalidFileType:'Only Image File Allow to Upload',
        error:function(msg, er) {
        	console.log(er);
        }
    };
    $('.edit_hotel_gallery').click(function(event) {
        if(confirm('Are you want to edit this image')){
            var url='admin/gallery/'+$(this).attr('image_id')+'/edit_image/';
            window.location.href='{{url('')}}'+'/'+url;
        }
    });
    $('.del_hotel_gallery').click(function(event) {
        if(confirm('Are you want to Delete this image')){
            var url =$('#del_hotel_img_form').attr('action')+'/'+$(this).attr('image_id');
            $('#del_hotel_img_form').attr('action', url);
            $('#del_hotel_img_form').submit();
        }
    });
    /*Copy image URL*/
    $('.image_with_url_div').on('click', '.image_url_btn', function(event) {
        event.preventDefault();       
        var image_url = $(this).prev('input');
        image_url.select();
        document.execCommand("copy");
        alert('URL Copied');
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