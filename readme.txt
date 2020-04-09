MAX Logistics is a warehouse and shipping company. The staff of the company can be broadly classified into
-Operations Manager (OM)
-Team Lead (TL)
-Team Member (TM)

Operations Managers are Super Admin

There are 3 deparements:
-Shipping
-Receiving
-Packaging

Deployment Instruction
=======================
Copy all the files into a folder(say, a folder named "MAX"); the folder should be in an accessible location on your PC. Navigate to the root folder to access the homepage. For example, go to "localhost/MAX" if the MAX folder is in your root web folder in XAMPP.

MAX/db folder contains the users grouped into their respective access levels/designation
MAX/lastlogin folder holds the last login date and time as used by the program
MAX/log folder holds a text file storing login details

Testing Considerations
=======================
To facilitate testing, 3 users have been created by default. They are
auserom@max.com
ausertl@max.com
ausertm@max.com
Password:1234567

Additional users can register or be added by Super Admin

Constraints
============
The password reset process has not been implemented yet

There is an offset error when a user is added by Super Admin(which does not crash the process, as far as I know)