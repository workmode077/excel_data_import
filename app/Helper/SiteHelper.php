<?php

namespace App\Helper;
use Auth;
use Modules\Admin\Entities\AdminUser;
use Kreait\Firebase\Messaging\Notification as CloudNotification;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;


class SiteHelper
{

	protected $factory;
   //  public function __construct()
   //  {
   //     $this->factory = (new Factory)->withServiceAccount(config('firebase.credentials.file'));
   //  }
    public static function can($perm,$guard = 'admin')
    {
    	$user_id = Auth::guard($guard)->id();
    	$user = AdminUser::find($user_id);
    	$check_list = array();
    	foreach ($user->getRole()->get() as $key => $value) {
    		$check_list = array_merge($check_list,$value->permissions()->pluck('permissions.slug')->toArray());
    		$check_list = array_unique($check_list);
	}
    	return in_array($perm, $check_list);
    }

	 // Send push notification
	//  public function sendNotification($deviceToken, $data)
	//  {
	// 	 $messaging = $this->factory->createMessaging();
	// 	 if ($deviceToken) {

	// 		try{
	// 			$message = CloudMessage::withTarget('token', $deviceToken)
	// 			->withNotification(CloudNotification::create($data['title'], $data['body']))
	// 			->withData($data['params']);
	// 			$messaging->send($message);
	// 			}
	// 		catch(\Exception $e) 
	// 		{
	// 			// dd($e);
	// 			return true;

	// 		}
			 
	// 	 }
 
	//  }
    public function permission($guard = 'admin')
    {
    	$user_id = Auth::guard($guard)->id();
    	$user = AdminUser::find($user_id);
    	$check_list = array();
    	foreach ($user->getRole()->get() as $key => $value) {
    		$check_list = array_merge($check_list,$value->permissions()->pluck('permissions.slug')->toArray());
    		$check_list = array_unique($check_list);
    	}
    	return $check_list;
    }



}