<x-layout>
    <body>
        <main>
         
            <form action="#" method="post">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
    
                <label for="middleName">Middle Name:</label>
                <input type="text" id="middleName" name="middleName" required>
    
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
    
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
    
                <label for="phone1">Phone Number:</label>
                <input type="tel" id="phone1" name="phone1" required>
    
                <label for="phone2">Phone Number 2:</label>
                <input type="tel" id="phone2" name="phone2">
    
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
    
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
    
                <label for="school">School:</label>
                <input type="text" id="school" name="school" required>
    
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required></textarea>
    
                <button type="submit">Submit</button>
            </form>
        </main>
    </body>

</x-layout>