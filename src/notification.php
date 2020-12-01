<!-- 
    A GENERAL PURPOSE NOTIFICATION THAT YOU CAN IMPLEMENT ANYWHERE ON YOUR PAGE v2
    by Janley Molina
-->

<!-- 
Arguments:
status_heading - (optional, but strictly recommended) a string containing the heading of the notification, preferably the feature name (shown in boldface)
status - (required) a string containing the notification message
type - (required) either "notif" or "alarm"
              
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
    tasks.php?status_heading=This is a status heading&status=This is a status text&type=notif
Alarm: 
    tasks.php?status_heading=This is a status heading&status=This is a status text&type=alarm

On tasks.php

spawnNotification();
-->

<!-- A Bootstrap Toast -->
<div id="notification" style="position:fixed; bottom:1em; right:1em; min-width: 350px; z-index:1080;">
    <div class="toast toast-template" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
        <div class="toast-header">
            <div class="toast-title mr-auto font-weight-bold text-primary">
            </div>
            <div class="toast-time">
                <small class="text-muted"></small>
                <button type="button" class="btn border-0 close_notification" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="toast-body">
        </div>
    </div>
</div>

<script src="js/notification.js">
</script>