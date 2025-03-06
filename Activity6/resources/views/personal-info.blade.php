<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
</head>
<body>

    <h1> Personal Information </h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="/output" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="fname"> First Name: </label></td>
                <td><input type="text" name="fname" value="{{ old('fname') }}"></td>
                <td>
                    @error('fname')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="lname"> Last Name: </label></td>
                <td><input type="text" name="lname" value="{{ old('lname') }}"></td>
                <td>
                    @error('lname')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="sex">Sex:</label></td>
                <td>
                    <input type="radio" name="sex" value="Male" {{ old('sex') == 'Male' ? 'checked' : '' }}> Male
                    <input type="radio" name="sex" value="Female" {{ old('sex') == 'Female' ? 'checked' : '' }}> Female
                </td>
                <td>
                    @error('sex')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="mobile"> Mobile Number: </label></td>
                <td><input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="0998-XXX-XXX"></td>
                <td>
                    @error('mobile')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="tel"> Telephone Number: </label></td>
                <td><input type="text" name="tel" value="{{ old('tel') }}" placeholder="Numeric only"></td>
                <td>
                    @error('tel')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="birthdate"> Birthdate: </label></td>
                <td><input type="date" name="birthdate" value="{{ old('birthdate') }}"></td>
                <td>
                    @error('birthdate')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>


            <tr>
                <td><label for="address"> Address: </label></td>
                <td><input type="text" name="address" value="{{ old('address') }}"></td>
                <td>@error('address') <span style="color: red;">{{ $message }}</span> @enderror</td>
            </tr>

            <tr>
                <td><label for="email"> Email: </label></td>
                <td><input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com"></td>
                <td>
                    @error('email')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <td><label for="website"> Website: </label></td>
                <td><input type="url" name="website" value="{{ old('website') }}" placeholder="https://example.com"></td>
                <td>
                    @error('website')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
        </table>

        <br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>
