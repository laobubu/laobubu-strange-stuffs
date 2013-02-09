X: REM Your Path
cd REM Your Path

rmdir /s /q temp
del out.war
mkdir temp
mkdir temp\WEB-INF
mkdir temp\META-INF
xcopy /s bin\* temp\WEB-INF
xcopy /s class\* temp\WEB-INF
xcopy /s META-INF\* temp\META-INF
cd temp
7z a ../out.zip *
cd ..
rename out.zip out.war
move out.war output
rmdir /s /q temp
pause