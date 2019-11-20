<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Review extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;
    public $subject;
    protected $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $id, $is_testi)
    {
       $this->request=$request;
       if( $is_testi==1){
        $this->link= url('admin/testimonial/'.$id.'/edit');
        $this->subject='Ramtours:New customer Testimonials';
       }else{
        $this->subject='';
        $this->link= '';
       }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.review.review', ['request'=>$this->request, 'link'=>$this->link])->subject($this->subject);
    }
}
