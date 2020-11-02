<!-- 
    A GENERAL PURPOSE NOTIFICATION THAT YOU CAN IMPLEMENT ANYWHERE ON YOUR PAGE 
    by Janley Molina
-->

<!-- 
To use, simply redirect to the target page with a 'status' GET value 

Arguments:
status_heading - (optional) a string containing the heading of the notification (shown in boldface)
status - a string containing the notification message
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
              
+--------------------------------------------------------------------------+
| This is a status heading This is a status text                         x |
+--------------------------------------------------------------------------+

Examples:
Notification: 
    tasks.php?status_heading=This is a status heading&status=This is a status text&isNotif=true
Alarm: 
    tasks.php?status_heading=This is a status heading&status=This is a status text&isAlarm=true

-->

<!-- A Bootstrap alert -->
<?php if (!empty($_GET['status'])) { ?>
    <div id="notification" class="alert alert-primary alert-dismissible fade show" role="alert">
        <?php if (!empty($_GET['status_heading'])) { ?>
            <strong class="alert-heading">
                <?php echo $_GET['status_heading']; ?>
            </strong>
        <?php
        }
        ?>
        <?php echo $_GET['status']; ?>
        <button id="close_notification" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>

<script>
    if ($("#notification").length) {
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
            $("#close_notification").click(stopAlarm);
        } else {
            // destroy notification after 3.75 seconds if it's not an alarm
            if (isNotif === "true") {
                var sound = new Audio("../resources/notification.ogg");
                sound.play();
            }

            setTimeout(function(e) {
                $('#notification').alert('close');
            }, 3750);
        }
    }

    function stopAlarm() {
        sound.pause();
        sound.currentTime = 0;
    }

    if (window.history.replaceState) {
        // prevents browser from storing history with each change
        // hides the GET value of notifications and search methods
        window.history.replaceState(null, "", window.location.href.split(/[?#]/)[0]);
    }
</script>