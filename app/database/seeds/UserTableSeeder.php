
<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
    	 DB::table('users')->delete();
          DB::table('user_friend')->delete();
          DB::table('friend_notifications')->delete();
          DB::table('user_personalInfo')->delete();
          DB::table('user_friendsInfo')->delete();


    	  $user1 =  User::create(array(           
                         
             'email' => 'admin@admin.com',
             'password' => Hash::make('asdf123')
            

         ));

           $user2 =  User::create(array(           
                         
             'email' => 'member@admin.com',
             'password' => Hash::make('asdf123')
            

         ));


    	  $details1 =  UserPersonalInfo::create(array(  
             'user_id' => $user1->id,
             'firstname' => 'Prateek',
             'lastname' => 'Singh' 
         ));
          $details2 =  UserPersonalInfo::create(array(  
             'user_id' => $user2->id,
             'firstname' => 'Member',
             'lastname' => 'Singh' 
         ));

          $details1->primary_email = $user1->email;
          $details1->save();

          $details2->primary_email = $user2->email;
          $details2->save();

    }

}