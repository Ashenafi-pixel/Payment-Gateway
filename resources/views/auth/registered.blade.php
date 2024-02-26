<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered User</title>
</head>
<body>
    <h1>User Registration Successful</h1>
    <p>Thank you for registering. Your account has been created successfully.</p>
    <p>Name: {{ $user->name }}</p>
    <p>Username: {{ $user->username }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Mobile Number: {{ $user->mobile_number }}</p>
    <p>Company Name: {{ $user->merchantDetail->company_name }}</p>
    <p>Company Phone: {{ $user->merchantDetail->company_phone }}</p>
    <p>Company Email: {{ $user->merchantDetail->company_email }}</p>
    <p>Company Address: {{ $user->merchantDetail->company_address }}</p>
    <p>OTP: {{ $otp }}</p>
</body>
</html>
