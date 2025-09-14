@include('layouts.header')
@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>プロファイル</title>
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class="p-6 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="p-6 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="p-6 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>
        </div>
    </div>
</body>

</html>