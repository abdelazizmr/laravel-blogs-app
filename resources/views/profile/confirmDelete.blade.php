@extends('layout.app')

@section('content')
    <p>
        Before you delete your account, please take a moment to read our privacy policy.
    We take your privacy seriously and want you to understand how we collect, use, and protect your personal information.

    When you use our service, we may collect certain information about you, including your name, email address, and other contact information. We use this information to provide you with the best possible experience and to improve our service.

    We may also collect information about your device, browser, and location, as well as your usage of our service, to help us understand how you use our service and to improve our performance.

    We take reasonable steps to protect your personal information from unauthorized access, use, or disclosure. However, no system can be completely secure, and we cannot guarantee the security of your personal information.

    If you have any questions or concerns about our privacy policy, please contact us at [contact email].

    By clicking the "Confirm delete" button below, you agree to our privacy policy and acknowledge that deleting your account will permanently delete all of your data from our service.

    Note that this is just an example and you should tailor your privacy policy to your specific service and the types of data you collect. Additionally, you should consult with a lawyer to ensure that your privacy policy complies with applicable laws and regulations.
    </p>
    <form class="my-3 mx-auto" method="POST" action="/profile/{{ auth()->id() }}/delete">
        @csrf
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger my-3">Confirm delete</button>
    </form>
@endsection
