<?php


class notification extends Controller
{


    public function index($usertype = null, $person = null, $status = null)
    {


        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $append = null;
        if (isset($person)) {
            $append = "AND Person = $person";
        }
        if (isset($status)) {
            $append .= " AND Status = '$status'";
        }
        if (isset($usertype)) {
            if ($usertype == 'VerificationTeam') {
                $data = $this->model('viewModel')->get('VerificationTeamNotificationStatus, VerificationTeamNotification', "NotificationId = NotifId $append", "DateTime DESC");
            } else if ($usertype == 'Admin') {
                $data = $this->model('viewModel')->get('AdminNotificationStatus, AdminNotification', "NotificationId = NotifId $append", "DateTime DESC");
            } else if ($usertype == 'Manager') {
                $data = $this->model('viewModel')->get('ManagerNotificationStatus, ManagerNotification', "NotificationId = NotifId $append", "DateTime DESC");
            } else if ($usertype == 'BoardingOwner') {
                $data = $this->model('viewModel')->get('OwnerNotificationStatus, OwnerNotification', "NotificationId = NotifId $append", "DateTime DESC");
            } else if ($usertype == 'Student' || $usertype = 'Professional') {
                $data = $this->model('viewModel')->get('BoarderNotificationStatus, BoarderNotification', "NotificationId = NotifId $append", "DateTime DESC");
            }

            $arr = json_encode(
                $data->fetch_all(MYSQLI_ASSOC)
            );
            echo "data: {$arr}\n\n";
            flush();
        }
    }

    public function sendBoarderReminder($place = null, $type = null, $data = null)
    {
        if (!isset($data)) {
            $data = $this->model('viewModel')->getColumn('BoardingPlaceTenant', 'TenantId', 'BoarderStatus = "boarded" AND Place = ' . $place);
        } else {
            $data = (int) $data;
        }

        if (isset($place) && isset($type)) {
            if ($type == 'Food' || $type == 'Plastic' || $type == 'Both') {
                $type = "$type Trash will be collected today";
            } else if ($type == 'Electricity' || $type == 'Water') {
                $type = "$type Bill has to be paid";
            } else if ($type == 'Rent') {
                $type = "Rent has to be paid";
            }

            $result = $this->model('addModel')->sendBoarderReminder($place, $type, $data);
            echo json_encode(['status' => $result]);
        }
    }

    public function boarderNotificationRest($person = null, $status = null)
    {
        $append = null;
        if (isset($person)) {
            $append = "AND Person = $person";
        }
        if (isset($status)) {
            $append .= " AND Status = '$status'";
        }
        $data = $this->model('viewModel')->get('BoarderNotificationStatus, BoarderNotification', "NotificationId = NotifId $append", "DateTime DESC");
        echo json_encode(
            $data->fetch_all(MYSQLI_ASSOC)
        );
    }
}


//         $time = date('r');
// echo "data: The server time is: {$time}\n\n";
// flush();



// public function VerificationTeamNotification($person = null, $status = null)
// {
//     $append = null;
//     if(isset($person)){
//         $append = "AND Person = $person";
//     }
//     if(isset($status)){
//         $append .= " AND Status = '$status'";
//     }
//     $data = $this->model('viewModel')->get('VerificationTeamNotificationStatus, VerificationTeamNotification', "NotificationId = NotifId $append");
//     $arr = json_encode(
//         $data->fetch_all(MYSQLI_ASSOC)
//     );
//     echo "data: {$arr}\n\n";
//     flush();
// }
// public function BoarderNotification($person = null, $status = null)
// {
//     $append = null;
//     if(isset($person)){
//         $append = "AND Person = $person";
//     }
//     if(isset($status)){
//         $append .= " AND Status = '$status'";
//     }
//     $data = $this->model('viewModel')->get('BoarderNotificationStatus, BoarderNotification', "NotificationId = NotifId $append");
//     $arr = json_encode(
//         $data->fetch_all(MYSQLI_ASSOC)
//     );
//     echo "data: {$arr}\n\n";
//     flush();
// }
// public function OwnerNotification($person = null, $status = null)
// {
//     $append = null;
//     if(isset($person)){
//         $append = "AND Person = $person";
//     }
//     if(isset($status)){
//         $append .= " AND Status = '$status'";
//     }
//     $data = $this->model('viewModel')->get('OwnerNotificationStatus, OwnerNotification', "NotificationId = NotifId $append");
//     $arr = json_encode(
//         $data->fetch_all(MYSQLI_ASSOC)
//     );
//     echo "data: {$arr}\n\n";
//     flush();
// }
// public function ManagerNotification($person = null, $status = null)
// {
//     $append = null;
//     if(isset($person)){
//         $append = "AND Person = $person";
//     }
//     if(isset($status)){
//         $append .= " AND Status = '$status'";
//     }
//     $data = $this->model('viewModel')->get('ManagerNotificationStatus, ManagerNotification', "NotificationId = NotifId $append");
//     $arr = json_encode(
//         $data->fetch_all(MYSQLI_ASSOC)
//     );
//     echo "data: {$arr}\n\n";
//     flush();
// }
// public function AdminNotification($person = null, $status = null)
// {
//     $append = null;
//     if(isset($person)){
//         $append = "AND Person = $person";
//     }
//     if(isset($status)){
//         $append .= " AND Status = '$status'";
//     }
//     $data = $this->model('viewModel')->get('AdminNotificationStatus, AdminNotification', "NotificationId = NotifId $append");
//     $arr = json_encode(
//         $data->fetch_all(MYSQLI_ASSOC)
//     );
//     echo "data: {$arr}\n\n";
//     flush();
// }
?>