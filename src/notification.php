<!-- 
    A GENERAL PURPOSE NOTIFICATION THAT YOU CAN IMPLEMENT ANYWHERE ON YOUR PAGE 
    by Janley Molina
-->

<!-- 
To use, simply redirect to the target page with a 'status' GET value 

Arguments:
status_heading - (required) a string containing the heading of the notification, preferably the feature name (shown in boldface)
status - (required) a string containing the notification message
isNotif - (optional) either true or false, determines if the notification tone should play
isAlarm - (optional) either true or false, determines if the alarm tone should play
Note: Do not set both isAlarm and isNotif as true!

-- The alarm tone will play
    1. isAlarm=true&isNotif=false              
    2. isAlarm=true
-- The notif tone will play
    1. isAlarm=false&isNotif=true     
    2. isAlarm=false
-- No sound will play
    1. isAlarm=false&isNotif=false
    2. both are not included
              
+------------------------------------+
| This is a status heading         x |
|------------------------------------|
| This is a status text              |    
+------------------------------------+

+---------------------------------------------+
| Tasks                                     x |
|---------------------------------------------|
| "Dummy task" has been marked as completed.  |    
+---------------------------------------------+

Examples:
Notification: 
    tasks.php?status_heading=This is a status heading&status=This is a status text&isNotif=true
Alarm: 
    tasks.php?status_heading=This is a status heading&status=This is a status text&isAlarm=true

-->

<!-- A Bootstrap Toast -->
<?php if (!empty($_GET['status'])) { ?>
    <div id="notification" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="position:absolute; bottom:10px; right:15px; min-width: 350px; z-index:1080;">
        <div class="toast-header text-primary">
            <?php
            if (!empty($_GET['status_heading'])) { ?>
                <strong class="mr-auto">
                    <?php echo $_GET['status_heading']; ?>
                </strong>
            <?php
            }
            ?>
            <small class="text-muted"><?php echo date("h:i A"); ?></small>
            <button id="close_notification" type="button" class="btn border-0" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php echo $_GET['status']; ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#notification").toast("show");

            const isNotif = "<?php
                                if (!empty($_GET['isNotif'])) {
                                    echo $_GET['isNotif'];
                                } else {
                                    echo 'false';
                                } ?>";
            const isAlarm = "<?php
                                if (!empty($_GET['isAlarm'])) {
                                    echo $_GET['isAlarm'];
                                } else {
                                    echo 'false';
                                } ?>";

            // if notification is an alarm, play a sound effect
            if (isAlarm === "true") {
                var sound = new Audio("../resources/alarm.ogg");
                sound.loop = true;
                sound.play();

                $("#notification .close").click(function() {
                    sound.pause();
                    sound.currentTime = 0;
                });
            } else {
                // destroy notification after 4.5 seconds if it's not an alarm
                if (isNotif === "true") {
                    var sound = new Audio("../resources/notification.ogg");
                    sound.play();
                }

                setTimeout(function(e) {
                    $("#notification").toast("hide");
                }, 4500);
            }

            if (window.history.replaceState) {
                // prevents browser from storing history with each change
                // hides the GET value of notifications
                window.history.replaceState(null, "", window.location.href.split(/[?#]/)[0]);
            }
        });
    </script>
<?php
}
?>