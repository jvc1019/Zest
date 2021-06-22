:::::::::::::::::::::::::::::::::::::::
::   "zest_setup.bat" version 1.2    ::
:: By Ronn Ian Visto and Adriel Rabe ::
::  Special Thanks to Janley Molina  ::
:::::::::::::::::::::::::::::::::::::::

:: Copies the folder and subfolder extracted into htdocs of xampp. xampp must be installed
ROBOCOPY /mir .\Zest C:\Zest
XCOPY "Zest.lnk" "%UserProfile%\Desktop"

