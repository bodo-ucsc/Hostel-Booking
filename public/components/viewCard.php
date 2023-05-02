<?php

class ViewCard
{
    public function __construct($value, $comments = null, $crud = null)
    {

        $base = BASEURL;
        if ($value == 'preview') {
            $FirstName = "Preview";
            $LastName = "User";
            $UserType = "preview";
            $ProfilePicture = null;
            $PostId = 'preview';
            $PlaceId = 'preview';
            $DateTime = date('Y-m-d H:i:s');
            $Caption = 'Your message will appear here.';
        } else {




            $FirstName = $value->FirstName;
            $LastName = $value->LastName;
            $UserType = $value->UserType;
            $ProfilePicture = $value->ProfilePicture;
            $PostId = $value->PostId;
            $PlaceId = $value->PlaceId;
            $DateTime = $value->DateTime;
            $Caption = $value->Caption;

            if ($UserType == "BoardingOwner") {
                $UserType = "Owner";
            } else {
                $UserType = ucfirst($UserType);
            }
        }

        if (isset($crud)) {
            //edit and delete buttons
            echo " 
    <div class='bg-white border-rounded-more display-inline-block margin-top-5 hover'> 

        <div class='row no-gap vertical-align-middle zindex'>
            <div class='col-8 margin-n4'></div>
            <div class='col-4 margin-n4 right  hover-child'>
                <div class='row less-gap '>";
            if ($_SESSION['role'] == 'Manager' || ($_SESSION['role'] == 'BoardingOwner' && $_SESSION['UserId'] == $value->UserId)) {
                echo "<div class='col-6'>
                        <button class='bg-blue-hover white border-rounded padding-3 right' onclick='editPost(\"$PostId\",\"$Caption\")'>
                            <i data-feather='edit' class=' vertical-align-middle '></i>
                        </button>
                    </div>
                    <div class='col-6'>
                        <button class='bg-red-hover white border-rounded padding-3 right' onclick='deletePost(\"$PostId\")'>
                            <i data-feather='trash-2' class=' vertical-align-middle '></i>
                        </button>
                    </div>";
            }

            echo "
                </div>
            </div>
        </div>
        <div class='advert shadow bg-white border-rounded-more padding-3 '> ";
        } else {
            echo "<div class='advert shadow bg-white border-rounded-more padding-3 display-inline-block'> ";
        }
        echo "
    <div class='row no-gap vertical-align-middle'>
        <div class=' padding-2'>";
        if ($ProfilePicture == null) {
            echo "<img id='dp-$PostId' src='https://ui-avatars.com/api/?background=288684&color=fff&name=$FirstName+$LastName' alt='' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
        } else {
            echo "<img id='dp-$PostId' src='$base/$ProfilePicture' alt='' class='vertical-align-middle border-white border-3 shadow dp border-circle'>";
        }
        echo " </div>
        <div class='col-11 fill-container left margin-left-2'>
            <div class='row no-gap'>
                <div class='col-12 fill-container left  '>
                    <div id='name-$PostId' class='display-inline-block big vertical-align-middle'>
                        $FirstName $LastName
                    </div>
                    <div
                        class='display-inline-block border-rounded-more shadow   padding-1 margin-left-2 vertical-align-middle'>
                        <i data-feather='award' 
                            class='feather-body vertical-align-middle bg-accent white border-circle padding-2'></i>
                        <span id='user-type-$PostId' class='small vertical-align-middle padding-2'>$UserType</span>
                    </div>

                </div>
                <div id='date-$PostId' class='col-12 fill-container left'>";
        $timestamp = strtotime($DateTime);
        echo date("M d, Y h.i A", $timestamp);
        echo "</div>
            </div>
        </div>
    </div>
    <div class='row padding-2'>
        <div id='caption-$PostId'class='col-12 fill-container left'>
            $Caption
        </div>
    </div>";

        new PropertyCard($PlaceId, "yes", $PostId);


        if ($value != 'preview') {
            echo "
            <div class='row no-gap padding-2 margin-bottom-2  '>
                <div class='col-12 fill-container '> 
                    <div class='row no-gap padding-horizontal-4 padding-vertical-2 bg-white shadow-small border-rounded-more cursor-pointer'>

                            <div class='col-6 dropdown padding-horizontal-4 padding-vertical-2 fill-container '>
                                <a class='  bg-white left fill-container '><div class='fill-container' id='like-count-$PostId'>0 Likes</div></a>

                                <div id='like-list-$PostId' class='dropdown-content '>
                                </div> 
                            </div>  
                            <div class='col-6 fill-container padding-horizontal-4 padding-vertical-2'>
                                <a  class=' bg-white right fill-container ' onclick='location.href=\"$base/feed/viewPost/$PostId\"'><div class='fill-container' id='comment-count-$PostId'> 0 Comments  </div></a>
                            </div> 
                        </div>
                    </div>
                </div>
        ";

            if (isset($_SESSION['UserId'])) {
                $onclick = " onclick='likePost(this,\"$PostId\")' ";
            } else {
                $onclick = " onclick='location.href=\"$base/signin\"' ";
            }
            echo " <div class='row padding-2'> 
        <div class='col-4 fill-container'>
            <button $onclick id='like-button-$PostId' class='bold fill-container   border-rounded-more shadow '>
                <i data-feather='thumbs-up' class='vertical-align-middle'></i>
                <span class='display-none display-large-inline-block vertical-align-middle'>Like</span>
            </button> 
        </div>";

            echo "
        <div class='col-4 fill-container'>
            <button class='button bold fill-container bg-white-hover black-hover border-rounded-more shadow ' onclick='location.href=\"$base/feed/viewPost/$PostId\"'>
                <i data-feather='message-square' class='vertical-align-middle'></i>
                <span class='display-none display-large-inline-block vertical-align-middle'>Comment</span>
            </button>
        </div>
        <div class='col-4 dropdown fill-container'>
            <button class=' button bold fill-container bg-white-hover black-hover border-rounded-more shadow '>
                <i data-feather='share-2' class='vertical-align-middle'></i>
                <span class='display-none display-large-inline-block vertical-align-middle'>Share</span>
            </button>

            <div class='dropdown-content'>
                <a onclick=\"window.open('https://www.facebook.com/sharer/sharer.php?u=$base/feed/$PostId')\">
                    <button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='facebook'></i><span class=' vertical-align-middle'>Facebook</span></button>
                </a>
                <a onclick=\"window.open('whatsapp://send?text=$base/feed/$PostId')\">
                    <button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='message-circle'></i><span class=' vertical-align-middle'>WhatsApp</span></button>
                </a>
                <a onclick=\"window.open('https://telegram.me/share/url?url=$base/feed/$PostId')\">
                    <button class='fill-container border-rounded bg-white-hover left'><i class='vertical-align-middle padding-horizontal-2' data-feather='send'></i><span class=' vertical-align-middle'>Telegram</span></button>
                </a>
            </div>
        </div> 
    </div>";
        } else {
            echo "
        <div class=' fill-container'>
            <button class='bold fill-container   border-rounded-more shadow '>
                <span class='display-none display-large-inline-block vertical-align-middle'>This is just a preview</span>
            </button>
        </div>";
        }

        if (isset($comments)) {
            echo "
                <div id='comment-list-$PostId' class='margin-top-3 row bg-light-grey border-rounded padding-vertical-4 padding-horizontal-3'></div>
                <div id='comment-typing-$PostId' class='fill-container left padding-top-3'> </div>
            
            ";

            if (isset($_SESSION['UserId'])) {
                echo " 
                    <div class='row '>
                        <div class='col-10 fill-container'>
                            <input type='text' class='vertical-align-middle fill-container margin-top-4' id='comment-$PostId' name='comment'
                            placeholder='Your Message' onkeyup='typing()' required>
                        </div>
                        <div class='col-2 fill-container'>
                            <button onclick='addComment()' class='border-rounded vertical-align-middle fill-container bg-blue-hover white-hover'>
                            <i data-feather='send' class='feather-body'></i>
                            </button>
                        </div>
                    </div>";
            } else {
                echo "<div class='row padding-2'>
                        <div class='col-12 fill-container'>
                            <button class='button bold fill-container bg-white-hover black-hover border-rounded-more shadow ' onclick='location.href=\"$base/signin\"'>
                                <i data-feather='message-square' class='vertical-align-middle'></i>
                                <span class='display-none display-large-inline-block vertical-align-middle'>Login to Comment</span>
                            </button>
                        </div> 
                    </div>";

            }
        }

        echo "</div>";
        if (isset($crud)) {
            echo "</div>";

        }
    }
}