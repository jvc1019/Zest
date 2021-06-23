:::::::::::::::::::::::::::::::::::::::
::   "uninstall.cmd" version 1.0     ::
:: By Ronn Ian Visto and Adriel Rabe ::
:::::::::::::::::::::::::::::::::::::::

::Deletes directory of Zest and the shortcut in Desktop
RMDIR /S /Q C:\Zest
del %UserProfile%\Desktop\Zest.lnk