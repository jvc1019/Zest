:::::::::::::::::::::::::::::::::::::::
::   "zest_setup.bat" version 1.2    ::
:: By Ronn Ian Visto and Adriel Rabe ::
::  Special Thanks to Janley Molina  ::
:::::::::::::::::::::::::::::::::::::::

:: Copies the folder and subfolders inside Zest
ROBOCOPY /mir /mt:8 .\Zest C:\Zest

::Copies shortcut to Desktop of the user
XCOPY /i /y "Zest.lnk" "%UserProfile%\Desktop"

::Creates a folder in start menu and places shortcuts in that directory
MKDIR %AppData%\Microsoft\Windows\Start Menu\Programs\Zest
XCOPY /i /y "Uninstall.lnk" "%AppData%\Microsoft\Windows\Start Menu\Programs\Zest"
XCOPY /i /y "Zest.lnk" "%AppData%\Microsoft\Windows\Start Menu\Programs\Zest"

