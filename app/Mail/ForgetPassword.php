<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class ForgetPassword extends Mailable{
        use Queueable, SerializesModels;

        public $data;

        public function __construct($data){
            $this->data = $data;
        }

        public function build(){
            return $this->from($this->data['from_email'])->view('back.mails.forget_password');
        }
    }
