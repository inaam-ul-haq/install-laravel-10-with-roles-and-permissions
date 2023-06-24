<x-auth-layout pageTitle="Create User">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                @hasrole('admin')<x-admin.pages.user.create />@endhasrole

                @hasrole('user')<x-user.pages.user.create />@endhasrole
            </div>
        </div>
    </div>

</x-auth-layout>
