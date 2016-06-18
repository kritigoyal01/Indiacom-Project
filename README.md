# IndiacomPagecount
module to calculate number of pages at the time of upload 


# Document verification  module has been added-

## INSTRUCTIONS FOR OPERATION

* download zip
* extract
* Rename the root folder to **ci_introl** or else many retrospective changes have to be accomodated in **config.php**
* import tables in **testphp** DB (read note in **DB folder** for import)
* enter url
```sh
  http://localhost:8081/ci_introl/login
```   
##### **change port no** accordingly in above url
& also change port no in **base url in config.php** if different portno(vimp)

login is the controller name which redirects to login page bydefault(constructor)

# Admin site of document verification 
It can be accessed by entering url
```sh
 http://localhost:8081/ci_introl/admin
```

### Working
* research paper upload woking fine
* page count of pdf,.docx,**.doc(too now)**
* document verification upload on user side
* document verification admin site for status verification

## Issues

* ~~page count of .doc is WIP~~

~~After uploading .doc,code prints the DOCUMENT OF PROPERTY (DOP) in hexadecimal(converted from binary).
That part has to be further evauluated to decrypt the page count section.(WIP)~~



