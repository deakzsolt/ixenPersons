@extends('defaults.default')

@section('content')
    <header>
        <nav>
            <a href="/">Cancel</a>
        </nav>
    </header>
    <form method="POST" action="/">
        @csrf
        <p><strong>Please fill all required fields marked with <span style="color: #E63939;">*</span>.</strong></p>

        <section>
            <p>Person basic data:</p>
            <p>
                <label for="first_name">First name <span style="color: #E63939;">*</span></label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                @if(!$errors->isEmpty() && isset($errors->messages()['first_name']))
                    <span style="color: #E63939; display: block; font-size: 14px;">{{ $errors->messages()['first_name'][0] }}</span>
                @endif
            </p>
            <p>
                <label for="middle_name">Middle name</label>
                <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}">
            </p>
            <p>
                <label for="last_name">Last name <span style="color: #E63939;">*</span></label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                @if(!$errors->isEmpty() && isset($errors->messages()['last_name']))
                    <span style="color: #E63939; display: block; font-size: 14px;">{{ $errors->messages()['last_name'][0] }}</span>
                @endif
            </p>
            <p>
                <label for="permanent_address">Permanent address <span style="color: #E63939;">*</span></label>
                <input type="text" name="permanent_address" id="permanent_address" value="{{ old('permanent_address') }}" placeholder="zip Street name and number">
                @if(!$errors->isEmpty() && isset($errors->messages()['permanent_address']))
                    <span style="color: #E63939; display: block; font-size: 14px;">{{ $errors->messages()['permanent_address'][0] }}</span>
                @endif
            </p>
            <p>
                <label for="temporary_address">Temporary address</label>
                <input type="text" name="temporary_address" id="temporary_address" value="{{ old('temporary_address') }}" placeholder="zip Street name and number">
            </p>
        </section>
        <section>
            <p>Person extra data:</p>
            <p>
                <span class="emails">
                    <label for="email">Emails</label>
                    <input type="email" name="email[1]" id="email" value="{{ old('email.1') }}" placeholder="your@email.com">
                    @if(old('email'))
                        @foreach(old('email') as $key => $email)
                            @if($key !== 1)
                                <input type="email" name="email[{{ $key }}]" id="email" value="{{ $email }}">
                            @endif
                        @endforeach
                    @endif
                </span>
                <span class="button" onclick="addInput('email', 'email', 'emails')">+</span>
            </p>
            <p>
                <span class="mobiles">
                    <label for="mobile_number">Mobile Numbers</label>
                    <input type="text" name="mobile_number[1]" value="{{ old('mobile_number.1') }}" id="mobile_number" placeholder="+36202345678">
                    @if(old('mobile_number'))
                        @foreach(old('mobile_number') as $key => $mobile_number)
                            @if($key !== 1)
                                <input type="text" name="mobile_number[{{ $key }}]" id="mobile_number" value="{{ $mobile_number }}">
                            @endif
                        @endforeach
                    @endif
                </span>
                @if(!$errors->isEmpty())
                    @foreach($errors->messages() as $error => $message)
                        @if(strpos($error, 'mobile_number') !== false)
                            <span style="color: #E63939; display: block; font-size: 14px;">{{ $message[0] }}</span>
                        @endif
                    @endforeach
                @endif
                <span class="button" onclick="addInput('text', 'mobile_number', 'mobiles')">+</span>
            </p>
            <p>
                <span class="telephones">
                    <label for="telephone_number">Telephone Numbers</label>
                    <input type="text" name="telephone_number[1]" value="{{ old('telephone_number.1') }}" id="telephone_number" placeholder="+3612345678">
                    @if(old('telephone_number'))
                        @foreach(old('telephone_number') as $key => $telephone_number)
                            @if($key !== 1)
                                <input type="text" name="telephone_number[{{ $key }}]" id="telephone_number" value="{{ $telephone_number }}">
                            @endif
                        @endforeach
                    @endif
                </span>
                @if(!$errors->isEmpty())
                    @foreach($errors->messages() as $error => $message)
                        @if(strpos($error, 'telephone_number') !== false)
                            <span style="color: #E63939; display: block; font-size: 14px;">{{ $message[0] }}</span>
                        @endif
                    @endforeach
                @endif
                <span class="button" onclick="addInput('text', 'telephone_number', 'telephones')">+</span>
            </p>
        </section>

        <input type="submit" value="Save">
    </form>
@endsection

<script>
    let counter = {};
    function addInput(type, name, location) {
        let container = document.querySelector('.'+location),
            newInput = document.createElement('span');

        if (name in counter) {
            counter[name] = counter[name]+1;
        } else {
            counter[name] = 2;
        } // if

        newInput.innerHTML = '<input type="'+type+'" name="'+name+'['+counter[name]+']" id="'+name+'">';
        container.appendChild(newInput);
    } //
</script>
