

app = angular.module('wasd', []);

app.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);

app.controller('TodoController', ['$http', '$scope', function($http, $scope) {

   $scope.todos = [
        { body: 'Go to store', completed:true },
        { body: 'Finish video', completed:false },
         { body: 'Learn Angular', completed:false }  
    ];


    $scope.remaining = function(){
        var count = 0;

        angular.forEach($scope.todos, function(todo){
            count += todo.completed ? 0 : 1;
        });
        return count;
    }

    $scope.addTodo = function(){
        if($scope.ToDoText == ""){
            return false;
        }else{
             $scope.todos.push({
            
                body: $scope.ToDoText,
                completed: false           
            
             });    
           $scope.ToDoText = "";
        }

       
    }


}]);


app.controller('FriendController',['$http', '$scope', function($http, $scope) {

    $scope.searchFriend = function(){
        var user = $scope.userEmail;

        if($scope.SearchFriend == $scope.userEmail){
                 swal('Oops!','You cannot add yourself...Sorry!','error' );
        }else{

        var search_friend = $.trim($scope.base_url)+'/search_friend';
        var send_request = $.trim($scope.base_url)+'/send_request';
        var data = 'email='+$scope.SearchFriend;


        var avatar = $scope.url_search_friend_pic;
        avatar = $.trim(avatar);
        var name = null;         
 
        $.ajax({
                                  type: 'POST',
                                  url: search_friend,
                                  data: data,
                                  beforeSend:function(){
                                    // this is where we append a loading image
                                   $("#addFriend").attr("disabled", true);
                                   $(".span_searchFriend").text("Please wait...");
                                  },
                                  success:function(responseData){
                                    if(responseData!= 0){

                                        name = responseData['firstname'] + ' ' + responseData[ 'lastname'];
                                        avatar = avatar+'/'+responseData['primary_email']+'/'+'avatar.jpg'; 

                                        swal({
                                           title: name,
                                           text: 'Are you sure?',
                                           imageUrl: avatar,
                                           showCancelButton: true,
                                           confirmButtonColor: '#3085d6',
                                           cancelButtonColor: '#d33',   
                                           confirmButtonText: 'Yes, Send a request!',   
                                           closeOnConfirm: false,
                                           closeOnCancel: true,
                                           allowOutsideClick: false,
                                           allowEscapeKey: false },

                                           function(isConfirm){
                                              if (isConfirm){
                                                var data2 = 'sender='+user + '&receiver='+$scope.SearchFriend;
                                                $.ajax({
                                                        type:'POST',
                                                        url: send_request,
                                                        data: data2,
                                                        success:function(response){


                                                               

                                                            swal( 'Done!', 'Friend request sent.', 'success'   );
                                                            $("#addFriend").attr("disabled", false);
                                                            $(".span_searchFriend").text("Add Friend");
                                                        },
                                                        error:function(){

                                                        }                                                        
                                                });
                                                          
                                                      }else{
                                                           $("#addFriend").attr("disabled", false);
                                                           $(".span_searchFriend").text("Add Friend");
                                                          }                                          
                                              
                                          });

                                    } else{
                                        swal('Oops!','User not found.','error' );
                                        $("#addFriend").attr("disabled", false);
                                        $(".span_searchFriend").text("Add Friend");
                                    } 
                                  },
                                  error:function(){
                                     swal('Oops!','There was a problem.','error' );
                                  }
                }); 

        } // Else Statement       
    }  // Scope Function

   
    
}]);


$('#uploadAvatar').on('submit',(function(e){
  e.preventDefault();

  $("#uploadAvatar-btn").attr("disabled", true);
  $(".uploadAvatar-btn-text").text("Please wait...");

  
  var url = $(this).attr('action');
  alert(url);

     $.ajax({
                                                        type:'POST',
                                                        url: url,
                                                        data: new FormData(this),
                                                        success:function(response){                                                               

                                                            swal( 'Done!', 'success'   );
                                                            $("#uploadAvatar-btn").attr("disabled", false);
                                                            $(".uploadAvatar-btn-text").text("Upload");
                                                            $(.change-dp-modal).modal(hide);
                                                        },
                                                        error:function(){

                                                        }                                                        
            });
  



}));


