System name:
Gym Membership Management System

Features:
1. Authentication
1.1 Registration
1.2 Login
1.3 Logout

2. User management
2.1 Get User Data
2.2 Add User Data
2.3 Edit User Data
2.4 Delete User Data

3. Frontdesk/Admin Management
3.1 Get Frontdesk Data
3.2 Add Frontdesk data
3.3 Edit Frontdesk data
3.4 Delete Frontdesk data

4. Customer Management
4.1 Get Customer Data
4.2 Add Customer data
4.3 Edit customer data
4.4 Delete customer data

5. Customer's Membership Management
5.1 Get membership data
5.2 Add membership data
5.3 Edit membership data
5.4 Delete membership data

6. Coach Management
6..1 Get coach data
6..2 Add coach data
6..3 Edit coach data
6..4 Delete coach data

7. Workout Management
7.1 Get workout data
7.2 Add workout data
7.3 Edit workout data
7.4 Delete workout data


ERD:

1. User table
id, int, pk
first_name, string
last_name, string
username, string
email, string
password, string

2. Admin table
id, int, pk
first_name, string
last_name, string
email, string
gender, string

3. Customer table
id, int, pk
customer_fname, string
customer_lname, string
customer_email, string
customer_gender, string

4. Membership table
id, int, pk
membership_status, string
membership_startdate, string
membership_enddate, string
membership_price, string

5. Coach table
id, int, pk
coach_fname, string
coach_lname, string
coach_email, string
Coach_phone, string
coach_specialization, string


6. Workout table
id, int, pk
workout_name
workout_duration
workout_intensity 	
