<?php
class Userregvalidation 
{ 
    
    private $data;
    private $errors = [];
    private static $fields = ['usertype','username','email','password_1','password_2',];
 
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
        $this-> validateUsertype();
        $this-> validateUsername();
        $this-> validateEmail();
        $this-> validatePassword1();
        $this-> validatePassword2();
        
        
        $errors= $this->errors;
         return $errors;
    }

    public function validateUsertype()
    {
        $val = $this->data['usertype'];
        if(empty($val))
        {
            $this->AddError('usertype','usertype canot be empty');
        }
    }

   

    public function validateUsername()
    {
        $val = trim($this->data['username']);
        if(empty($val))
        {
            $this->AddError('username','username canot be empty');
        }
        else{ 
           if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val))
            {
             $this-> AddError('username','username must be 6-12 chars & alphanumeric');  
           }


       }
    }

    public function validatePassword1()
    {
        $val = trim($this->data['password_1']);
        if(empty($val))
        {
            $this->AddError('password','password canot be empty');
        }
        else{ 
          if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val))
           {
            $this-> AddError('password','password must be 6-12 chars & alphanumeric');  
          }

       }
    }

    public function validatePassword2()
    {
        $val = trim($this->data['password_2']);
        if(empty($val))
        {
            $this->AddError('password_2','password canot be empty');
        }
        else{ 
           if(!preg_match('/^[a-zA-Z0-9]{6,12}$/',$val))
            {
            $this-> AddError('password_2','password must be 6-12 chars & alphanumeric');  
           }

       }
    }

   
    


    public function validateEmail()
    {
        $val =trim($this->data['email']) ;
        if(empty($val))
        {
            $this->AddError('email','email canot be empty');
        }

        else{
            if(!filter_var($val,FILTER_VALIDATE_EMAIL))
            {
                $this-> AddError('email','email must be a valid email');   
            }
            
        }
        
    }

  

    private function AddError($key,$val)
    {
        $this->errors[$key] = $val;
    }
    
   
           
		  
		
    



}


?>