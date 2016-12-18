<script>
  $('#send-email').on('click', function(event){
    var email = $("input#email").val();
    var data =  'email=' + email;

    $.ajax({
      url: "http://perthreliefteachers.com.au/wp-content/themes/generatepress_child/send-email.php",
      data: data,
      method: "POST",
      dataType: "json",
      success: function(result){
        if(result == true){
          $('#return').html('An email has been sent asking them to update their availability.');
        }
        else{
          $('#return').html('We were unable to send an email. Please report this issue to the webmaster.');
        }
      },
      error: function(){
        $('#return').html('We were unable to send an email. Please report this issue to the webmaster.');
      }
    });

  });
</script>