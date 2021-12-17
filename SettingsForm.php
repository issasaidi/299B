<?php

class SettingsForm {
    // bootstrap form
    public function createUserDetailsForm($firstname, $lastname, $email) 
    {
        $firstNameInput = $this->createFirstNameInput($firstname);
        $lastNameInput = $this->createLastNameInput($lastname);
        $emailInput = $this->createEmailInput($email);
        $passwordInput = $this->createPasswordInput("password", "Enter your password");
        $saveButton = $this->createSaveDetailsButton();

        return "<form action='settings.php' method='POST' enctype='multipart/form-data'>
                    <span class='title'>User Details:</span>
                    $firstNameInput
                    $lastNameInput
                    $emailInput
                    $passwordInput
                    $saveButton
                </form>";
    }
    public function createPasswordsForm() 
    {
        $oldPasswordInput = $this->createPasswordInput("oldPassword", "Old password");
        $newPasswordInput = $this->createPasswordInput("newPassword", "New password");
        $newPasswordCInput = $this->createPasswordInput("newPasswordc", "Confirm password");
        $saveButton = $this->createSavePasswordButton();

        return "<form action='settings.php' method='POST' enctype='multipart/form-data'>
                    <span class='title'>Update Password:</span>
                    $oldPasswordInput
                    $newPasswordInput
                    $newPasswordCInput
                    $saveButton
                </form>";
    }
    public function createVerifyButton() {
        return "<button type='submit' class='btn btn-primary' name='verify'>Verify Email</button>";
    }
    public function createStaticKey($key) {
        return "<div class='form-group'>
                    <input type='text' value='$key' name='key' style='display:none'>
                    </div>";
    }
    public function createRecoveryPasswordsForm($key) 
    {
        $recoveryKey = $this->createStaticKey($key);
        $newPasswordInput = $this->createPasswordInput("newPassword", "New password");
        $newPasswordCInput = $this->createPasswordInput("newPasswordc", "Confirm password");
        $saveButton = $this->createSavePasswordButton();

        return "<div class='signInContainer'>
                    <div class='column'>
                        <div class='header'>
                            <a class='logoContainer' href='index.php'>
                                <img src='assets/images/icons/logolg.png' title='Home' alt='Site logo'>
                            </a>
                            <hr>
                            <h3>Enter a new password</h3>
                            <span>to continue to Horizon</span>
                        </div>
                        <div class='loginForm'>
                            <form action='recoveryPage.php' method='POST' enctype='multipart/form-data'>
                                <span class='title'>Update Password:</span>
                                $recoveryKey
                                $newPasswordInput
                                $newPasswordCInput
                                $saveButton
                            </form>
                        </div>
                    </div>
                </div>";
    }
    public function createVerifyForm($key) {
        $verifyKey = $this->createStaticKey($key);
        $verifyButton = $this->createVerifyButton();
        return "<div class='signInContainer'>
                    <div class='column'>
                        <div class='header'>
                            <a class='logoContainer' href='index.php'>
                                <img src='assets/images/icons/logolg.png' title='Home' alt='Site logo'>
                            </a>
                            <hr>
                            <h3>Verify your email</h3>
                            <span>to continue to Horizon</span>
                        </div>
                        <div class='loginForm'>
                        <form action='verify.php' method='POST' enctype='multipart/form-data'>
                            <span class='title'> Verify Email:</span>
                            $verifyKey
                            $verifyButton
                        </form>
                        </div>
                    </div>
                </div>";
    }
    public function createProfilePicForm()
    {
        $fileInput = $this->createFileInput();
        $saveButton = $this->createSavePictureButton();
        $deleteButton = $this->createDetelePictureButton();
        return "<form action='settings.php' method='POST' enctype='multipart/form-data'>
                    <span class='title'>Update Profile Picture:</span>
                    $fileInput
                    $saveButton
                </form>
                <form action='settings.php' method='POST' enctype='multipart/form-data'>
                    $deleteButton
                </form>";
    }
    private function createFileInput() {
        return "<div class='form-group'>
                    <input type='file' class='form-control-file' accept='image/*' name='profilePic' id='exampleFormControlFile1' required>
                </div>";
    }
    private function createFirstNameInput($value) {
        if($value==null) $value = "";
        return "<div class='form-group'>
                    <input class='form-control' type='text' placeholder='First name' value='$value' name='firstName'>
                </div>";
    }
    private function createLastNameInput($value) {
        if($value==null) $value = "";
        return "<div class='form-group'>
                    <input class='form-control' type='text' placeholder='First name' value='$value' name='lastName'>
                </div>";
    }
    private function createEmailInput($value) {
        if($value==null) $value = "";
        return "<div class='form-group'>
                    <input class='form-control' type='text' placeholder='Email' value='$value' name='email'>
                </div>";
    }
    private function createPasswordInput($name, $placeholder) {
        if($name==null) $value = "";
        return "<div class='form-group'>
                    <input class='form-control' type='password' placeholder='$placeholder' name='$name'>
                </div>";
    }
    private function createSaveDetailsButton()
    {
        return "<button type='submit' class='btn btn-primary' name='saveDetailsButton'>Save</button>";
    }
    private function createSavePasswordButton()
    {
        return "<button type='submit' class='btn btn-primary' name='savePasswordButton'>Save</button>";
    }
    private function createSavePictureButton() 
    {
        return "<button type='submit' class='btn btn-primary' name='savePictureButton'>Save</button>";
    }
    private function createDetelePictureButton() 
    {
        return "<button type='submit' class='btn btn-secondary' name='deletePictureButton'>Delete Current Picture</button>";
    }
}

?>