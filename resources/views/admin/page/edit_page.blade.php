@extends('admin.page.add_page')
@section('edit_page_id', '/'.$page->id)
@section('nav-tabs')
    <li class="nav-item"><a class="nav-link active"  href="javascript:void(0)" data-toggle="tab">page Info</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" onclick="window.location.href='{{url('admin/page-meta/'.$page->id)}}'">Meta data</a></li>
@endsection
@section('method_field')
{{method_field('PUT')}}
@endsection
@section('page_img')
@if(!empty($page->page_img))
<div class="form-group">
    <label for="previous">Car Image: </label>
	<img src="{{ rami_get_file_url($page->page_img) }}" width="75" height="75" alt="page Image">
</div>
@endif
@endsection
@section('page_other_link')
	<div class="form-group form-float">
        <label class="profit">Page having right side Links : </label>
        <input type="radio" name="is_having_link" id="having_link" class="with-gap radio-col-amber page_link_radio" value="1" {!!get_edit_select_check_pvr_old_value_with_obj('is_having_link',$page,'is_having_link',1, 'chacked')!!}>
        <label for="having_link" class="m-l-10 m-r-10">yes</label>
        <input type="radio" name="is_having_link"  id="not_having_link" class="with-gap radio-col-amber page_link_radio" value="0" {!!get_edit_select_check_pvr_old_value_with_obj('is_having_link',$page,'is_having_link',0, 'chacked')!!}>
        <label for="not_having_link" class="m-l-10 m-r-10">No</label>
        {!! get_form_error_msg($errors, 'is_having_link') !!}
    </div>
    <a class="btn btn-success btn-primary waves-effect m-t-20 
     m-r-10 m-l-10 add_link_btn" href="{{ url('/admin/pagelink/'.$page->id) }}" style="display: none;" target="_blank">Add Links
    </a> 
@endsection
@section('admin_jscript')
@parent
    <script type="text/javascript">
    	$(document).ready(function() {
    		$('.page_link_radio').click(function(event) {
	            if($(this).val() == 1){
	                $('.add_link_btn').slideDown('slow');
	            }else{
	                $('.add_link_btn').slideUp('slow'); 
	            }
       		});
    	});
    	
    </script>       
@endsection