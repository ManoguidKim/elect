<!DOCTYPE html>
<html lang="en" class="v2fLMH8w3xgUEQcl63H9">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign In</title>

    <link rel="canonical" href="https://flowbite.com/application-ui/demo/authentication/sign-in/">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="font-[sans-serif]">
        <div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
                <div>
                    <h2 class="lg:text-5xl text-4xl font-extrabold lg:leading-[55px] text-gray-800">
                        Election Support Monitoring System
                    </h2>
                    <p class="text-sm mt-6 text-gray-800">is a digital tool designed to facilitate and streamline the process of monitoring elections. It assists in tracking election activities, voter data, election results, and incidents in real-time. The system ensures transparency, efficiency, and accountability by providing election officials, observers, and support teams with real-time updates and data on various election processes, voter turnout, and possible irregularities. This helps in preventing election-related issues and enhances the overall integrity of the election process.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="max-w-md md:ml-auto w-full">

                    @csrf

                    <h3 class="text-gray-800 text-3xl font-extrabold mb-8">
                        Sign in
                    </h3>

                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="space-y-4">
                        <div>
                            <input name="email" type="email" autocomplete="email" required class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-blue-600 focus:bg-transparent" placeholder="Email address" value="{{ old('email') }}" required />
                        </div>
                        <div>
                            <input name="password" type="password" autocomplete="current-password" required class="bg-gray-100 w-full text-sm text-gray-800 px-4 py-3.5 rounded-md outline-blue-600 focus:bg-transparent" placeholder="Password" required />
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                                    Remember me
                                </label>
                            </div>
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-500 font-semibold">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="!mt-8">
                        <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>