<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* SENDS EMAIL WITH GMAIL
*/
class Emailsend extends CI_Controller
{

  function checkSpam($email)
    {

        $this->load->library('genuinemail');
        $check = $this->genuinemail->check($email);
        if($check===TRUE){
        	echo "Successful ";
        	return true;
        } 
        else{
        	echo "Failed ";
        	return false;
        }
    }
  
  public function index()
	{
		$config = Array(
		    'protocol'     => 'smtp',
        'smtp_host'    => 'ssl://smtp.googlemail.com',
        'smtp_port'    => 465,
        'smtp_user'    => 'YourEmail@Example.com',
        'smtp_pass'    => 'YourPassword',
        'smtp_timeout' => '7',
        'mailtype'     => 'text', 
        'charset'      => 'utf-8',
        'wordwrap'     => TRUE,
        'newline'      => "\r\n",
        'validation'   => TRUE
    );
		
		$this->load->library('email',$config);
		$this->email->from('SenderEmail@Example.com', 'Test Email');
		$this->email->to('ReceiverEmail@Example.com');
		$this->email->cc('');
		$this->email->bcc('');
		
		$this->email->subject('Test');
		$this->email->message('This is a test email');
		
    if($this->checkSpam(ReceiverEmail@Example.com)){
					  $this->email->send();
						?>
			        <script type="text/javascript">
			           alert("Send Successfully");
			        </script>
			      <?php
				}
				else{
					?>
			       <script type="text/javascript">
			          alert("Send Failed! Your mail address domain is wrong or It's Banned Fake Domain.");
			       </script>
			    <?php
				}
		
		echo $this->email->print_debugger();
		
	  }
}
