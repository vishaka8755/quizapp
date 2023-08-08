<?php
class Uservalidation
{ private $data;
    private $errors = [];
    private static $fields = ['username','password'];
 
    public function __construct($post_data)
    {
        $this->data = $post_data;
    }
     
    public function validateForm()
    {
        foreach(self::$fields as $field)
        { 
            if(!array_key_exists($field,$this->data ))
            {
                trigger_error("field is not persent in data");
                return;
            }
        }
        $this-> validateUsername();
        $this-> validatePassword();
       
        return $this->errors;
    }

    public function validateUsername()
    {
        $val = trim($this->data['username']);
        if(empty($val))
        {
            $this->AddError('username','username canot be empty');
        }
        //else{ 
           // if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val))
           // {
           //  $this-> AddError('username','username must be 6-12 chars & alphanumeric');  
           // }

       // }
    }

    public function validatePassword()
    {
        $val = trim($this->data['password']);
        if(empty($val))
        {
            $this->AddError('password','password canot be empty');
        }
        //else{ 
          //  if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val))
          //  {
          //   $this-> AddError('password','password must be 6-12 chars & alphanumeric');  
         //   }

       // }
    }

    

    private function AddError($key,$val)
    {
        $this->errors[$key] = $val;
    }
 
    public function printError($errors)   {
        if(count($errors)>0){
       foreach( $errors as $value) {
          echo "$value <br>";
        }  
    }
}

}


?>