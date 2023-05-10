<?php
$header = new HTMLHeader("Sign In | Verification Team");
$nav = new Navigation();
?>

<main class=' padding-5'>

    <div class="row navbar-offset ">
        <div class="col-1 fill-container"></div>
        <div class="col-10 col-medium-4 fill-container">
            <img class="width-90" src="<?php echo BASEURL . '/public/images/privacy.svg' ?>">
        </div>
        <div class="col-1 fill-container display-block display-medium-none"></div>
        <div class="col-1 fill-container display-block display-medium-none"></div>

        <div class="col-10 col-medium-6 fill-container">
            <span class="header-1 fill-container">
                Privacy Policy
            </span><br>
            <span class="header-2 fill-container">
                BODO (Boarding Booking and Management System)
            </span><br>
            <p>
                This Privacy Policy outlines how we collect, use, and protect your personal information when you use our
                Hostel
                Booking and Management System. We are committed to ensuring the privacy and security of your data.
                Please read
                this policy carefully to understand how we handle your information.
            </p>

            <span class='big'>1. Information We Collect:</span><br />
            <span>1.1 Personal Information: During the registration and booking process, we may collect personal
                information
                such as your name, email address, contact number, and payment details.</span><br>
            <span>1.2 Usage Information: We may collect information about how you interact with our system, including
                your IP
                address, browser type, operating system, and pages visited.</span><br><br>

            <span class='big'>2. Use of Information:</span><br />
            <span>2.1 We use the collected information to provide and improve our Hostel Booking and Management System,
                including processing reservations, communicating with users, and personalizing their
                experience.</span><br>
            <span>2.2 We may use your email address to send you important updates, notifications, and promotional offers
                related
                to our services. You can opt out of promotional emails at any time.</span><br>
            <span>2.3 We may analyze usage data to understand system performance, trends, and user preferences, which
                helps us
                enhance the system's functionality and user experience.</span><br><br>

            <span class='big'>3. Data Security:</span><br />
            <span>3.1 We implement appropriate technical and organizational measures to safeguard the information we
                collect and
                prevent unauthorized access, disclosure, alteration, or destruction.</span><br>
            <span>3.2 We regularly review and update our security practices to ensure the ongoing protection of your
                data.</span><br>
            <span>3.3 While we strive to protect your personal information, please note that no method of transmission
                over the
                internet or electronic storage is 100% secure. We cannot guarantee absolute security.</span><br><br>

            <span class='big'>4. Data Retention:</span><br />
            <span>4.1 We retain your personal information for as long as necessary to fulfill the purposes outlined in
                this
                Privacy Policy, unless a longer retention period is required or permitted by law.</span><br>
            <span>4.2 If you request the deletion of your account, we will securely erase your personal information,
                subject to
                any legal obligations or legitimate business interests that require its retention.</span><br><br>

            <span class='big'>5. Third-Party Services:</span><br />
            <span>5.1 We may use third-party services and tools to facilitate the operation of our system and enhance
                user
                experience. These services may have their own privacy policies and practices.</span><br>
            <span>5.2 We do not sell, trade, or otherwise transfer your personal information to third parties for
                marketing
                purposes without your consent, except as required for the provision of our services or as legally
                obligated.</span><br><br>

            <span class='big'>5. Children's Privacy:</span><br />
            <span>6.1 Our Hostel Booking and Management System is not intended for use by individuals under the age of
                18. We do
                not knowingly collect personal information from children. If we become aware that we have collected
                personal
                information from a child without parental consent, we will take steps to delete it.</span><br><br>

            <span class='big'>7. Changes to the Privacy Policy:</span><br />
            <span>7.1 We reserve the right to update or modify this Privacy Policy at any time. Any changes will be
                effective
                upon posting the revised policy on our website. We encourage you to review this policy
                periodically.</span><br><br>

            <span class='big'>8. Contact Us:</span><br />
            <span>If you have any questions, concerns, or requests regarding this Privacy Policy or the handling of your
                personal information, please contact us using the provided contact details.</span><br>

            <span>By using our Hostel Booking and Management System, you acknowledge and agree to the terms of this
                Privacy
                Policy.</span><br>
        </div>


        <div class="col-1 fill-container"></div>

    </div>
</main>
<?php new pageFooter(); ?>

<?php
if (isset($data['alert'])) {
    $footer = new HTMLFooter($data['alert'], $data['message']);
} else {
    $footer = new HTMLFooter();
}