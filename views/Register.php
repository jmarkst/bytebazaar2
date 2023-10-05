<h1>Register</h1>
<form method="POST" name="register">
    <input type="text" name="username" placeholder="Username" />
    <input type="text" name="firstName" placeholder="First name" />
    <input type="text" name="middleName" placeholder="Middle name" /><br>
    <input type="checkbox" name="hasMiddleName" default="false"/>I have no middle name
    <input type="text" name="lastName" placeholder="Last name" />
    <input type="text" name="suffix" placeholder="Name suffix" /><br>
    <input type="checkbox" name="hasSuffix" default="false"/>I have no name suffix
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