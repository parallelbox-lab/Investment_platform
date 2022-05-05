<?php
function encrypt($string) {
  $key = sha1("fH3gPdX7h9t79uHep41sg6ZcN"); //key to encrypt and decrypts.
  $result = '';
  $test = "";
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)+ord($keychar));

    //  $test[$char]= ord($char)+ord($keychar);
     $result.=$char;
   }

   return  str_rot13(urlencode(base64_encode($result)));
}
//echo decrypt("wnaQkndvm5lqpzcyoN%3Q%3Q");
function decrypt($string) {
  $key = sha1("fH3gPdX7h9t79uHep41sg6ZcN"); //key to encrypt and decrypts.
    $result = '';
    $string = base64_decode(urldecode(str_rot13($string)));
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)-ord($keychar));
     $result.=$char;
   }
   return $result;
}

////////////////////////////////////////////////////

function encrypt_decrypt($Str_Message) {
$Len_Str_Message = strlen($Str_Message);
$Str_Encrypted_Message="";
for  ($Position = 0;$Position<$Len_Str_Message;$Position++){
$Key_To_Use = (($Len_Str_Message+$Position)+1); 
$Key_To_Use = (255+$Key_To_Use) % 255;
$Byte_To_Be_Encrypted = substr($Str_Message, $Position, 1);
$Ascii_Num_Byte_To_Encrypt = ord($Byte_To_Be_Encrypted);
$Xored_Byte = $Ascii_Num_Byte_To_Encrypt ^ $Key_To_Use; 
$Encrypted_Byte = chr($Xored_Byte);
$Str_Encrypted_Message .= $Encrypted_Byte;
}
return $Str_Encrypted_Message;
} //end function


/*function showtemp(){
  $me = decrypt("p4sP0WFpl6MhLj%3Q%3Q");
  echo $me;
}*/

//showtemp();


?>