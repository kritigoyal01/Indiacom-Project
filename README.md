# indiacomPagecount
module to calculate number of pages at the time of upload

NOTES FOR OPERATION
download zip
extract
import tables in "testphp" DB (read note in DB folder for import)
also rename the root folder to "ci_introl"
or else many retrospective changes have to be accomodated in config.php

enter "http://localhost:8081/ci_introl/login"    port no accordingly & change base url in config.php if different portno(vimp)

login is the controller name which redirects to login page bydefault(constructor)

Working

page count of pdf,.docx     

Issues


page count of .doc is WIP..

After uploading .doc,code prints the DOCUMENT OF PROPERTY (DOP) in hexadecimal(converted from binary).
That part has to be further evauluated to decrypt the page count section.(WIP)
