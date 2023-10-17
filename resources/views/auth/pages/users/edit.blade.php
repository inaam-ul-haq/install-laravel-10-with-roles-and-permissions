@php
    $pagename = 'Update ' . $data->name . ' detail';
@endphp
<x-auth-layout :pageTitle="$pagename">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <x-front.card>
                    <form method="post" action="{{ route('users.update', $data->id) }}" class="row g-3 needs-validation"
                        novalidate>
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="name" class="form-label">Full name</label>
                            <x-front.input-field type="text" name="name" id="name" place="Enter Full Name"
                                val="{{ $data->name }}" required="true" />
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">e-Mail</label>
                            <x-front.input-field type="email" name="email" id="email" place="Enter your email"
                                val="{{ $data->email }}" extraAttributes="readonly" required="true" />
                        </div>
                        <div class="col-md-12">
                            <label for="username" class="form-label">Username</label>
                            <x-front.input-field type="text" name="username" id="username"
                                place="Enter your username" val="{{ $data->username }}" required="true" />
                        </div>
                        <div class="col-md-12">
                            <label for="phone" class="form-label">phone</label>
                            <x-front.input-field type="text" name="phone" id="phone" place="Enter your phone"
                                val="{{ $data->phone }}" required="true" />
                        </div>
                        <div class="col-md-12">
                            <label for="id_number" class="form-label">id number</label>
                            <x-front.input-field type="text" name="id_number" id="id_number"
                                place="Enter your id_number" val="{{ $data->id_number }}" required="true" />
                        </div>
                        <div class="col-12">
                            <x-front.input-button btnType="submit" btnValue="Update Profile" btnClass="" />
                        </div>
                    </form>
                </x-front.card>

            </div>
        </div>
    </div>

</x-auth-layout>
