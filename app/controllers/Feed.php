<?php


class Feed extends Controller
{
    public function index($message = null)
    {
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

        $row = $this->model('viewModel')->getId("PostUpdate", "PostId");

        $this->view('Feed/index', ['row' => $row, 'message' => $message, 'alert' => $alert]);
    }

    public function postRest($PostId=null)
    {
        $data = $this->model('viewModel')->getPost($PostId);
        while ($row = $data->fetch_assoc()) {
            $json['FirstName'] = $row['FirstName'];
            $json['LastName'] = $row['LastName'];
            $json['UserType'] = $row['UserType'];
            $json['ProfilePicture'] = $row['ProfilePicture'];
            $json['PostId'] = $row['PostId'];
            $json['DateTime'] = $row['DateTime'];
            $json['Caption'] = $row['Caption'];
            $json['SummaryLine1'] = $row['SummaryLine1'];
            $json['SummaryLine2'] = $row['SummaryLine2'];
            $json['SummaryLine3'] = $row['SummaryLine3'];
            $json['Price'] = $row['Price'];
            $json['PriceType'] = $row['PriceType'];
            $json['Street'] = $row['Street'];
            $json['CityName'] = $row['CityName'];
            $json['NoOfMembers'] = $row['NoOfMembers'];
            $json['NoOfRooms'] = $row['NoOfRooms'];
            $json['NoOfWashRooms'] = $row['NoOfWashRooms'];
            $json['Gender'] = $row['Gender'];
            $json['BoarderType'] = $row['BoarderType'];
            $json['SquareFeet'] = $row['SquareFeet'];
            $json['Parking'] = $row['Parking'];
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function commentRest($PostId)
    {
        $data = $this->model('viewModel')->getComment($PostId);
        $json = array();
        while ($row = $data->fetch_assoc()) {
            $array['FirstName'] = $row['FirstName'];
            $array['LastName'] = $row['LastName'];
            $array['PostId'] = $PostId;
            $array['DateTime'] = $row['DateTime'];
            $array['Comment'] = $row['comment'];
            array_push($json, $array);
        }
        $json_response = json_encode($json);
        echo $json_response;
    }

    public function viewPost($PostId)
    {
        $base = BASEURL;
        new HTMLHeader("Feed | Post");
        new Navigation("feed");

        $url = "$base/feed/postRest/$PostId";
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        $result = json_decode($response);

        echo "<div class='navbar-offset full-width center'>";
        new ViewCard(
                $result->FirstName,
                $result->LastName,
                $result->UserType,
                $result->ProfilePicture,
                $result->PostId,
                $result->DateTime,
                $result->Caption,
                $result->SummaryLine1,
                $result->SummaryLine2,
                $result->SummaryLine3,
                $result->Price,
                $result->PriceType,
                $result->Street,
                $result->CityName,
                $result->NoOfMembers,
                $result->NoOfRooms,
                $result->NoOfWashRooms,
                $result->Gender,
                $result->BoarderType,
                $result->SquareFeet,
                $result->Parking,
            "yes"
        );


        echo "</div>";
        new HTMLFooter();
    }
    public function postUpdate()
    {
        $base = BASEURL;
        if (isset($_POST['userId'])) {
            $userId = $_POST['userId'];
            $caption = $_POST['caption'];
            $place = $_POST['place'];

            $result = $this->model('addModel')->postUpdate($userId, $place, $caption);

            header("Location: $base/feed/$result");

        }
    }

    public function addComment()
    {

        if (isset($_POST['postid'])) {
            $commenttext = $_POST['comment'];
            $PostId = $_POST['postid'];
            $commentorid = $_SESSION['UserId'];
            $this->model('addModel')->addAComment($commenttext,$PostId,$commentorid);
           
            header("Location: " . BASEURL . "/feed/viewPost/$PostId");
        }

    }

    public function deleteComment($post_id)
    {
         if (isset($post_id)) {
            $this->model('deleteModel')->deleteComment($post_id);
        }
    }



}