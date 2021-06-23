:::::::::::::::::::::::::::::::::::::::
::   "uninstall.cmd" version 1.0     ::
:: By Ronn Ian Visto and Adriel Rabe ::
:::::::::::::::::::::::::::::::::::::::

::Kills running Apache processes
TASKKILL /f /im httpd.exe

::Deletes directory of Zest and the shortcut in Desktop
DEL /f /q "%UserProfile%\Desktop\Zest.lnk"
RMDIR /s /q "%AppData%\Microsoft\Windows\Start Menu\Programs\Zest"
RMDIR /s /q "C:\Zest"
