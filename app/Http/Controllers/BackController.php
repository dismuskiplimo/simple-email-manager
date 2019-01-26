<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use App\User;

use Auth;

use Mail;

use Session;

use App\Company;

use App\Template;

use App\Email;

use App\EmailAddress;

use App\Setting;

use App\Profile;

class BackController extends Controller
{
	protected $public_path;

	protected $csv_path;
    
    public function __construct(){
    	$this->middleware('auth');
    	$this->public_path = base_path() . '\\' . env('PUBLIC_DIR');
    	$this->csv_path = $this->public_path . '\\' . 'csv';
    }

    public function getDashboard(){
        $templates = Template::get();
        $emails_sent = Email::get();
        $email_addresses = EmailAddress::get();
        $users = Company::get();

    	return view('pages.admin.dashboard', [
            'page' => 'dashboard',
            'templates' => $templates,
            'emails_sent' => $emails_sent,
            'email_addresses' => $email_addresses,
    		'users' => $users,
    	]);
    }


    public function getComposeEmail(){
        return view('pages.admin.compose-message', [
            'page' => 'compose email',
        ]);
    }

    public function getUsers(){
    	$users = Company::orderBy('name', 'asc')->get();

        return view('pages.admin.users', [
            'page' => 'users',
    		'users' => $users,
    	]);
    }

    public function getTemplates(){
    	$templates = Template::orderBy('created_at', 'desc')->get();
    	return view('pages.admin.templates', [
    		'page' => 'templates',
    		'templates' => $templates,
    	]);
    }

    public function getProfiles(){
    	$profiles = Auth::user()->profiles;

    	return view('pages.admin.profiles', [
    		'page' => 'profiles',
    		'profiles' => $profiles,
    		
    	]);
    }

    public function postEmail(Request $request){
    	$this->validate($request,[
    		'subject' => 'required|max:255',
            'to_id' => 'required',
    		'profile_id' => 'required',
    	]);

        $profile = Profile::findOrFail($request->profile_id);

        $recepients = new Collection;

    	if($request->hasFile('attachments')){

    		$attachments = [];
    		$file_errors = [];
            $files = [];

    		foreach($request->file('attachments') as $file){

    			if($file->isValid()){
					if($file->getClientSize() > 0){
						$filetype = $file->getClientOriginalExtension();

                        $files[] = $file;
						
						$path = $file->store('attachments');
					
						$path = storage_path() . '\\app\\' . $path;

						$attachments[] = $path;

					}else{
						$err = true;
						$file_errors[] = $file->getClientOriginalName();

					}
					
				}
    		}
    	}

    	$attch = '';

    	if(isset($attachments)){
    		if(count($attachments)){
    			$attch = json_encode($attachments);
    		}
    	}


    	if(isset($file_errors)){
    		if(count($file_errors)){
    			Session::flash('error', 'Some files could not be attached because they were invalid, however the email was sent :) - ' . implode(', ', $file_errors));
    		}
    	}

        foreach ($request->to_id as $recepient) {
            $rec = EmailAddress::where('company_id', $recepient)->get();
            $recepients = $recepients->merge($rec);
            $to_id = $recepient;
        }

    	if(count($recepients)){
    		$rcp = [];

    		foreach ($recepients as $recepient) {
    			$rcp[] = $recepient->email_address;
    		}

    		$data = ['contents' => $request->content];

    		config(['mail.from.name' 	=> $profile->mail_from_name]);
	    	config(['mail.from.email' 	=> $profile->mail_from_email]);
	    	config(['mail.username' 	=> $profile->mail_username]);
	    	config(['mail.password' 	=> $profile->mail_password]);
	    	config(['mail.host' 	=> $profile->mail_host]);
	    	config(['mail.port' 	=> $profile->mail_port]);
	    	config(['mail.encryption' 	=> $profile->mail_encryption]);

    		try{

                Mail::send('emails.blank', $data, function($message) use($rcp, $request, $profile)
    			{

    			    $message->to($profile->mail_from_email);
    			    $message->bcc($rcp);
    			    $message->subject($request->subject);

                    if(isset($files)){
                        if(count($files)){
                            foreach ($files as $file) {
                                
                                $message->attach($file->getRealPath(),[
                                    'as' => $file->getClientOriginalName(),
                                    'mime' => $file->getMimeType(),
                                ]);


                            }
                        }
                    }
                    
    		    	
    			});


                $email = new Email;
                $email->to_id = $to_id;
                $email->subject = $request->subject;
                $email->content = $request->content;
                $email->attachments = $attch;
                $email->user_id = Auth::user()->id;

                $email->save();

                Session::flash('success', 'Email Sent');

            }catch(\Swift_TransportException $e){
                Session::flash('error', $e->getMessage());
            }

    	}else{
    		Session::flash('error', 'Email not Sent, no email addresses defined for the user / company');
    	}

    	return redirect()->back();
    }

