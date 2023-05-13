<?php

class HTMLFooter
{

    public function __construct($alert = null, $message = null)
    {
        $base = BASEURL;
        if (isset($_SESSION['UserId'])) {
            $supuserid = $_SESSION['UserId'];
        }
        if (isset($_SESSION['role'])) {
            $suprole = $_SESSION['role'];
        }
        if (isset($_SESSION['UserId'])) {
            if ($suprole == 'Admin' || $suprole == 'Manager' || $suprole == 'VerificationTeam') {
                echo "";
            } else {
                echo "
        <script src='https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js'></script>
        <script src='https://unpkg.com/filepond@^4/dist/filepond.js'></script>
        
        <script>

            
            
            function openSupportModal() {
                document.getElementById('currUrl').value = window.location.href;
                document.getElementById('supportModal').classList.remove('display-none');
            }
            
            function closeSupportModal() {
                document.getElementById('supportModal').classList.add('display-none');
            }
            
            window.onclick = function (event) {
                modal = document.getElementById('supportModal');
                if (event.target == modal) {
                    modal.classList.add('display-none');
        
                }
            }
        
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.create(document.getElementById('supportimage'), {
                server: '<?php echo BASEURL ?>/imageUpload/support',
                allowImagePreview: false
            });
        
            // console log file path after submit
            if (document.getElementById('supportimage') != null) {
                document.getElementById('supportimage').addEventListener('FilePond:processfile', function (e) {
                    const serverId = e.detail.file.serverId;
                    console.log(serverId);
                    // parse the JSON object
                    const jsonResponse = JSON.parse(serverId);
                    // access the filepath
                    const filepath = jsonResponse.filepath;
                    console.log(filepath);
                    if (filepath != null) {
                        document.getElementById('supportImages').value = filepath;
                    }
                });
            }
        </script>
        ";
            }
        } else {
            echo "
        
        <script>
        function openSupportModal() {
                Swal.fire({
                    title: 'Contact Support',
        
                    html:
                        '<div class=\"row no-gap\">' +
                        '<div class=\"col-12 fill-container left\">' +
                        '<label for=\"email-from\">Your Email Address</label>' +
                        '<input type=\"email\" class=\"fill-container\" id=\"email-from\" placeholder=\"Your email address\"/>' +
                        // '<label for=\"email-to\">To</label>'+
                        '<input type=\"hidden\" class=\"fill-container\" id=\"email-to\" value=\"jvatsbodo@gmail.com\"/>' +
                        '<label for=\"email-subject\">Subject</label>'+
                        '<input type=\"text\" class=\"fill-container\" id=\"email-subject\" placeholder=\"Enter subject here\" value=\"\"/>' +
                        '<label for=\"email-text\">Message</label>'+
                        '<textarea class=\"fill-container\" id=\"email-text\" rows=\"10\" placeholder=\"Enter your message here\"></textarea>' +
                        '</div>' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonText: 'Send',
        
        
                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = {
                            emailFrom: document.getElementById('email-from').value,
                            emailTo: document.getElementById('email-to').value,
                            emailSubject: document.getElementById('email-subject').value,
                            emailText: document.getElementById('email-text').value,
                        };
        
                        fetch(\"$base/support/email/\", {
                            method: \"POST\",
                            headers: {
                                \"Content-Type\": \"application/json\"
                            },
                            body: JSON.stringify(data)
                        }).then(response => response.json())
                            .then(json => {
                                if (json.Status === 'Success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Email Sent',
                                        text: 'Email sent successfully!',
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!'
                                    })
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!'
                                })
                            });
                    }
                });
        
            }
            </script>
        ";
        }

        echo "

            <script src='https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

            <script> 


            function toggleNav(openElement,closeElement) {
                document.getElementById(openElement).classList.add('display-block');
                document.getElementById(closeElement).classList.add('display-none'); 
                document.getElementById(openElement).classList.remove('display-none');
                document.getElementById(closeElement).classList.remove('display-block'); 
              } 

            function toggleNotification() {
                if (document.getElementById('notification').classList.contains('display-none')) {
                    document.getElementById('notification').classList.remove('display-none');
                } else {
                    document.getElementById('notification').classList.add('display-none');
                }
            }

            function openReadNotif(){
                document.getElementById('readNotif').classList.remove('display-none');
                document.getElementById('unreadNotif').classList.add('display-none');
                document.getElementById('readButton').classList.add('bg-blue', 'white');
                document.getElementById('unreadButton').classList.remove('bg-blue', 'white');
                document.getElementById('unreadButton').classList.add('bg-white');
            }

            function openUnreadNotif(){
                document.getElementById('unreadNotif').classList.remove('display-none');
                document.getElementById('readNotif').classList.add('display-none');
                document.getElementById('unreadButton').classList.add('bg-blue', 'white');
                document.getElementById('readButton').classList.remove('bg-blue', 'white');
                document.getElementById('readButton').classList.add('bg-white');
                
            }
               
              ";

        if (isset($suprole)) {
            $suprole;
            $supuserid;
            echo "
                let source = new EventSource('$base/notification/$suprole/$supuserid');
                let readNotif = document.getElementById('readNotif');
                let unreadNotif = document.getElementById('unreadNotif');
 
                let notifCount = document.getElementsByClassName('notifCount');
                let bellContainer = document.getElementsByClassName('bell-container');
 
                if(sessionStorage.getItem('compareArray') === null || sessionStorage.getItem('compareArray') === undefined){
                    sessionStorage.setItem('compareArray', JSON.stringify([]));
                }
                notifMessages(JSON.parse(sessionStorage.getItem('compareArray')));
                setTimeout( checkNotif, 10);
                setInterval( checkNotif, 1000);  

                function checkNotif() {
                    source.onmessage = function(event) {
                        let data = JSON.parse(event.data);
                        if(data.length !== 0){
                            if(JSON.stringify(data) !== JSON.stringify(JSON.parse(sessionStorage.getItem('compareArray')))){
                                console.log('inside if');
                                console.log(event.data);
                                readNotif.innerHTML = '';
                                unreadNotif.innerHTML = '';
                                // if (data.length > compareArray.length){
                                if (data.length !== JSON.parse(sessionStorage.getItem('compareArray')).length){
                                    newNotif();
                                }
                                notifMessages(data);
                            }
                        }
                    };  
                    
                    
                };

                function newNotif(){
                    console.log('inside new notif');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end', 
                        timer: 3000, 
                        iconColor: 'white',
                        customClass: {
                          popup: 'colored-toast white big',
                        },
                        showConfirmButton: false,
                      
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    
                    Toast.fire({
                        icon: 'success',
                        title: 'New Notification'
                    })
                }

                function notifMessages(data){
                    console.log('inside notif messages');
                    let notifCountVal = 0;
                    for (let i = 0; i < data.length; i++) {
                        let notif = data[i];
                        let notifId = notif.NotifId;
                        let person = notif.Person;
                        let status = notif.Status;
                        let notificationId = notif.NotificationId;
                        let notificationTitle = notif.NotificationTitle;
                        let dateTime = notif.DateTime;
                        
                        let notifDiv = document.createElement('div');
                        notifDiv.classList.add('row', 'shadow-small', 'bg-white', 'padding-4', 'border-box', 'border-rounded-more');
                        notifDiv.innerHTML = '<div class=\"col-11 fill-container\">' +
                        '<span class=\"big\">' + notificationTitle + '</span><br>' +
                        '<span class=\"small\">' + dateTime + '</span>' +
                        '</div>' +
                        '<div class=\"col-1 notif-button fill-container\" id=\"notif-' + notifId + '\" onclick=\"toggleReadNotif(' + notifId + ', ' + person + ', \'' + status + '\')\">'+
                        '<i class=\"feather-small\" data-feather=\"check-circle\"></i>' +
                        '</div>';
                        if (status === 'unread') {
                            notifCountVal++;
                            unreadNotif.appendChild(notifDiv);
                        } else {
                            notifDiv.classList.add('grey');
                            readNotif.appendChild(notifDiv);
                        }
                    }
                    feather.replace();
                    sessionStorage.setItem('compareArray', JSON.stringify(data));
                    if (notifCountVal > 0) {
                        for (let i = 0; i < notifCount.length; i++) {
                            notifCount[i].innerHTML = notifCountVal;
                            bellContainer[i].classList.add('bg-blue', 'white');
                        }
                    } else {
                        for (let i = 0; i < notifCount.length; i++) {
                            notifCount[i].innerHTML = '';
                            bellContainer[i].classList.remove('bg-blue', 'white');
                        }
                    }
                }
                
                function toggleReadNotif(notifId, person, status) {
                    if (status === 'unread') {
                        status = 'read';
                    } else {
                        status = 'unread';
                    }
                    let data = {";
            if ($suprole == 'VerificationTeam') {
                $editTable = 'VerificationTeamNotificationStatus';
            } else if ($suprole == 'Admin') {
                $editTable = 'AdminNotificationStatus';
            } else if ($suprole == 'Manager') {
                $editTable = 'ManagerNotificationStatus';
            } else if ($suprole == 'BoardingOwner') {
                $editTable = 'OwnerNotificationStatus';
            } else if ($suprole == 'Student' || $suprole = 'Professional') {
                $editTable = 'BoarderNotificationStatus';
            }
            echo "
                        Table: '$editTable',
                        Id: 'NotifId',
                        IdValue: notifId,
                        Id2: 'Person',
                        IdValue2: person,
                        Key: 'Status', 
                        Value: status
                    };
                    fetch(\"$base/edit/\", {
                        method: \"POST\",
                        headers: {
                            \"Content-Type\": \"application/json\"
                        },
                        body: JSON.stringify(data)
                    }).then(response => response.json())
                        .then(json => {
                            if (json.Status === 'Success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Notification ' + status + '!',
                                    text: 'Notification marked as ' + status + ' successfully!',
                                    timer: 900,
                                    timerProgressBar: true, 
                                    showConfirmButton: false,
                                    showCancelButton: false,

                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!'
                                })
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                        });
                }
                 
                
                ";

        }

        if (isset($alert) && isset($message)) {
            $title = ucfirst($alert);
            echo "
                Swal.fire({
                    icon: '$alert',
                    title: '$title',
                    text: '$message'
                })";
        }
        echo "
                feather.replace();

            </script>
        </body>
        
        </html>
            
            ";


    }
}


?>