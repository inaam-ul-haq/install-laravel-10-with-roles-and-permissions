<x-auth-layout pageTitle="Update User">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                @hasrole('admin')<x-admin.pages.user.edit :compoData="$data" />@endhasrole

                @hasrole('particular')<x-particular.pages.user.edit :compoData="$data" />@endhasrole

                @hasrole('professional')<x-professional.pages.user.edit :compoData="$data" />@endhasrole
            </div>
        </div>
    </div>

</x-auth-layout>
