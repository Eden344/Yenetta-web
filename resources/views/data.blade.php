<x-layout>
    <body>
        <main>
            <form action="/validation" method="POST">
                @csrf
                <label for="firstname">First Name:</label>
                <input value="{{old('firstname')}}" type="text" id="firstName" name="firstname" required>
    
                <label for="middlename">Middle Name:</label>
                <input value="{{old('middlename')}}" type="text" id="middleName" name="middlename" required>
    
                <label for="lastname">Last Name:</label>
                <input value="{{old('lastname')}}" type="text" id="lastName" name="lastname" required>
    
                <label for="email">Email:</label>
                <input value="{{old('email')}}" type="email" id="email" name="email" required>
    
                <label for="phonenumber1">Phone Number:</label>
                <input value="{{old('phonenumber1')}}" type="number" id="phone1" name="phonenumber1" required>
    
                <label for="phonenumber2">Phone Number 2:</label>
                <input value="{{old('phonenumber2')}}" type="number" id="phone2" name="phonenumber2">
    
                <label for="gender">Gender:</label>
                <input type="text" name="gender" id="gender">
    
                <label for="age">Age:</label>
                <input value="{{old('age')}}" type="number" id="age" name="age" required>
    
                <label for="school">School:</label>
                <input value="{{old('school')}}" type="text" id="school" name="school" required>
    
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="4" required></textarea>
    
                <button type="submit">Submit</button>
            </form>
        </main>
    </body>

</x-layout>