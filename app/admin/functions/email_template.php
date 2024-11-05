<?php 
    class email_template extends content {
        protected $role;
        public function __construct() {
            // Call the parent constructor
            parent::__construct();
            $this->role = new roles;
        }

        function update_template () {
            if(!$this->role->validate_action(["email_template"=>"edit"], true)) return;
            $data = $this->checkmessage(["ID", "template"]);
            if(!is_array($data)){
                return ;
            }
            
            $where = "ID = '".$data['ID']."'";
            $theID = $data['ID'];
            unset($data['ID']);
            $update = $this->update("email_template", $data, $where);
            if($update) {
                $return = [
                    "message" => ["Success", "Email Updated", "success"],
                ];
                $actInfo = ["userID" => adminID, "date_time" => date("Y-m-d H:i:s"), 
                "action_name" => "Edit Email template",
                "description" => "Edit Email template", 
                "action_for"=>"email_template", 
                "action_for_ID"=>$theID];
                $this->new_activity($actInfo);
                return json_encode($return);
            }
            }
    }