    public function postUser(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'industry' => 'required',
    	]);

    	if($request->emails){
    		$emails = explode(',', $request->emails);
    	}
    	
    	if($request->hasFile('file')){
    		$file = $request->file('file');
    		
			if($file->isValid()){
				if($file->getClientSize() > 0){
					$filetype = $file->getClientOriginalExtension();
					if($filetype == 'csv'){
						$path = $file->store('csv');
					
						$path = storage_path() . '/app/' . $path;

						$handle = fopen($path, 'r');

						$list = fgetcsv($handle);

						if(!is_null($list)){
							$err = false;
						}else{
							$err = true;
							Session::flash('error', 'The file must be a CSV');
						}	
					}else{
						$err = true;
						Session::flash('error', 'The file must be a CSV');
					}
					
				}else{
					$err = true;
					Session::flash('error', 'The CSV file should not be empty');
				}
				
			}
    		
    	}

    	if(isset($err)){
    		if($err == false){
    			$company = new Company;
		    	$company->name = $request->name;
		    	$company->industry = $request->industry;
		    	$company->user_id = Auth::user()->id;
		    	$company->save();

		    	if(isset($emails)){
			    	if(count($emails)){
			    		foreach ($emails as $email) {
			    			$e = new EmailAddress;
			    			$e->company_id = $company->id;
			    			$e->email_address = trim($email);
			    			$e->save();

			    		}
			    	}
		    	}

		    	if(isset($list)){
					if(count($list)){
						foreach ($list as $r => $v) {
							$email_address = new EmailAddress;
							$email_address->email_address = $v;
							$email_address->company_id = $company->id;
							$email_address->save();
						}
					}
				}
				Session::flash('success', 'User / Group added');
    		}
    	}else{
    		$company = new Company;
	    	$company->name = $request->name;
	    	$company->industry = $request->industry;
	    	$company->save();

	    	if(isset($emails)){
	    		if(count($emails)){
		    		foreach ($emails as $email) {
		    			$e = new EmailAddress;
		    			$e->company_id = $company->id;
		    			$e->email_address = trim($email);
		    			$e->save();

		    		}
		    	}
	    	}

	    	Session::flash('success', 'User / Group added');
    	}

    	

    	return redirect()->back();


    }

    public function postTemplate(Request $request){
    	$this->validate($request,[
    		'name' => 'required|max:255',
    	]);

    	if($request->hasFile('file')){
    		$file = $request->file('file');
    		
    		if($file->isValid()){
				if($file->getClientSize() > 0){
					$filetype = $file->extension();
					$path = $file->store('templates');
					$path = 'app/' . $path;

					$template = new Template;
					$template->name = $request->name;
					$template->filepath = $path;
                    $template->filetype = $filetype;
                    $template->filename = $file->getClientOriginalName();
					$template->filesize = $file->getClientSize();
					$template->user_id = Auth::user()->id;
					$template->save();

					Session::flash('success', 'Template added');
				}else{
					Session::flash('error', 'Invalid file');
				}
			}
    	}else{
    		Session::flash('error', 'You must attach a template');
    	}

    	return redirect()->back();
    }


    public function addEmailProfile(Request $request){
    	$this->validate($request, [
            'name' => 'required',
    		'mail_from_name' => 'required',
    		'mail_from_email' => 'required|email',
    		'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
    		'mail_encryption' => 'required',
    	]);

        if($request->mail_encryption == 'none'){
            $request->mail_encryption = null;
        }

        $profile = new Profile;
        $profile->name = $request->name;
        $profile->mail_from_name = $request->mail_from_name;
        $profile->mail_from_email = $request->mail_from_email;
        $profile->mail_username = $request->mail_username;
        $profile->mail_password = $request->mail_password;
        $profile->mail_host = $request->mail_host;
        $profile->mail_port = $request->mail_port;
        $profile->mail_encryption = $request->mail_encryption;
        $profile->user_id = Auth::user()->id;
        $profile->save();

    	Session::flash('success', 'SMTP profile added');

    	return redirect()->back();
    }

    public function updateEmailProfile(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'mail_from_name' => 'required',
            'mail_from_email' => 'required|email',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_encryption' => 'required',
        ]);

        if($request->mail_encryption == 'none'){
            $request->mail_encryption = null;
        }

        $profile = Profile::findOrFail($id);
        $profile->name = $request->name;
        $profile->mail_from_name = $request->mail_from_name;
        $profile->mail_from_email = $request->mail_from_email;
        $profile->mail_username = $request->mail_username;
        $profile->mail_password = $request->mail_password;
        $profile->mail_host = $request->mail_host;
        $profile->mail_port = $request->mail_port;
        $profile->mail_encryption = $request->mail_encryption;
        $profile->update();

        Session::flash('success', 'SMTP profile updated');

        return redirect()->back();
    }

    public function deleteProfile($id){
        $profile = Profile::findOrFail($id);
        $profile->delete();

        Session::flash('success', 'Profile Deleted');

        return redirect()->back();
    }

    public function downloadTemplate($id){
        $template = Template::findOrFail($id);

        return response()->download(storage_path($template->filepath), $template->filename);
    }

    public function deleteTemplate($id){
        $template = Template::findOrFail($id);

        $path = storage_path($template->filepath);

        $template->delete();

        unlink($path);

        Session::flash('success', 'Template Deleted');


        
        return redirect()->back();
    }

    public function getUser($id){
        $user = Company::findOrFail($id);

        return view('pages.admin.user', [
            'page' => $user->name,
            'user' => $user,
        ]);
    }

    public function updateEmailAddress(Request $request, $id){
        $this->validate($request,[
            'email_address' => 'required|email',
        ]);
        $email = EmailAddress::findOrFail($id);
        $email->email_address = $request->email_address;
        $email->update();

        Session::flash('success', 'Email Address Updated');

        return redirect()->back();

    }

    public function deleteEmailAddress($id){
        $email = EmailAddress::findOrFail($id);
        $email->delete();

        Session::flash('success', 'Email Address Removed');

        return redirect()->back();   
    }

    public function addEmailAddress(Request $request, $company_id){
        $this->validate($request,[
            'email_address' => 'required|email',
        ]);

        $company = Company::findOrFail($company_id);

        $email = new EmailAddress;
        $email->email_address = $request->email_address;
        $email->company_id = $company_id;
        $email->save();

        Session::flash('success', 'Email Address Added');

        return redirect()->back();   
    }

    public function updateUser(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'industry' => 'required',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->industry = $request->industry;
        $company->update();

        Session::flash('success', 'User / Group Updated');

        return redirect()->back();

    }

    public function deleteUser($id){
        $user = Company::findOrFail($id);
        $emails = $user->emails;

        if(count($emails)){
            foreach ($emails as $email) {
                $email->delete();
            }
        }

        $user->delete();

        Session::flash('success', 'User / Group Removed');

        return redirect(route('users'));   
    }

    public function postCSV(Request $request, $id){
        $this->validate($request,[
            'file' => 'required',
        ]);

        $company = Company::findOrFail($id);

        if($request->hasFile('file')){
            $file = $request->file('file');
            
            if($file->isValid()){
                if($file->getClientSize() > 0){
                    $filetype = $file->getClientOriginalExtension();
                    if($filetype == 'csv'){
                        $path = $file->store('csv');
                    
                        $path = storage_path() . '/app/' . $path;

                        $handle = fopen($path, 'r');

                        $list = fgetcsv($handle);

                        if(!is_null($list)){
                            $err = false;
                        }else{
                            $err = true;
                            Session::flash('error', 'The file must be a CSV');
                        }   
                    }else{
                        $err = true;
                        Session::flash('error', 'The file must be a CSV');
                    }
                    
                }else{
                    $err = true;
                    Session::flash('error', 'The CSV file should not be empty');
                }
                
            }
            
        }

        if(isset($err)){
            if($err == false){

                if(isset($list)){
                    if(count($list)){
                        foreach ($list as $r => $v) {
                            $email_address = new EmailAddress;
                            $email_address->email_address = $v;
                            $email_address->company_id = $company->id;
                            $email_address->save();
                        }
                    }
                }
                Session::flash('success', 'Emails Imported');
            }
        }

        

        return redirect()->back();
    }
}
