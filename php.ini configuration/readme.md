#before converting the doc to pdf following requirements should be met
*Ms word(tested on 2007,2010 with support to save as pdf option..else it has to be added via additional installation)
*php_com_dotnet.dll

go to c/xampp/php/php.ini
add 2 lines 

#[COM_DOT_NET] 
#extension=php_com_dotnet.dll 

next step is to add above stated .dll in the same directory.
Now program can convert doc to pdf using msWord.



