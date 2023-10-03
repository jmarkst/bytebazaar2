<h1>Register</h1>
<form method="POST" name="register">
    <input type="text" name="username" placeholder="Username" />
    <input type="text" name="fname" placeholder="First name" />
    <input type="text" name="lname" placeholder="Last name" />
    <br>
    <select name="gender">
        <option>Gender</option>
        <option value="0">Prefer not to say</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
    </select>
    <br>
    <input type="email" name="email" placeholder="Email address" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="password" placeholder="Confirm password" />
    <input type="submit" value="Register" />
</form>