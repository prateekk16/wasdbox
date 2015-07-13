<?php

/**
 * File Name: UserController.php.
 * User: Prateek Singh
 * Date: 7/2/2015
 * Time: 12:09 PM
 */
class UserController extends BaseController
{

    protected $layout;// = "layouts.login";
    private $_layout = null;

    public function __construct()
    {
        App::bind('Pusher',function($app){
            $keys = $app['config']->get('services.pusher');
            return new Pusher($keys['public'], $keys['secret'], $keys['app_id']);
        });

        $this->beforeFilter('csrf', array('on' => 'post'));

    }

    private function _setupLayout()
    {
        if (!is_null($this->_layout)) {
            $this->layout = View::make($this->_layout);
        }
    }

    public function index()
    {

        
        $this->_layout = 'layouts.profileTemplate';
        $this->_setUpLayout();

        $total_requests = FriendNotification::where('receiver_id','=',Auth::user()->id)
                                            ->where('pending','=',1)->get();

        $this->layout->content = View::make('pages.profile.index',array('user' => Auth::user(), 'freq'=>$total_requests->count(), 'senders'=>$total_requests ));


    }

    public function search_friend(){
        $user = User::where('email','=',Input::get('email'))->first();
        if($user!=null)
            return $user->personalInfo;
        else
            return 0;
        
    }

    public function send_request(){
        $sender = Input::get('sender');
        $receiver = Input::get('receiver');

        $sender = User::where('email','=',$sender)->first();
        $receiver = User::where('email','=',$receiver)->first();

        //check if user is not already a friend
        
       
        
        $notify = new FriendNotification;
        $notify->sender_id = $sender->id;
        $notify->receiver_id = $receiver->id;
        $notify->pending = 1;
        $notify->save();

        $total_requests = FriendNotification::where('receiver_id','=',$receiver->id)
                                            ->where('pending','=',1)->get();


        App::make('Pusher')->trigger('FriendRequestChannel','userSentRequest', ['sender_email' => $sender->email, 'receiver_email' => $receiver->email, 'sender_name' => $sender->personalInfo->firstname.' '.$sender->personalInfo->lastname, 'total_req' => $total_requests->count()   ]);
    }

}

