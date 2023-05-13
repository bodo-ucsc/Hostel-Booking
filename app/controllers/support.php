<?php

class Support extends Controller
{




    public function index($type = 'issue', $page = 1, $perPage = 10, $message = null)
    {
        if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'VerificationTeam') {
            if (isset($message)) {

                $alert = 'error';
                if ($message == 'fail') {
                    $message = "Insertion Failed";
                } else if ($message == 'success') {
                    $message = "Inserted Successfully";
                    $alert = 'success';
                }
            } else {
                $message = null;
                $alert = null;
            }

            $rowCount = $this->model('viewModel')->numRowsWhere('Support', "Supporttype = '$type' AND RequestTo = '" . $_SESSION['role'] . "'");
            $result = restAPI("support/supportRest/$type");
            $this->view('support/index', ['type' => $type, 'result' => $result, 'page' => $page, 'rowCount' => $rowCount, 'perPage' => $perPage, 'message' => $message, 'alert' => $alert]);


        } else {
            header("Location: " . BASEURL);
        }
    }

    public function supportRest($type = 'issue', $userType = null, $userId = null)
    {
        $result = $this->model('viewModel')->getSupport($type, $userType, $userId);
        echo json_encode(
            $result->fetch_all(MYSQLI_ASSOC)
        );

    }

    public function addSupport($type = 'issue')
    {
        if ($_SESSION['role'] == 'Manager') {
            $this->view('support/addSupport', ['type' => $type]);

        } else {
            header("Location: " . BASEURL);
        }
    }

    public function addSupportForm()
    {
        if (isset($_POST['userType'])) {
            $type = $_POST['type'];
            $userId = $_POST['userId'];
            $support = $_POST['support'];
            $description = $_POST['description'];
            if (isset($_POST['images'])) {
                $images = $_POST['images'];
            } else {
                $images = '';
            }
            if (isset($_POST['requestTo'])) {
                $requestTo = $_POST['requestTo'];
            } else {
                $requestTo = 'Manager';
            }
            echo $type;
            echo $userId;
            echo $support;
            echo $description;
            echo $images;

            

            $message = $this->model('addModel')->addSupport($type, $userId, $support, $description, $images, $requestTo);

            if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Manager' || $_SESSION['role'] == 'VerificationTeam') {
                header("Location: " . BASEURL . "/support/$type/1/2/$message");
            } else {
                if(isset($_POST['currUrl'])){
                    header("Location: " . $_POST['currUrl'] . "/$message");
                }
                else{
                    header("Location: " . BASEURL . "/home/$message");
                } 
            }
            echo ("success");
        }
    }

    public function resolve($id, $status)
    {

        $data = $this->model('editModel')->modifyData('Support', ['SupportStatus' => $status], "SupportId = '$id'");
        if ($data == true) {
            $json['Status'] = "Success";
        } else {
            $json['Status'] = "Failed";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function email()
    {
        $_POST = json_decode(file_get_contents('php://input'), true);
        if (empty($_POST)) {
            $json['Status'] = "Failed no values";
            $json_response = json_encode($json);
            echo $json_response;
            return;
        }
        $emailFrom = $_POST['emailFrom'];
        $emailTo = $_POST['emailTo'];
        $emailSubject = $_POST['emailSubject'];
        $emailText = $_POST['emailText'];

        if($emailFrom != 'jvatsbodo@gmail.com'){
            $emailText = $emailText . "<br/> Email Sent From: " . $emailFrom;
        }
        //php mailer 
        if (sendEmail($emailTo, $emailSubject, $emailText, $emailFrom) == 'error') {
            $json['Status'] = "Failed";
        } else {
            $json['Status'] = "Success";
        }
        $json_response = json_encode($json);
        echo $json_response;
    }
}