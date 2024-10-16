<?php
require_once "send.php";
require_once "utils.php";

if(isset($_POST['message']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['website-type'])) {
    $message = validateText($_POST['message']);
    $first_name =  validateText($_POST['first-name']);
    $last_name = validateText($_POST['last-name']);
    $website_type = validateText($_POST['website-type']);
    $phone = validateText($_POST['phone']);
    $email = validateEmail($_POST['email']);

    if (!$message || !$first_name || !$last_name || !$website_type || !$phone || !$email) {
        $result = "Please fill in all the fields correctly.";
    } else{
        $result = sendEmail($message, $email, $phone, $first_name, $last_name, $website_type);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <title>Contact Form</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="header__heading">Contact Us</h1>
            <p class="header__para">
                <?php 
                if (isset($result)) {
                    echo $result;
                } else {
                    echo "Any question or remarks? Just write us a message!";
                }
                ?>
            </p>
        </div>
        <div class="form-container">
            <div class="form-info">
                <div class="form-info__main">
                    <div class="form-info__main__header">
                        <h2 class="form-info__heading">Contact Information</h2>
                        <p class="form-info__para">
                            Fill up the form and our Team will get back to you within 24 hours.
                        </p>
                    </div>
                    <div class="form-info__main__reach-out-options">
                        <div class="form-info__reach-out-option">
                            <img src="assets/images/phone-icon.svg" alt="Phone Icon" class="form-info__icon">
                            <p class="form-info__option">
                                +0123 4567 8910
                            </p>
                        </div>
                        <div class="form-info__reach-out-option">
                            <img src="assets/images/email-icon.svg" alt="Email Icon" class="form-info__icon">
                            <p class="form-info__option">
                                hello@flowbase.com
                            </p>
                        </div>
                        <div class="form-info__reach-out-option">
                            <img src="assets/images/location-icon.svg" alt="Location Icon" class="form-info__icon">
                            <p class="form-info__option">
                                102 Street 2714 Don
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-info__footer">
                    <img src="assets/images/facebook-icon.svg" alt="Facebook Icon" class="form-info__media-link">
                    <img src="assets/images/twitter-icon.svg" alt="Twitter Icon" class="form-info__media-link">
                    <img src="assets/images/instagram-icon.svg" alt="Instagram Icon" class="form-info__media-link">
                    <img src="assets/images/linkedin-icon.svg" alt="Linkedin Icon" class="form-info__media-link">
                </div>
            </div>
            <form class="form" method="POST">
                <div class="form__row-group">
                    <div class="form__group">
                        <label for="first-name" id="first-name-label" class="form__label">First Name</label>
                        <input required placeholder="John" name="first-name" type="text" id="first-name"
                            class="form__input">
                    </div>
                    <div class="form__group">
                        <label for="last-name" id="last-name-label" class="form__label">Last Name</label>
                        <input required placeholder="Doe" name="last-name" type="text" id="last-name"
                            class="form__input">
                    </div>
                </div>
                <div class="form__row-group">
                    <div class="form__group">
                        <label for="email" id="email-label" class="form__label">Email</label>
                        <input required placeholder="john@doe.com" name="email" type="email" id="email"
                            class="form__input">
                    </div>
                    <div class="form__group">
                        <label for="phone" id="phone-label" class="form__label">Phone</label>
                        <input required placeholder="+123 456 789" name="phone" type="tel" id="phone"
                            class="form__input">
                    </div>
                </div>
                <div class="form__website-type-section">
                    <p class="form__website-type-question">
                        What type of website do you need?
                    </p>

                    <div class="form__website-type-radios">
                        <div class="form__radio-group">
                            <input required type="radio" id="web-design" name="website-type" value="Web Design">
                            <label for="web-design">Web Design</label>
                        </div>
                        <div class="form__radio-group">
                            <input required type="radio" id="web-development" name="website-type"
                                value="Web Development">
                            <label for="web-development">Web Development</label>
                        </div>
                        <div class="form__radio-group">
                            <input required type="radio" id="logo-design" name="website-type" value="Logo Design">
                            <label for="logo-design">Logo Design</label>
                        </div>
                        <div class="form__radio-group">
                            <input required type="radio" id="other" name="website-type" value="Other">
                            <label for="other">Other</label>
                        </div>
                    </div>
                </div>
                <div class="form__message-group">
                    <label for="message" id="message-label" class="form__label">Message</label>
                    <textarea required placeholder="Write your message..." name="message" id="message"
                        class="form__textarea"></textarea>
                </div>
                <button type="submit" class="form__submit">Send Message</button>
            </form>
        </div>
    </div>
    <script src="js/validation.js"></script>
</body>

</html>