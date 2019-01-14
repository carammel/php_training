<?php

$db = new PDO('sqlite:db\emel.db');
if ($ACodeNE==0) {
  $query = $db->query(sprintf("SELECT * FROM Conversation where sender= :sender;"));
  $query->execute([':sender'=> $UserIDNE]);
  $result = $query->fetchAll();
}
else if ($ACodeNE==1) {
  $query = $db->query(sprintf("SELECT * FROM Conversation where receiver= :receiver;"));
  $query->execute([':receiver'=> $UserIDNE]);
  $result = $query->fetchAll();
}
else if ($ACodeNE==2) {
  $query = $db->query(sprintf("SELECT * FROM Conversation;"));
  $result = $query->fetchAll();
}
else {
  echo "Authentication Error!";
}
//print_r($result);
foreach ($result as $finally) {
  $Convid[]=$finally['id'];
  if ($ACodeNE==0) {
    $ConName[]=$finally['receiver'];
  }
  else if ($ACodeNE==1) {
    $ConName[]=$finally['sender'];
  }
  else if ($ACodeNE==2) {
    $ConName[]=$finally['sender'].' - ' . $finally['receiver'];
  }
  $subject[]=$finally['subject'];
}

for ($i=0; $i <count($Convid) ; $i++) {
$htmli.='<div class="conv">
  <div class="ConName">
    conversation:'. $Convid[$i].'
  </div>
  <div class="ConSubject">
    conversation: '.$subject[$i].'
  </div>
  <div class="ConAlert">
    <i class="far fa-envelope"></i>
  </div>
</div>';
}
/*function(){
  $query = $db->query(sprintf("SELECT * FROM isUnread));
  $results = $query->fetchAll();

  foreach ($result as $finally) {
    $Convid[]=$finally['id'];
    $user1[]=$finally['sender'];
    $user2[]=$finally['receiver'];
    $subject[]=$finally['subject'];
  }

  if ($user1 =) {
    # code...
  }
}*/

 ?>
