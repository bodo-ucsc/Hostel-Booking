<?php

class FriendRequest extends Controller {

    function query ($sql, $data=null) {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
      }
    function request ($from,$to){
        //CHECK IF ALREADY FRIENDS
        $this->query(
            "SELECT * FROM `relation` WHERE `from`=? AND `to`=? AND `status`='F'",
            [$from, $to]
        );
        if (is_array($this->stmt->fetch())) {
            $this->error = "Already added as friends";
            return false;
      }

        //CHECK FOR PENDING REQUESTS
        $this->query(
            "SELECT * FROM `relation` WHERE
            (`status`='P' AND `from`=? AND `to`=?) OR
            (`status`='P' AND `from`=? AND `to`=?)",
            [$from, $to, $to, $from]
        );
        if (is_array($this->stmt->fetch())) {
            $this->error = "Already has a pending friend request";
            return false;
        }

        // ADD FRIEND REQUEST
        $this->query(
            "INSERT INTO `relation` (`from`, `to`, `status`) VALUES (?, ?, 'P')",
            [$from, $to]
        );
        return true; 
    }

    function acceptReq ($from, $to) {
        //UPGRADE STATUS TO "F"RIENDS
        $this->query(
        "UPDATE `relation` SET `status`='F' WHERE `status`='P' AND `from`=? AND `to`=?",
        [$from, $to]
        );
        if ($this->stmt->rowCount()==0) {
        $this->error = "Invalid friend request";
        return false;
        }

        // ADD RECIPOCAL RELATIONSHIP
        $this->query(
        "INSERT INTO `relation` (`from`, `to`, `status`) VALUES (?, ?, 'F')",
        [$to, $from]
        );
        return true;
    }

    function cancelReq ($from, $to) {
        $this->query(
        "DELETE FROM `relation` WHERE `status`='P' AND `from`=? AND `to`=?",
        [$from, $to]
        );
        return true;
    }

    


}