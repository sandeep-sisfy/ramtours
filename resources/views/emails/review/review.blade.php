@component('mail::message')
@component('mail::panel_review')

@endcomponent


@component('mail::promotion_review', ['first_name'=>$request->first_name, 'email'=>$request->email, 'last_name'=>$request->last_name,'title'=>$request->title, 'remark'=>$request->remark, 'link'=>$link])
@endcomponent

@component('mail::subcopy')

@endcomponent
@endcomponent

