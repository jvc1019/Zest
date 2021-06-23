:::::::::::::::::::::::::::::::::::::::
::   "zest_setup.bat" version 1.2    ::
:: By Ronn Ian Visto and Adriel Rabe ::
::  Special Thanks to Janley Molina  ::
:::::::::::::::::::::::::::::::::::::::

:: Copies the folder and subfolders inside Zest
ROBOCOPY /mir /mt:8 .\Zest C:\Zest

::Copies shortcuts into the Desktop of the user
XCOPY "Zest.lnk" "%UserProfile%\Desktop"
XCOPY "Uninstall.lnk" "%UserProfile%\Desktop"
XCOPY "Zest.lnk" "%ProgramData%\Microsoft\Windows\Start Menu\Programs\Zest"

