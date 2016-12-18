<?php
  $to = $_POST['email'];
  $subject = 'A teacher wants to know your relief work status';
  $message = '
    <img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" />
      <br /><br /><br />
    Hi there, another teacher wants to know your school\'s relief work availability for this week - please login to <a href="http://perthreliefteachers.com.au/school-job-list">PerthReliefTeachers.com.au</a> and update your Job Profile. If you like you can set your job status as "No Jobs" for the current week (It takes less than a minute to update).
      <br /><br />
    Regards,
      <br />
    <a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>';     
  $headers[] = 'From: PerthReliefTeachers.com.au <contact@perthreliefteachers.com.au>';

  wp_mail( $to, $subject, $message, $headers );
  remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); 

  if($send){
    $return = true;
  }

  echo json_encode($return); // return a json string with the value
?>