<?php



header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
class notification extends Controller
{

    public function index()
    {
        $time = date('r');
echo "data: The server time is: {$time}\n\n";
flush();

    }

    public function VerificationTeamNotification($person = null, $status = null)
    {
        $append = null;
        if(isset($person)){
            $append = "AND Person = $person";
        }
        if(isset($status)){
            $append .= "AND Status = '$status'";
        }
        $data = $this->model('viewModel')->get('VerificationTeamNotificationStatus, VerificationTeamNotification', "NotificationId = NotifId $append");
        $arr = json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
        echo "data: {$arr}\n\n";
        flush();
    }
    public function BoarderNotification($person = null, $status = null)
    {
        $append = null;
        if(isset($person)){
            $append = "AND Person = $person";
        }
        if(isset($status)){
            $append .= "AND Status = '$status'";
        }
        $data = $this->model('viewModel')->get('BoarderNotificationStatus, BoarderNotification', "NotificationId = NotifId $append");
        $arr = json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
        echo "data: {$arr}\n\n";
        flush();
    }
    public function OwnerNotification($person = null, $status = null)
    {
        $append = null;
        if(isset($person)){
            $append = "AND Person = $person";
        }
        if(isset($status)){
            $append .= "AND Status = '$status'";
        }
        $data = $this->model('viewModel')->get('OwnerNotificationStatus, OwnerNotification', "NotificationId = NotifId $append");
        $arr = json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
        echo "data: {$arr}\n\n";
        flush();
    }
    public function ManagerNotification($person = null, $status = null)
    {
        $append = null;
        if(isset($person)){
            $append = "AND Person = $person";
        }
        if(isset($status)){
            $append .= "AND Status = '$status'";
        }
        $data = $this->model('viewModel')->get('ManagerNotificationStatus, ManagerNotification', "NotificationId = NotifId $append");
        $arr = json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
        echo "data: {$arr}\n\n";
        flush();
    }
    public function AdminNotification($person = null, $status = null)
    {
        $append = null;
        if(isset($person)){
            $append = "AND Person = $person";
        }
        if(isset($status)){
            $append .= "AND Status = '$status'";
        }
        $data = $this->model('viewModel')->get('AdminNotificationStatus, AdminNotification', "NotificationId = NotifId $append");
        $arr = json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
        echo "data: {$arr}\n\n";
        flush();
    }
}


?>