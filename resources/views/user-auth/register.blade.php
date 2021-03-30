
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="KvAlDSszvjKOWor7bMWDp4oSQIsIhDyJJ4uauDxS">
    
    <title>KOL Management | Regoster</title>
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <svg class="w-16 h-16" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"/>
                        <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"/>
                    </svg>
                </a>
            </div>
            
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{ route('submit_register') }}">
                    @csrf
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="name">
                            Name
                        </label>
                        <input  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="name" type="text" name="name" required="required" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <span class="txt-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="name">
                            Username
                        </label>
                        <input  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="username" type="text" name="username" required="required" value="{{ old('username') }}">
                        @if($errors->has('username'))
                        <span class="txt-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="email">
                            Email
                        </label>
                        <input  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <span class="txt-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="password">
                            Password
                        </label>
                        <input  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" value="{{ old('password') }}">
                        @if($errors->has('password'))
                        <span class="txt-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                            Confirm Password
                        </label>
                        <input  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password_confirmation" type="password" name="password_confirmation" required="required" value="{{ old('password_confirmation') }}">
                        @if($errors->has('password_confirmation'))
                        <span class="txt-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                    
                    
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            Sudah Memiliki Akun?
                        </a>
                        
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
