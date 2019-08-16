<?php session_start(); ?>
<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!------------Bootstrap-------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!------------ -------------->
    <!---------------Alertrs------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>MiauFace</title>
  </head>
  <script>
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  fetch_user();
  update_chat_history_data();
}, 500);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#Seecontact').html(data);
   }
  })
 }

 function make_chat_dialog_box(to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_name+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-tousername="'+to_user_name+'" id="chat_history_'+to_user_name+'">';
  modal_content += fetch_user_chat_history(to_user_name);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_name+'" id="chat_message_'+to_user_name+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_name+'" class="btn btn-info send_chat">Send&nbsp;<svg id="i-send" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="17" height="17" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M2 16 L30 2 16 30 12 20 Z M30 2 L12 20" /></svg></button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '#start_chat', function(){
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_name);
  $("#user_dialog_"+to_user_name).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_name).dialog('open');
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_name = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_name).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_name:to_user_name, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_name).val('');
    $('#chat_history_'+to_user_name).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_name)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_name:to_user_name},
   success:function(data){
    $('#chat_history_'+to_user_name).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_name = $(this).data('tousername');
   fetch_user_chat_history(to_user_name);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });

});
</script>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Home.php">
        <svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
        </svg>
        <?php echo $_SESSION['user']; ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="Home.php">
            <svg id="i-home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M12 20 L12 30 4 30 4 12 16 2 28 12 28 30 20 30 20 20 Z" />
            </svg>
            Home
          </a>
          <a class="nav-item nav-link" href="CloseSession.php">
            <svg id="i-signout" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
            </svg>
            Log Out
          </a>
          <a class="nav-item nav-link active" href="#">
            <svg id="i-msg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M2 4 L30 4 30 22 16 22 8 29 8 22 2 22 Z" />
            </svg>
            Message <span class="sr-only">(current)</span>
          </a>
        </div>
      </div>
    </nav>
    <br>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="Seecontact">Chats</h5>

        </div>
      </div>
      <div id="user_model_details"></div>
    </div>
  </body>
</html>
