# Simple Login Page using Ionic 3

Just run the APK file (login.apk) PHP files are hosted on my personnel webserver.
You can just install the APK for testing,
#### Sample inputs
username: akhil
password: akhil
      or
username: jose
password: jose

Please follow steps to install and run
1) PHP file and APK files are included in this repository. you can find it right here...

2) Just change the mysqli parameters from the php file. And create a table in your localhost with "uname" and "password" as fields.

3) change below link in your pages/home/home.ts file
    var link = 'http://localhost/angular/login.php';
    
That's it
