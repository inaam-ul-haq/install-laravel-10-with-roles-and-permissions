<x-auth-layout pageTitle="User Detail">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                @hasrole('admin')<x-admin.pages.user.show :compoData="$data" />@endhasrole

                @hasrole('particular')<x-particular.pages.user.show :compoData="$data" />@endhasrole

                @hasrole('professional')<x-professional.pages.user.show :compoData="$data" />@endhasrole
            </div>
        </div>
    </div>

</x-auth-layout>
